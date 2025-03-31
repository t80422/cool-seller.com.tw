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
		$this->BannersModel = new BannersModel();
    }

    public function index()
    {
        $pmcs = $this->pmcModel->findAll();
        $prodcuts = $this->productModel->getStarProducts();
        $news = $this->newsModel->getHotActivities();
		$banners = $this->BannersModel->getAllBanners();

        return view('home/index', [
            'pmcs' => $pmcs,
            'products' => $prodcuts,
            'news' => $news,
			'banners'=>$banners
        ]);
    }
}
