<?php

namespace App\Models;

use CodeIgniter\Model;

class DownloadsModel extends Model
{
    protected $table            = 'downloads';
    protected $primaryKey       = 'd_Id';
    protected $allowedFields    = [
        'd_dc_Id', // 下載類別編號
        'd_Name', // 名稱
        'd_Description', // 描述
        'd_FileName', // 檔案名稱
        'd_CreateAt', // 建立時間
        'd_UpdateAt', // 更新時間
        'd_Sequence', // 排序
        'd_IsShow' // 是否顯示
    ];

    public function getList($page, $keyword)
    {
        $builder = $this->builder('downloads d')
            ->join('download_categories dc', 'd.d_dc_Id = dc.dc_Id');

        if (!empty($keyword)) {
            $builder->like('d_Name', $keyword);
        }

        $total = $builder->countAllResults(false);
        $perPage = 10;
        $offset = ($page - 1) * $perPage;
        $datas = $builder->limit($perPage, $offset)
            ->get()
            ->getResultArray();

        return [
            'total' => $total,
            'perPage' => $perPage,
            'items' => $datas
        ];
    }
}
