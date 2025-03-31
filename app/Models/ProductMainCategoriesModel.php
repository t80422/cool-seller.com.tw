<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductMainCategoriesModel extends Model
{
    protected $table            = 'product_main_categories';
    protected $primaryKey       = 'pmc_Id';
    protected $allowedFields    = [
        'pmc_Name', // 名稱
        'pmc_Desc', //大分類說明
        'pmc_CreateAt', // 建立時間
        'pmc_UpdateAt', // 更新時間
        'pmc_ImageName', // 圖檔名稱
        'pmc_Enabled', // 是否啟動1啟用 0停用
        'pmc_Sort' // 排序，數字越小排前面
    ];

    public function getEnabledCategories()
    {
        return $this->where('pmc_Enabled', 1)
            ->orderBy('pmc_Sort', 'ASC')
            ->findAll();
    }

    public function getList($page, $keyword)
    {
        $builder = $this->builder();

        if (!empty($keyword)) {
            $builder->like('pmc_Name', $keyword);
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

    public function getDropDownList(){
        return $this->select('pmc_Id,pmc_Name')
        ->findAll();
    }
}
