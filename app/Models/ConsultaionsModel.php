<?php

namespace App\Models;

use CodeIgniter\Model;

class ConsultaionsModel extends Model
{
    protected $table = 'consultations';
    protected $primaryKey = 'c_Id';
    protected $allowedFields = [
        'c_Name', // 名稱
        'c_Phone', // 電話
        'c_Extension', // 分機
        'c_Description', // 描述
        'c_CreateAt', // 建立時間
        'c_UpdateAt', // 更新時間
        'c_Sequence', // 排序
        'c_IsShow' // 是否顯示
    ];
    protected $validationRules = [
        'c_Phone' => 'regex_match[/^[0-9]{2,4}-?[0-9]{3,4}-?[0-9]{3,4}$/]',
        'c_Extension' => 'permit_empty|numeric|max_length[5]',
    ];
    protected $validationMessages = [
        'c_Phone' => [
            'regex_match' => '電話號碼格式不正確，請使用如 02-12345678 的格式'
        ],
        'c_Extension' => [
            'numeric' => '分機號碼只能包含數字',
            'max_length' => '分機號碼最多不超過5位數'
        ]
    ];

    public function getList()
    {
        return $this->where('c_IsShow', true)
            ->orderBy('c_Sequence', 'asc')
            ->findAll();
    }

    public function getList_Backend($page, $keyword)
    {
        $builder = $this->builder();

        if (!empty($keyword)) {
            $builder->like('c_Name', $keyword);
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
