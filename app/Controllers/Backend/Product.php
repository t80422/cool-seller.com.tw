<?php

namespace App\Controllers\Backend;

use App\Libraries\UploadService;
use App\Models\ProductMainCategoriesModel;
use CodeIgniter\Controller;
use App\Models\ProductModel;
use App\Models\ProductSubCategoriesModel;
use App\Models\ProductversionModel;
use Exception;

class Product extends Controller
{
    private $productModel;
    private $pmcModel;
    private $pscModel;
    private $uploadSer;
    private $filePath = 'products/Product/';

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->pmcModel = new ProductMainCategoriesModel();
        $this->pscModel = new ProductSubCategoriesModel();
        $this->uploadSer = new UploadService();
    }

    // 列表頁
    public function index()
    {
        $datas = $this->productModel->getAll();
        $pager = service('pager');
        $pager_links = $pager->makeLinks($datas['page'], $datas['perPage'], $datas['totalPages'], 'backend_pages');

        return view('backend/product/index', [
            'pager_links' => $pager_links,
            'datas' => $datas['datas']
        ]);
    }

    // 新增頁面
    public function create()
    {
        $pmcs = $this->pmcModel->getDropDownList();

        return view('backend/product/form', [
            'pmcs' => $pmcs
        ]);
    }

    // 取得指定大分類下的所有小分類
    public function getSubCategories($pmcId)
    {
        try {
            $datas = $this->pscModel->getByPMCId($pmcId);

            return $this->response->setJSON([
                'success' => true,
                'subCategories' => $datas
            ]);
        } catch (Exception $e) {
            return $this->response->setJSON([
                'success' => false
            ]);
        }
    }

    // 獲取指定小分類的標籤
    public function getTags($pscId)
    {
        try {
            $tagArray = $this->pscModel->getTagsById($pscId);
            return $this->response->setJSON([
                'success' => true,
                'tags' => $tagArray
            ]);
        } catch (Exception $e) {
            return $this->response->setJSON([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    // 新增資料
    public function additem()
    {
        $datas = $this->request->getPost();

        // 處理標籤
        $tags = isset($datas['p_Tag']) ? implode(',', $datas['p_Tag']) : null;
        $datas['p_Tag'] = $tags;

        // 處理圖
        $file = $this->request->getFile('img');
        $datas['p_Image'] = $file->getName();

        if ($this->productModel->insert($datas)) {
            $this->uploadSer->uploadFile($file, $this->filePath, $datas['p_Image']);
        }

        return redirect()->to('backend/product');
    }

    // 修改頁面
    public function edit($id = null)
    {
        $pmcs = $this->pmcModel->getDropDownList();
        $data = $this->productModel->getProductWithPMCAndPSC($id);

        if (!$data) {
            return redirect()->to('/backend/product')->with('error', '產品不存在');
        }

        return view('backend/product/form', [
            'pmcs' => $pmcs,
            'data' => $data
        ]);
    }

    // 修改資料
    public function edititem()
    {
        $datas = $this->request->getPost();
        $id = $datas['p_Id'];
        $originalProduct = $this->productModel->find($id);

        // 處理標籤
        $tags = isset($datas['p_Tag']) ? implode(',', $datas['p_Tag']) : null;
        $datas['p_Tag'] = $tags;

        // 處理圖
        $file = $this->request->getFile('img');

        // 檢查是否有上傳新圖片
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // 有上傳新圖片，先刪除舊圖片
            if (!empty($originalProduct['p_Image'])) {
                $this->uploadSer->deleteFile($originalProduct['p_Image'], $this->filePath);
            }

            $datas['p_Image'] = $file->getName();

            // 上傳新圖片
            $this->uploadSer->uploadFile($file, $this->filePath, $datas['p_Image']);
        } else {
            // 沒有上傳新圖片，保留原圖片
            $datas['p_Image'] = $originalProduct['p_Image'];
        }

        $datas['p_UpdatedAt'] = date('y-m-d H:i:s');

        // 更新資料庫
        if ($this->productModel->update($id, $datas)) {
            return redirect()->to('backend/product');
        } else {
            return redirect()->back()->with('error', '產品更新失敗')->withInput();
        }
    }

    // 刪除資料
    public function delete($id = null)
    {
        $this->productModel->delete($id);
    }
}
