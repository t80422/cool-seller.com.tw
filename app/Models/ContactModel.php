<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model
{
    protected $table = 'contacts';
    protected $primaryKey = 'co_Id';
    protected $allowedFields = [
        'co_Name', // 姓名
        'co_Email', // 信箱
        'co_Subject', // 標題
        'co_Message' // 訊息
    ];

    public function getList($keyword, $page = 1)
    {
        $builder = $this->builder();

        if (!empty($keyword)) {
            $builder->groupStart()
                ->like('co_Name', $keyword)
                ->orLike('co_Email', $keyword)
                ->orLike('co_Subject', $keyword)
                ->groupEnd();
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