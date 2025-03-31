<?php

namespace App\Controllers\Backend;

use CodeIgniter\Controller;

class Setting extends Controller{
  
	
	// 主頁
    public function mypage(){
        return view('backend/setting/mypage');
    }
   
}