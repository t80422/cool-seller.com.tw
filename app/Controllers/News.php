<?php

namespace App\Controllers;

use App\Libraries\UploadService;
use App\Models\ActivitiesModel;

// 活動訊息
class News extends BaseController
{
    private $activitiesModel;
    private $uploadSer;
    private $dirPath = 'news/';

    public function __construct()
    {
        $this->activitiesModel = new ActivitiesModel();
        $this->uploadSer = new UploadService();
    }

    // 前台列表
    public function index()
    {
        $page = $this->request->getGet('page') ?? 1;
        $keyword = $this->request->getGet('keyword');
        $activities = $this->activitiesModel->getList($page, $keyword);
        $hotActivities = $this->activitiesModel->getHotActivities();
        $data = [
            'activities' => $activities,
            'hotActivities' => $hotActivities,
            'pager' => $this->activitiesModel->pager
        ];

        return view('news/index', $data);
    }

    // 前台詳細
    public function detail($id = null)
    {
        $activity = $this->activitiesModel->find($id);
        $data = [
            'activity' => $activity,
            'keyword' => ''
        ];

        return view('news/detail', $data);
    }

    // 後台列表
    public function index_backend()
    {
        $keyword = $this->request->getGet('keyword');
        $pager = service('pager');
        $page = (int)($this->request->getGet('page') ?? 1);
        $datas = $this->activitiesModel->getListForBackend($page, $keyword);
        $pager_links = $pager->makeLinks($page, $datas['perPage'], $datas['total'], 'backend_pages');

        return view('News\index_backend', [
            'datas' => $datas['items'],
            'pager_links' => $pager_links,
            'keyword' => !empty($keyword) ? $keyword : ''
        ]);
    }

    // 後台新增
    public function create()
    {
        return view('News/form', [
            'isEdit' => false
        ]);
    }

    // 後台新增送出
    public function create_submit()
    {
        $datas = $this->request->getPost();
        $file = $this->request->getFile('img');
        $fileName = $file->getName();
        $datas['a_Img'] = $fileName;

        if ($this->activitiesModel->insert($datas)) {
            $this->uploadSer->uploadFile($file, $this->dirPath, $fileName);
        }

        return redirect()->to('backend/news');
    }

    // 後台修改
    public function edit($id = null)
    {
        $data = $this->activitiesModel->find($id);

        return view('News/form', [
            'isEdit' => true,
            'data' => $data
        ]);
    }

    // 後台修改送出
    public function edit_submit()
    {
        $data = $this->request->getPost();
        $oldData = $this->activitiesModel->find($data['a_Id']);
        $data['a_UpdateAt'] = date('y-m-d h:i:s');

        // 處理圖
        $file = $this->request->getFile('img');

        // 檢查是否有上傳新圖片
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $data['a_Img'] = $file->getName();
        } else {
            $data['a_Img'] = $oldData['a_Img'];
        }

        if ($this->activitiesModel->update($data['a_Id'], $data)) {
            if ($file && $file->isValid() && !$file->hasMoved()) {
                log_message('debug', $oldData['a_Img']);
                // 有上傳新圖片，先刪除舊圖片
                if (!empty($oldData['a_Img'])) {
                    $this->uploadSer->deleteFile($oldData['a_Img'], $this->dirPath);
                }

                // 上傳新圖片
                $this->uploadSer->uploadFile($file, $this->dirPath, $data['a_Img']);
            }
        }

        return redirect()->to('backend/news');
    }

    public function delete($id = null)
    {
        $this->activitiesModel->delete($id);
    }
}
