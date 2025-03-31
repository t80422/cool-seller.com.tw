<?php

namespace App\Controllers;

class About extends BaseController
{
    public function index()
    {
        $data = [
            'title' => '關於我們 - '.config('App')->siteName,
            'page' => 'about'
        ];
        
        return view('about/index', $data);
    }
}