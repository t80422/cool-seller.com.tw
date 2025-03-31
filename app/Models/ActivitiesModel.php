<?php

namespace App\Models;

use CodeIgniter\Model;

class ActivitiesModel extends Model
{
    protected $table = 'activities';
    protected $primaryKey = 'a_Id';
    protected $allowedFields = [
        'a_StartDate', // 開始日期
        'a_EndDate', // 結束日期
        'a_Title', // 標題
        'a_Content', // 內容
        'a_CreateAt', // 建立時間
        'a_UpdateAt', // 更新時間
        'a_IsShow', // 是否顯示
        'a_IsPinned', // 是否置頂
        'a_Img' // 圖
    ];

    public function getList($page = 1, $keyword = null)
    {
        $this->where('a_IsShow', true);

        if (!empty($keyword)) {
            $this->like('a_Content', $keyword);
        }

        return $this->orderBy('a_StartDate', 'DESC')
            ->paginate(10, 'default', $page);
    }

    public function getHotActivities()
    {
        return $this->where('a_IsShow', true)
            ->where('a_IsPinned', true)
            ->orderBy('a_StartDate', 'DESC')
            ->findAll(3);
    }

    public function getListForBackend($page, $keyword)
    {
        $builder = $this->builder();

        if (!empty($keyword)) {
            $builder->like('a_Title', $keyword);
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
