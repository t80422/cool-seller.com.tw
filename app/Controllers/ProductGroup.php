<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductGroupModel;

class ProductGroup extends Controller
{
    private $pgModel;

    public function __construct()
    {
        $this->pgModel = new ProductGroupModel();
    }

    // 列表
    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        $pager = service('pager');
        $page = (int)($this->request->getGet('page') ?? 1);
        $datas = $this->pgModel->getList($keyword, $page);
        $pager_links = $pager->makeLinks($page, $datas['perPage'], $datas['total'], 'backend_pages');

        $data = [
            'pager_links' => $pager_links,
            'Datas' => $datas['items'],
            'keyword' => !empty($this->request->getGet('keyword')) ? $this->request->getGet('keyword') : '',
        ];

        return view('backend/product_group/index', $data);
    }

    // 新增
    public function create()
    {
        return view('backend/product_group/form', [
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
        $enabled = $this->request->getVar('enabled') ? 1 : 0;

        // 收集表單數據
        $data = [
            'pg_name' => $this->request->getVar('name'),
            'pg_sort' => $this->request->getVar('sort'),
            'pg_enabled' => $enabled,
        ];

        // 執行驗證
        if (!$this->pgModel->validate($data)) {
            $errors = $this->pgModel->errors();
            return redirect()->back()->withInput()->with('validation', $errors);
        }

        // 驗證通過，插入數據
        try {
            if (!$this->pgModel->insert($data)) {
                $errors = $this->pgModel->errors();
                log_message('error', '資料庫插入錯誤: ' . print_r($errors, true));
                return redirect()->back()->withInput()->with('error', '資料庫錯誤');
            }
            
            return redirect()->to(base_url('backend/product_group'))->with('message', '作品分類新增成功');
        } catch (\Exception $e) {
            log_message('error', '新增作品分類異常: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', '系統錯誤，請聯繫管理員');
        }
    }

    // 修改
    public function edit($id = null)
    {
        $data = $this->pgModel->find($id);

        return view('backend/product_group/form', [
            'isEdit' => true,
            'group' => $data
        ]);
    }

    // 修改資料
    public function edititem()
    {
        $groupId = $this->request->getVar('groupId');
        
        $data = [
            'pg_name' => $this->request->getVar('name'),
            'pg_sort' => $this->request->getVar('sort'),
            'pg_enabled' => $this->request->getVar('enabled') ? 1 : 0,
        ];

        // 執行驗證
        if (!$this->pgModel->validate($data)) {
            $errors = $this->pgModel->errors();
            return redirect()->back()->withInput()->with('validation', $errors);
        }

        try {
            if (!$this->pgModel->update($groupId, $data)) {
                $errors = $this->pgModel->errors();
                return redirect()->back()->withInput()->with('error', '資料庫錯誤');
            }
            
            return redirect()->to(base_url('backend/product_group'))->with('message', '作品分類資料更新成功');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', '系統錯誤，請聯繫管理員');
        }
    }

    // 刪除資料
    public function delitem($sn = null)
    {
        $this->pgModel->delete($sn);
        return redirect()->back()->with('message', '作品分類已刪除');
    }
} 