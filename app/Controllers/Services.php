<?php

namespace App\Controllers;

use App\Models\ConsultaionsModel;

// 活動訊息
class Services extends BaseController
{
    private $consultationsModel;

    public function __construct()
    {
        $this->consultationsModel = new ConsultaionsModel();
    }

    // 前台列表
    public function index()
    {
        $consultations = $this->consultationsModel->findAll();
        $data = [
            'services' => $consultations
        ];

        return view('support/index', $data);
    }
}
