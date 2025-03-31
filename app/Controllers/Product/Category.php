<?php

namespace App\Controllers\Products;

use App\Controllers\BaseController;

class Category extends BaseController
{
    public function electronic()
    {
        return view('products/category/electronic');
    }

    public function mobileParts()  // 注意這裡使用 camelCase
    {
        $data = [
            'title' => '行動電話零件系列 - '.config('App')->siteName,
            'page' => 'products'
        ];
        return view('products/category/mobile-parts', $data);
    }

    public function rfCable()  // 注意這裡使用 camelCase
    {
        $data = [
            'title' => '高頻線材組裝 - '.config('App')->siteName,
            'page' => 'products'
        ];
        return view('products/category/rf-cable', $data);
    }
}