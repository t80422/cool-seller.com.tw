<?php

namespace App\Controllers;

use App\Models\ProductMainCategoriesModel;
use App\Models\ProductModel;
use App\Models\ProductSubCategoriesModel;

class Products extends BaseController
{
    private $pmcModel;
    private $pscModel;
    private $productModel;

    public function __construct()
    {
        $this->pmcModel = new ProductMainCategoriesModel();
        $this->pscModel = new ProductSubCategoriesModel();
        $this->productModel = new ProductModel();
    }

    // 前台大分類列表
    public function index_main()
    {
        $datas = $this->pmcModel->findAll();

        $breadcrumbs = [
            [
                'name' => '首頁',
                'url' => '/',
                'position' => 1
            ],
            [
                'name' => '公司產品',
                'url' => null,
                'position' => 2,
                'active' => true
            ]
        ];

        return view('products/index_main', [
            'datas' => $datas,
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // 前台次分類列表
    public function index_sub(int $pmcId)
    {
        $mains = $this->pmcModel->getEnabledCategories();
        $mainsById = array_column($mains, null, 'pmc_Id');
        $main = $mainsById[$pmcId] ?? null;
        $subProducts = $this->pscModel->getByPMCId($pmcId);
        // 組織麵包屑數據
        $breadcrumbs = [
            [
                'name' => '首頁',
                'url' => '/',
                'position' => 1
            ],
            [
                'name' => '公司產品',
                'url' => '/products',
                'position' => 2
            ],
            [
                'name' => $main['pmc_Name'],
                'url' => null,
                'position' => 3,
                'active' => true
            ]
        ];

        return view('products/index_sub', [
            'breadcrumbs' => $breadcrumbs,
            'mains' => $mains,
            'mainProduct' => $main,
            'category' => $main['pmc_Name'],
            'subProducts' => $subProducts
        ]);
    }

    // 前台列表
    public function index(int $pscId)
    {
        $keyword = $this->request->getGet('keyword') ?? '';

        // 標籤
        $selectedTags = $this->request->getGet('tags') ?? [];

        if (!is_array($selectedTags)) {
            $selectedTags = [$selectedTags];
        }

        // 分頁
        $page = (int)$this->request->getGet('page') ?: 1;

        $result = $this->productModel->search($keyword, $selectedTags, $page, $pscId);
        $products = $result['products'];
        $subCategory = $this->pscModel->find($pscId);
        $mainCategory = $this->pmcModel->find($subCategory['psc_pmc_Id']);
        $mainCategoryId = $mainCategory['pmc_Id'];
        $subCategories = $this->pscModel->getByPMCId($mainCategoryId);

        $breadcrumbs = [
            [
                'name' => '首頁',
                'url' => '/',
                'position' => 1
            ],
            [
                'name' => '公司產品',
                'url' => '/products',
                'position' => 2
            ],
            [
                'name' => $mainCategory['pmc_Name'],
                'url' => '/products/index_sub/' . $mainCategoryId,
                'position' => 3
            ],
            [
                'name' => $subCategory['psc_Name'],
                'url' => null,
                'position' => 4,
                'active' => true
            ]
        ];

        $tags = explode(',', $subCategory['psc_Tag']);

        // 去除標籤中可能的空格
        $tags = array_map('trim', $tags);

        // 過濾空標籤
        $tags = array_filter($tags, function ($tag) {
            return !empty($tag);
        });

        return view('products/index', [
            'breadcrumbs' => $breadcrumbs,
            'subProducts' => $subCategories,
            'subProduct' => $subCategory,
            'products' => $products,
            'keyword' => $keyword,
            'tags' => $tags,
            'selectedTags' => $selectedTags,
            'page' => $result['page'],
            'totalPages' => $result['totalPages']
        ]);
    }

    // 前台詳細
    public function detail($id = null)
    {
        $breadcrumbData = $this->productModel->getProductWithPMCAndPSC($id);
        $breadcrumbs = [
            [
                'name' => '首頁',
                'url' => '/',
                'position' => 1
            ],
            [
                'name' => '公司產品',
                'url' => '/products',
                'position' => 2
            ],
            [
                'name' => $breadcrumbData['pmc_Name'],
                'url' => '/products/index_sub/' . $breadcrumbData['pmc_Id'],
                'position' => 3
            ],
            [
                'name' => $breadcrumbData['psc_Name'],
                'url' => '/products/index/' . $breadcrumbData['psc_Id'],
                'position' => 4
            ],
            [
                'name' => $breadcrumbData['p_Name'],
                'url' => null,
                'position' => 5,
                'active' => true
            ]
        ];

        $data = $this->productModel->find($id);

        return view('products/detail', [
            'breadcrumbs' => $breadcrumbs,
            'data' => $data
        ]);
    }

    // 前台搜尋
    public function search()
    {
        // 獲取搜尋關鍵字
        $keyword = $this->request->getGet('keyword');

        // 如果沒有提供關鍵字，返回空結果
        if (empty($keyword)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => '請輸入搜尋關鍵字',
                'products' => [],
                'totalResults' => 0
            ]);
        }

        // 調用模型的搜尋方法獲取結果
        $products = $this->productModel->searchByName($keyword);

        // 準備結果數據
        $response = [
            'status' => 'success',
            'products' => $products,
            'totalResults' => count($products),
            'keyword' => $keyword
        ];

        // 返回 JSON 響應
        return $this->response->setJSON($response);
    }

    // 前台全站搜尋
    public function globalSearch()
    {
        $keyword = $this->request->getVar('keyword');
        $mains = $this->pmcModel->findAll();
        $breadcrumbs = [
            [
                'name' => '首頁',
                'url' => '/',
                'position' => 1
            ],
            [
                'name' => '公司產品',
                'url' => '/products',
                'position' => 2
            ],
            [
                'name' => $keyword,
                'url' => null,
                'position' => 3,
                'active' => true
            ]
        ];
        $page = (int)$this->request->getGet('page') ?: 1;
        $products = $this->productModel->globalSearch($keyword, $page);

        return view('products/index_global', [
            'breadcrumbs' => $breadcrumbs,
            'mains' => $mains,
            'products' => $products['products'],
            'page' => $page,
            'totalPages' => $products['totalPages']
        ]);
    }
}
