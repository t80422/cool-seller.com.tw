<?php

namespace App\Models;

use CodeIgniter\Model;

class TagsModel extends Model
{
    protected $table = 'tags';
    protected $primaryKey = 't_id';
    protected $returnType = 'array';
    protected $allowedFields = [
        't_name', 't_enable', 't_sort', 
        't_create_at', 't_update_at'
    ];

    // 日期欄位
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 't_create_at';
    protected $updatedField = 't_update_at';
    protected $deletedField = '';

    // 驗證規則
    protected $validationRules = [
        't_name' => 'required|min_length[2]|max_length[50]',
        't_sort' => 'required|integer',
    ];

    protected $validationMessages = [
        't_name' => [
            'required' => 'TAG名稱為必填項',
            'min_length' => 'TAG名稱至少需要2個字元',
            'max_length' => 'TAG名稱最多50個字元'
        ],
        't_sort' => [
            'required' => '排序為必填項',
            'integer' => '排序必須是整數'
        ]
    ];

    // 查詢列表
    public function getList($keyword = null, $page = 1, $perPage = 10)
    {
        $builder = $this->builder();
        
        // 如果有關鍵字搜尋
        if (!empty($keyword)) {
            $builder->like('t_name', $keyword);
        }
        
        // 設定排序
        $builder->orderBy('t_sort', 'ASC');
        
        // 計算總筆數
        $total = $builder->countAllResults(false);
        
        // 取得分頁資料
        $data = $builder->limit($perPage, ($page - 1) * $perPage)->get()->getResultArray();
        
        return [
            'items' => $data,
            'total' => $total,
            'perPage' => $perPage
        ];
    }

    /**
     * 獲取所有啟用的標籤
     * 
     * @return array 啟用的標籤列表
     */
    public function getEnabledTags(): array
    {
        return $this->where('t_enable', 1)
                    ->orderBy('t_sort', 'ASC')
                    ->findAll();
    }
} 