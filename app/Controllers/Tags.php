<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\TagsModel;

class Tags extends Controller
{
    private $tagsModel;

    public function __construct()
    {
        $this->tagsModel = new TagsModel();
    }

    // 列表
    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        $pager = service('pager');
        $page = (int)($this->request->getGet('page') ?? 1);
        $datas = $this->tagsModel->getList($keyword, $page);
        $pager_links = $pager->makeLinks($page, $datas['perPage'], $datas['total'], 'backend_pages');

        $data = [
            'pager_links' => $pager_links,
            'Datas' => $datas['items'],
            'keyword' => !empty($this->request->getGet('keyword')) ? $this->request->getGet('keyword') : '',
        ];

        return view('backend/tags/index', $data);
    }

    // 新增
    public function create()
    {
        return view('backend/tags/form', [
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
        $enable = $this->request->getVar('enable') ? 1 : 0;

        // 收集表單數據
        $data = [
            't_name' => $this->request->getVar('name'),
            't_sort' => $this->request->getVar('sort'),
            't_enable' => $enable,
        ];

        // 執行驗證
        if (!$this->tagsModel->validate($data)) {
            $errors = $this->tagsModel->errors();
            return redirect()->back()->withInput()->with('validation', $errors);
        }

        // 驗證通過，插入數據
        try {
            if (!$this->tagsModel->insert($data)) {
                $errors = $this->tagsModel->errors();
                log_message('error', '資料庫插入錯誤: ' . print_r($errors, true));
                return redirect()->back()->withInput()->with('error', '資料庫錯誤');
            }
            
            return redirect()->to('backend/tags')->with('message', 'TAG新增成功');
        } catch (\Exception $e) {
            log_message('error', '新增TAG異常: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', '系統錯誤，請聯繫管理員');
        }
    }

    // 修改
    public function edit($id = null)
    {
        $data = $this->tagsModel->find($id);

        return view('backend/tags/form', [
            'isEdit' => true,
            'tag' => $data
        ]);
    }

    // 修改資料
    public function edititem()
    {
        $tagId = $this->request->getVar('tagId');
        
        $data = [
            't_name' => $this->request->getVar('name'),
            't_sort' => $this->request->getVar('sort'),
            't_enable' => $this->request->getVar('enable') ? 1 : 0,
        ];

        // 執行驗證
        if (!$this->tagsModel->validate($data)) {
            $errors = $this->tagsModel->errors();
            return redirect()->back()->withInput()->with('validation', $errors);
        }

        try {
            if (!$this->tagsModel->update($tagId, $data)) {
                $errors = $this->tagsModel->errors();
                return redirect()->back()->withInput()->with('error', '資料庫錯誤');
            }
            
            return redirect()->to('backend/tags')->with('message', 'TAG資料更新成功');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', '系統錯誤，請聯繫管理員');
        }
    }

    // 刪除資料
    public function delitem($sn = null)
    {
        $this->tagsModel->delete($sn);
        return redirect()->back()->with('message', 'TAG已刪除');
    }
} 