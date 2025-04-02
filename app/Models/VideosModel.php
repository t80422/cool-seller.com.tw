<?php

namespace App\Models;

use CodeIgniter\Model;

class VideosModel extends Model
{
    protected $table = 'videos';
    protected $primaryKey = 'v_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'v_title', 'v_content', 'v_url', 'v_sort', 
        'v_display', 'v_create_at', 'v_update_at'
    ];

    // 日期欄位
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'v_create_at';
    protected $updatedField = 'v_update_at';
    protected $deletedField = '';

    // 驗證規則
    protected $validationRules = [
        'v_title' => 'required|min_length[2]|max_length[100]',
        'v_url' => 'required|valid_url',
        'v_sort' => 'required|integer',
    ];

    protected $validationMessages = [
        'v_title' => [
            'required' => '標題為必填項',
            'min_length' => '標題至少需要2個字元',
            'max_length' => '標題最多100個字元'
        ],
        'v_url' => [
            'required' => '影片連結為必填項',
            'valid_url' => '請輸入有效的URL'
        ],
        'v_sort' => [
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
            $builder->like('v_title', $keyword);
            $builder->orLike('v_content', $keyword);
        }
        
        // 設定排序
        $builder->orderBy('v_sort', 'ASC');
        
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