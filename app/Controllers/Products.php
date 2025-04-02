<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductsModel;
use App\Models\ProductGroupModel;
use App\Models\TagsModel;

class Products extends Controller
{
    private $productsModel;
    private $pgModel;
    private $tagModel;

    public function __construct()
    {
        $this->productsModel = new ProductsModel();
        $this->pgModel = new ProductGroupModel();
        $this->tagModel = new TagsModel();
    }

    // 列表
    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        $categoryId = $this->request->getGet('category');
        $pager = service('pager');
        $page = (int)($this->request->getGet('page') ?? 1);
        $datas = $this->productsModel->getList($keyword, $categoryId, $page);
        $pager_links = $pager->makeLinks($page, $datas['perPage'], $datas['total'], 'backend_pages');

        // 獲取所有啟用的作品分類，用於篩選
        $categories = $this->pgModel->getEnabledCategories();

        $data = [
            'pager_links' => $pager_links,
            'Datas' => $datas['items'],
            'keyword' => !empty($this->request->getGet('keyword')) ? $this->request->getGet('keyword') : '',
            'selectedCategory' => $categoryId,
            'categories' => $categories,
        ];

        return view('backend/products/index', $data);
    }
    
    // 新增
    public function create()
    {
        // 獲取所有啟用的作品分類
        $categories = $this->pgModel->getEnabledCategories();
        
        // 獲取所有啟用的標籤
        $tags = $this->tagModel->getEnabledTags();
        
        return view('backend/products/form', [
            'isEdit' => false,
            'categories' => $categories,
            'tags' => $tags,
            'selectedTags' => []
        ]);
    }
    
    // 送出新增
    public function additem()
    {
        // 檢查是否為 POST 請求
        if (! $this->request->is('post')) {
            return redirect()->back();
        }
        
        // 收集表單數據
        $data = [
            'p_name' => $this->request->getVar('name'),
            'p_description' => $this->request->getVar('description'),
            'p_pg_id' => $this->request->getVar('category'),
            'p_link' => $this->request->getVar('link'),
            'p_sort' => $this->request->getVar('sort'),
        ];
        
        // 獲取選中的標籤
        $tagIds = $this->request->getVar('tags') ?? [];
        
        // 使用模型插入數據與標籤
        $result = $this->productsModel->addProduct($data, $tagIds);
        
        if (!$result['status']) {
            return redirect()->back()->withInput()->with('validation', $result['errors']);
        }
        
        return redirect()->to(base_url('backend/products'))->with('message', '作品新增成功');
    }
    
    // 刪除資料
    public function delitem($sn = null)
    {
        $result = $this->productsModel->deleteProduct($sn);
        
        if ($result) {
            return redirect()->back()->with('message', '作品已刪除');
        } else {
            return redirect()->back()->with('error', '刪除失敗，請稍後再試');
        }
    }

    // 修改
    public function edit($id = null)
    {
        // 獲取作品資料
        $product = $this->productsModel->find($id);
        
        if (empty($product)) {
            return redirect()->to(base_url('backend/products'))->with('error', '找不到此作品');
        }
        
        // 獲取所有啟用的作品分類
        $categories = $this->pgModel->getEnabledCategories();
        
        // 獲取所有啟用的標籤
        $tags = $this->tagModel->getEnabledTags();
        
        // 獲取作品已選擇的標籤
        $selectedTags = $this->productsModel->getProductTags($id);
        
        return view('backend/products/form', [
            'isEdit' => true,
            'product' => $product,
            'categories' => $categories,
            'tags' => $tags,
            'selectedTags' => $selectedTags
        ]);
    }
    
    // 修改資料
    public function edititem()
    {
        // 檢查是否為 POST 請求
        if (! $this->request->is('post')) {
            return redirect()->back();
        }
        
        $productId = $this->request->getVar('productId');
        
        // 收集表單數據
        $data = [
            'p_name' => $this->request->getVar('name'),
            'p_description' => $this->request->getVar('description'),
            'p_pg_id' => $this->request->getVar('category'),
            'p_link' => $this->request->getVar('link'),
            'p_sort' => $this->request->getVar('sort'),
        ];
        
        // 獲取選中的標籤
        $tagIds = $this->request->getVar('tags') ?? [];
        
        // 使用模型更新數據與標籤
        $result = $this->productsModel->updateProduct($productId, $data, $tagIds);
        
        if (!$result['status']) {
            return redirect()->back()->withInput()->with('validation', $result['errors']);
        }
        
        return redirect()->to(base_url('backend/products'))->with('message', '作品更新成功');
    }
} 