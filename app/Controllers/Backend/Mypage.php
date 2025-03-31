<?php

namespace App\Controllers\Backend;

use CodeIgniter\Controller;
use App\Models\TodaypwModel;

class Mypage extends Controller{
    // 首頁
    public function index(){
        $TodayPwd = (new TodaypwModel())->orderBy('tp_sn','desc')->first();
        
        $Pwd = $TodayPwd != null ? $TodayPwd['tp_password'] : '';

        $data = [
            'TodayPwd' => $Pwd,
        ];

        return view('mypage/index',$data);
    }
	
	
}