<?php

namespace App\Controllers;

use App\Libraries\UploadService;
use App\Models\ConsultaionsModel;
use App\Models\DownloadCategoriesModel;
use App\Models\DownloadsModel;

class Support extends BaseController
{
    private $consultationsModel;
    private $dcModel;
    private $downloadModel;
    private $uploadSer;

    public function __construct()
    {
        $this->consultationsModel = new ConsultaionsModel();
        $this->dcModel = new DownloadCategoriesModel();
        $this->downloadModel = new DownloadsModel();
        $this->uploadSer = new UploadService();
    }

    // 前台技術支援列表
    public function index()
    {
        $consultations = $this->consultationsModel->getList();
        $categories = $this->dcModel->getAllWithDownloads();

        $data = [
            'services' => $consultations,
            'dCategories' => $categories
        ];

        return view('support/index', $data);
    }

    // 前台下載檔案
    public function download($fileName)
    {
        $filePath = ROOTPATH . 'uploads/downloads/' . $fileName;

        return $this->response->download($filePath, null)
            ->setContentType(mime_content_type($filePath));
    }

    // 後台產品諮詢服務管理列表
    public function index_consultations()
    {
        $keyword = $this->request->getGet('keyword');
        $pager = service('pager');
        $page = (int)($this->request->getGet('page') ?? 1);
        $datas = $this->consultationsModel->getList_Backend($page, $keyword);
        $pager_links = $pager->makeLinks($page, $datas['perPage'], $datas['total'], 'backend_pages');

        return view('support\index_consultations', [
            'datas' => $datas['items'],
            'pager_links' => $pager_links,
            'keyword' => !empty($keyword) ? $keyword : ''
        ]);
    }

    // 後台產品諮詢服務新增
    public function create_consultations()
    {
        return view('support/form_consultations', [
            'isEdit' => false
        ]);
    }

    // 後台產品諮詢服務新增送出
    public function create_consultations_submit()
    {
        $datas = $this->request->getPost();

        if (!$this->consultationsModel->insert($datas)) {
            return redirect()->back()
                ->withInput()
                ->with('validation', $this->consultationsModel->errors());
        }

        return redirect()->to('backend/consultations');
    }

    // 後台產品諮詢服務修改
    public function edit_consultations($id = null)
    {
        $data = $this->consultationsModel->find($id);

        return view('support/form_consultations', [
            'isEdit' => true,
            'data' => $data
        ]);
    }

    // 後台產品諮詢服務修改送出
    public function edit_consultations_submit()
    {
        $data = $this->request->getPost();
        $data['c_UpdateAt'] = date('Y-m-d H:i:s');

        if (!$this->consultationsModel->update($data['c_Id'], $data)) {
            return redirect()->back()
                ->withInput()
                ->with('validation', $this->consultationsModel->errors());
        }

        return redirect()->to('backend/consultations');
    }

    // 後台產品諮詢服務刪除
    public function delete_consultations($id = null)
    {
        $this->consultationsModel->delete($id);
    }

    // 後台產品諮詢服務管理列表
    public function index_download()
    {
        $keyword = $this->request->getGet('keyword');
        $pager = service('pager');
        $page = (int)($this->request->getGet('page') ?? 1);
        $datas = $this->downloadModel->getList($page, $keyword);
        $pager_links = $pager->makeLinks($page, $datas['perPage'], $datas['total'], 'backend_pages');

        return view('support\index_download', [
            'datas' => $datas['items'],
            'pager_links' => $pager_links,
            'keyword' => !empty($keyword) ? $keyword : ''
        ]);
    }

    // 後台產品諮詢服務新增
    public function create_download()
    {
        $dc = $this->dcModel->findAll();

        return view('support/form_download', [
            'isEdit' => false,
            'categories' => $dc
        ]);
    }

    // 後台產品諮詢服務新增送出
    public function create_download_submit()
    {
        // 處理檔案上傳
        $file = $this->request->getFile('file');
        $fileName = $file->getClientName();
        $datas = $this->request->getPost();

        if ($file->isValid() && !$file->hasMoved()) {
            $this->uploadSer->uploadFile($file, 'downloads', $fileName);
            $datas['d_FileName'] = $fileName;
        }

        if (!$this->downloadModel->insert($datas)) {
            $this->uploadSer->deleteFile($fileName, 'downloads');

            return redirect()->back()
                ->withInput()
                ->with('validation', $this->consultationsModel->errors());
        }

        return redirect()->to('backend/downloads');
    }

    // 後台產品諮詢服務修改
    public function edit_download($id = null)
    {
        $data = $this->downloadModel->find($id);
        $dc = $this->dcModel->findAll();

        return view('support/form_download', [
            'isEdit' => true,
            'data' => $data,
            'categories' => $dc
        ]);
    }

    // 後台產品諮詢服務修改送出
    public function edit_download_submit()
    {
        $data = $this->request->getPost();
        $data['d_UpdateAt'] = date('Y-m-d H:i:s');
        $orgData = $this->downloadModel->find($data['d_Id']);
        $orgFileName = $orgData['d_FileName'];

        // 處理檔案上傳
        $file = $this->request->getFile('file');
        $fileName = $file->getClientName();

        if ($file->isValid() && !$file->hasMoved()) {
            $this->uploadSer->uploadFile($file, 'downloads', $fileName);
            $data['d_FileName'] = $fileName;
        }

        if (!$this->downloadModel->update($data['d_Id'], $data)) {
            $this->uploadSer->deleteFile($fileName, 'downloads');

            return redirect()->back()
                ->withInput()
                ->with('validation', $this->consultationsModel->errors());
        }

        // 刪除舊檔案
        if (!empty($orgFileName)) {
            $this->uploadSer->deleteFile($orgFileName, 'downloads');
        }

        return redirect()->to('backend/downloads');
    }

    // 後台產品諮詢服務刪除
    public function delete_download($id = null)
    {
        $data = $this->downloadModel->find($id);
        $fileName = $data['d_FileName'];
        $this->downloadModel->delete($id);
        $this->uploadSer->deleteFile($fileName, 'downloads');
    }
}
