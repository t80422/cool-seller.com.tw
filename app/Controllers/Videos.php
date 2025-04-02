<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\VideosModel;

class Videos extends Controller
{
    private $videosModel;

    public function __construct()
    {
        $this->videosModel = new VideosModel();
    }

    // 列表
    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        $pager = service('pager');
        $page = (int)($this->request->getGet('page') ?? 1);
        $datas = $this->videosModel->getList($keyword, $page);
        $pager_links = $pager->makeLinks($page, $datas['perPage'], $datas['total'], 'backend_pages');

        $data = [
            'pager_links' => $pager_links,
            'Datas' => $datas['items'],
            'keyword' => !empty($this->request->getGet('keyword')) ? $this->request->getGet('keyword') : '',
        ];

        return view('backend/videos/index', $data);
    }

    // 新增
    public function create()
    {
        return view('backend/videos/form', [
            'isEdit' => false
        ]);
    }

    // 送出新增
    public function additem()
    {
        // 檢查是否為 POST 請求
        if (! $this->request->is('post')) {
            return redirect()->back();
        }

        // 處理啟用狀態 (checkbox未勾選時不會傳值)
        $display = $this->request->getVar('display') ? 1 : 0;

        // 收集表單數據
        $data = [
            'v_title' => $this->request->getVar('title'),
            'v_content' => $this->request->getVar('content'),
            'v_url' => $this->request->getVar('url'),
            'v_sort' => $this->request->getVar('sort'),
            'v_display' => $display,
        ];

        // 執行驗證
        if (!$this->videosModel->validate($data)) {
            $errors = $this->videosModel->errors();
            return redirect()->back()->withInput()->with('validation', $errors);
        }

        // 驗證通過，插入數據
        try {
            if (!$this->videosModel->insert($data)) {
                $errors = $this->videosModel->errors();
                log_message('error', '資料庫插入錯誤: ' . print_r($errors, true));
                return redirect()->back()->withInput()->with('error', '資料庫錯誤');
            }
            
            return redirect()->to('backend/videos')->with('message', '創業教學新增成功');
        } catch (\Exception $e) {
            log_message('error', '新增創業教學異常: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', '系統錯誤，請聯繫管理員');
        }
    }

    // 修改
    public function edit($id = null)
    {
        $data = $this->videosModel->find($id);

        return view('backend/videos/form', [
            'isEdit' => true,
            'video' => $data
        ]);
    }

    // 修改資料
    public function edititem()
    {
        $videoId = $this->request->getVar('videoId');
        
        $data = [
            'v_title' => $this->request->getVar('title'),
            'v_content' => $this->request->getVar('content'),
            'v_url' => $this->request->getVar('url'),
            'v_sort' => $this->request->getVar('sort'),
            'v_display' => $this->request->getVar('display') ? 1 : 0,
        ];

        // 執行驗證
        if (!$this->videosModel->validate($data)) {
            $errors = $this->videosModel->errors();
            return redirect()->back()->withInput()->with('validation', $errors);
        }

        try {
            if (!$this->videosModel->update($videoId, $data)) {
                $errors = $this->videosModel->errors();
                return redirect()->back()->withInput()->with('error', '資料庫錯誤');
            }
            
            return redirect()->to('backend/videos')->with('message', '創業教學資料更新成功');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', '系統錯誤，請聯繫管理員');
        }
    }

    // 刪除資料
    public function delitem($sn = null)
    {
        $this->videosModel->delete($sn);
        return redirect()->back()->with('message', '創業教學已刪除');
    }
}
