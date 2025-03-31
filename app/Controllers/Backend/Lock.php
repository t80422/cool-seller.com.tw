<?php

namespace App\Controllers\Backend;

use CodeIgniter\Controller;
use App\Models\TodaypwModel;

class Lock extends Controller{
    // 首頁
    public function index(){
		/*
        $TodayPwd = (new TodaypwModel())->orderBy('tp_sn','desc')->first();
        
        $Pwd = $TodayPwd != null ? $TodayPwd['tp_password'] : '';

        $data = [
            'TodayPwd' => $Pwd,
        ];
*/
        return view();
    }
	// 新增頁面
    public function create(){
        return view('lock/create');
    }
}