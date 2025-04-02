<?php

namespace App\Controllers;

use App\Models\ActivitiesModel;
use App\Models\ProductMainCategoriesModel;
use App\Models\ProductModel;
use App\Models\BannersModel;

class Home extends BaseController
{
    protected $pmcModel;
    private $productModel;
    private $newsModel;

    public function __construct()
    {
        $this->pmcModel = new ProductMainCategoriesModel();
        $this->productModel = new ProductModel();
        $this->newsModel = new ActivitiesModel();
    }

    public function index()
    {
        $prodcuts = $this->productModel->getStarProducts();
        $news = $this->newsModel->getHotActivities();

        return view('home/index', [
            'products' => $prodcuts,
            'news' => $news,
        ]);
    }
}
