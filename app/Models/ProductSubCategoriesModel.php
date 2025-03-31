<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductSubCategoriesModel extends Model
{
    protected $table            = 'product_sub_categories';
    protected $primaryKey       = 'psc_Id';
    protected $allowedFields    = [
        'psc_Name', // 名稱
        'psc_pmc_Id', // 產品類別編號
        'psc_UpdateAt', // 更新時間
        'psc_Image', // 圖
        'psc_Tag', // 標籤 (用逗號區分)
        'psc_ImageName', // 檔案名稱
        'psc_Enabled', // 開關
        'psc_Sort' // 排序
    ];

    public function getOneSCData($sn)
    {

        $builder = $this->db->table('product_sub_categories')
            ->select('*')->where('psc_Id', $sn)
            ->join('product_main_categories', 'product_sub_categories.psc_pmc_Id = product_main_categories.pmc_Id ');
        return $builder->get()->getResult();
    }

    public function getSCData($limit, $offset)
    {

        $builder = $this->db->table('product_sub_categories')
            ->select('*')
            ->join('product_main_categories', 'product_sub_categories.psc_pmc_Id = product_main_categories.pmc_Id ')
            ->limit($limit, $offset);
        return $builder->get()->getResult();
    }

    public function getCount()
    {
        $builder = $this->db->table('product_sub_categories')
            ->select('*')
            ->join('product_main_categories', 'product_sub_categories.psc_pmc_Id = product_main_categories.pmc_Id ');
        return $builder->countAllResults();
    }

    public function getByPMCId($pmcId)
    {
        return $this->where('psc_pmc_Id', $pmcId)->findAll();
    }

    public function  getTagsById($id)
    {
        $result = $this->select('psc_Tag')->where('psc_Id', $id)->first();

        if (!$result || empty($result['psc_Tag'])) {
            return [];
        }

        $tags = explode(',', $result['psc_Tag']);

        return array_map('trim', $tags);
    }
}
