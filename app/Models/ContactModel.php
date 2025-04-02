<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model
{
    protected $table = 'contacts';
    protected $primaryKey = 'co_id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'co_name', 'co_email', 'co_subject', 'co_message', 'co_create_at'
    ];

    // 日期欄位
    protected $useTimestamps = false;
    protected $createdField = 'co_create_at';

    // 查詢列表
    public function getList($keyword = null, $page = 1, $perPage = 10)
    {
        $builder = $this->builder();
        
        // 如果有關鍵字搜尋
        if (!empty($keyword)) {
            $builder->groupStart()
                ->like('co_name', $keyword)
                ->orLike('co_email', $keyword)
                ->orLike('co_subject', $keyword)
                ->orLike('co_message', $keyword)
                ->groupEnd();
        }
        
        // 設定排序 (最新的顯示在前面)
        $builder->orderBy('co_create_at', 'DESC');
        
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
}