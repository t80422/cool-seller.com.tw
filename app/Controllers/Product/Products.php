<?php

namespace App\Controllers\Products;

use App\Controllers\BaseController;

class Products extends BaseController
{
    public function index()
    {
        $data = [
            'title' => '產品介紹 - '.config('App')->siteName,
            'page' => 'products'
        ];
        
        return view('products/index', $data);
    }
}