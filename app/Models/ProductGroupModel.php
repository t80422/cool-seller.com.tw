<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductGroupModel extends Model
{
    protected $table = 'product_group';
    protected $primaryKey = 'pg_id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'pg_name', 'pg_enabled', 'pg_sort', 
        'pg_create_at', 'pg_update_at'
    ];

    // 日期欄位
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'pg_create_at';
    protected $updatedField = 'pg_update_at';

    // 驗證規則
    protected $validationRules = [
        'pg_name' => 'required|min_length[1]|max_length[100]',
        'pg_sort' => 'permit_empty|integer',
        'pg_enabled' => 'permit_empty|in_list[0,1]',
    ];

    protected $validationMessages = [
        'pg_name' => [
            'required' => '名稱不能為空',
            'min_length' => '名稱至少需要1個字元',
            'max_length' => '名稱不能超過100個字元',
        ],
        'pg_sort' => [
            'integer' => '排序必須是整數',
        ],
        'pg_enabled' => [
            'in_list' => '啟用狀態必須是有效的值',
        ],
    ];

    /**
     * 獲取作品分類列表
     *
     * @param string|null $keyword 搜索關鍵字
     * @param int $page 頁碼
     * @param int $perPage 每頁項目數
     * @return array 包含分頁的作品分類列表
     */
    public function getList(?string $keyword = null, int $page = 1, int $perPage = 10): array
    {
        $builder = $this->builder();

        // 關鍵字搜索
        if (!empty($keyword)) {
            $builder->like('pg_name', $keyword);
        }

        // 排序
        $builder->orderBy('pg_sort', 'ASC');
        
        // 計算總數
        $total = $builder->countAllResults(false);
        
        // 獲取分頁數據
        $items = $builder->get($perPage, ($page - 1) * $perPage)->getResultArray();
        
        return [
            'items' => $items,
            'total' => $total,
            'perPage' => $perPage,
            'currentPage' => $page,
        ];
    }

    /**
     * 獲取所有啟用的分類，返回 ID => 名稱 的關聯陣列
     * 
     * @return array 分類ID => 分類名稱
     */
    public function getEnabledCategories(): array
    {
        $categoriesData = $this->where('pg_enabled', 1)->orderBy('pg_sort', 'ASC')->findAll();
        $categories = [];
        
        foreach ($categoriesData as $category) {
            $categories[$category['pg_id']] = $category['pg_name'];
        }
        
        return $categories;
    }
} 