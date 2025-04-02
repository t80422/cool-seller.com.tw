<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductsModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'p_id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'p_name',
        'p_description',
        'p_pg_id',
        'p_link',
        'p_sort',
        'p_created_at',
        'p_updated_at'
    ];

    // 驗證規則
    protected $validationRules = [
        'p_name' => 'required|min_length[1]|max_length[100]',
        'p_pg_id' => 'required|integer',
        'p_sort' => 'required|integer',
    ];

    protected $validationMessages = [
        'p_name' => [
            'required' => '作品名稱為必填項',
            'min_length' => '作品名稱至少需要1個字元',
            'max_length' => '作品名稱最多100個字元'
        ],
        'p_pg_id' => [
            'required' => '作品分類為必填項',
            'integer' => '作品分類必須是有效的分類ID'
        ],
        'p_sort' => [
            'required' => '排序為必填項',
            'integer' => '排序必須是整數'
        ]
    ];

    // 日期欄位
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'p_created_at';
    protected $updatedField = 'p_updated_at';

    /**
     * 獲取作品列表
     *
     * @param string|null $keyword 搜索關鍵字
     * @param int|null $categoryId 分類ID
     * @param int $page 頁碼
     * @param int $perPage 每頁項目數
     * @return array 包含分頁的作品列表
     */
    public function getList(?string $keyword = null, ?int $categoryId = null, int $page = 1, int $perPage = 10): array
    {
        $builder = $this->builder();
        $builder->select('products.*, product_group.pg_name as category_name')
            ->join('product_group', 'products.p_pg_id = product_group.pg_id', 'left');

        // 關鍵字搜索
        if (!empty($keyword)) {
            $builder->groupStart()
                ->like('p_name', $keyword)
                ->orLike('p_description', $keyword)
                ->groupEnd();
                
            // 增加搜尋標籤功能 (先獲取包含關鍵字的標籤)
            $tagIds = $this->db->table('tags')
                ->select('t_id')
                ->like('t_name', $keyword)
                ->get()
                ->getResultArray();
                
            // 如果找到標籤，查詢包含這些標籤的產品ID
            if (!empty($tagIds)) {
                $tagIdList = array_column($tagIds, 't_id');
                
                // 獲取包含這些標籤的產品ID
                $productIds = $this->db->table('product_tags')
                    ->select('pt_p_id')
                    ->whereIn('pt_t_id', $tagIdList)
                    ->get()
                    ->getResultArray();
                    
                if (!empty($productIds)) {
                    $productIdList = array_column($productIds, 'pt_p_id');
                    $builder->orWhereIn('p_id', $productIdList);
                }
            }
        }

        // 分類篩選
        if (!empty($categoryId)) {
            $builder->where('p_pg_id', $categoryId);
        }

        // 排序
        $builder->orderBy('p_sort', 'ASC')
            ->orderBy('p_created_at', 'DESC');

        // 計算總數
        $total = $builder->countAllResults(false);

        // 獲取分頁數據
        $items = $builder->get($perPage, ($page - 1) * $perPage)->getResultArray();
        
        // 為每個產品獲取標籤
        foreach ($items as &$item) {
            $item['tags'] = $this->getProductTagsWithDetails($item['p_id']);
        }

        return [
            'items' => $items,
            'total' => $total,
            'perPage' => $perPage,
            'currentPage' => $page,
        ];
    }

    /**
     * 獲取產品標籤詳細資訊
     *
     * @param int $productId 產品ID
     * @return array 標籤詳細資訊陣列
     */
    public function getProductTagsWithDetails(int $productId): array
    {
        return $this->db->table('product_tags')
            ->select('tags.t_id, tags.t_name')
            ->join('tags', 'tags.t_id = product_tags.pt_t_id')
            ->where('product_tags.pt_p_id', $productId)
            ->get()
            ->getResultArray();
    }

    /**
     * 獲取產品標籤
     *
     * @param int $productId 作品ID
     * @return array 標籤ID陣列
     */
    public function getProductTags(int $productId): array
    {
        $results = $this->db->table('product_tags')
            ->select('pt_t_id')
            ->where('pt_p_id', $productId)
            ->get()
            ->getResultArray();

        $tagIds = [];
        foreach ($results as $row) {
            $tagIds[] = $row['pt_t_id'];
        }

        return $tagIds;
    }

    /**
     * 保存產品標籤關係
     *
     * @param int $productId 作品ID
     * @param array $tagIds 標籤ID陣列
     * @return bool 操作結果
     */
    public function saveProductTags(int $productId, array $tagIds): bool
    {
        try {
            // 先删除所有現有關聯
            $this->db->table('product_tags')->where('pt_p_id', $productId)->delete();

            // 如果沒有新標籤，直接返回成功
            if (empty($tagIds)) {
                return true;
            }

            // 過濾無效的標籤ID
            foreach ($tagIds as $key => $tagId) {
                if (!is_numeric($tagId) || $tagId <= 0) {
                    unset($tagIds[$key]);
                }
            }

            // 再次檢查是否還有有效標籤
            if (empty($tagIds)) {
                return true;
            }

            // 批量插入新關聯
            $data = [];
            foreach ($tagIds as $tagId) {
                $data[] = [
                    'pt_p_id' => $productId,
                    'pt_t_id' => $tagId
                ];
            }

            return $this->db->table('product_tags')->insertBatch($data) ? true : false;
        } catch (\Exception $e) {
            log_message('error', '保存產品標籤關係異常: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * 新增作品並設置標籤
     *
     * @param array $data 作品數據
     * @param array $tagIds 標籤ID陣列
     * @return array 包含狀態和錯誤信息
     */
    public function addProduct(array $data, array $tagIds = []): array
    {
        // 開始交易
        $this->db->transBegin();

        // 執行驗證
        if (!$this->validate($data)) {
            return [
                'status' => false,
                'errors' => $this->errors()
            ];
        }

        try {
            // 新增作品
            if (!$this->insert($data)) {
                $this->db->transRollback();
                log_message('error', '資料庫插入錯誤: ' . print_r($this->errors(), true));
                return [
                    'status' => false,
                    'errors' => ['database' => '資料庫錯誤']
                ];
            }

            $productId = $this->getInsertID();

            // 設置標籤
            if (!$this->saveProductTags($productId, $tagIds)) {
                $this->db->transRollback();
                return [
                    'status' => false,
                    'errors' => ['tags' => '設置標籤失敗']
                ];
            }

            // 提交交易
            $this->db->transCommit();

            return [
                'status' => true,
                'id' => $productId
            ];
        } catch (\Exception $e) {
            $this->db->transRollback();
            log_message('error', '新增作品異常: ' . $e->getMessage());
            return [
                'status' => false,
                'errors' => ['system' => '系統錯誤，請聯繫管理員']
            ];
        }
    }

    /**
     * 刪除作品及其標籤關聯
     *
     * @param int $id 作品ID
     * @return bool 刪除結果
     */
    public function deleteProduct(int $id): bool
    {
        $this->db->transBegin();

        try {
            // 刪除標籤關聯
            $db = \Config\Database::connect();
            $db->table('product_tags')->where('pt_p_id', $id)->delete();

            // 刪除作品
            $this->delete($id);

            $this->db->transCommit();
            return true;
        } catch (\Exception $e) {
            $this->db->transRollback();
            log_message('error', '刪除作品異常: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * 更新作品並設置標籤
     *
     * @param int $productId 作品ID
     * @param array $data 作品數據
     * @param array $tagIds 標籤ID陣列
     * @return array 包含狀態和錯誤信息
     */
    public function updateProduct(int $productId, array $data, array $tagIds = []): array
    {
        // 開始交易
        $this->db->transBegin();

        // 執行驗證
        if (!$this->validate($data)) {
            return [
                'status' => false,
                'errors' => $this->errors()
            ];
        }

        try {
            // 更新作品
            if (!$this->update($productId, $data)) {
                $this->db->transRollback();
                log_message('error', '資料庫更新錯誤: ' . print_r($this->errors(), true));
                return [
                    'status' => false,
                    'errors' => ['database' => '資料庫錯誤']
                ];
            }

            // 設置標籤
            if (!$this->saveProductTags($productId, $tagIds)) {
                $this->db->transRollback();
                return [
                    'status' => false,
                    'errors' => ['tags' => '設置標籤失敗']
                ];
            }

            // 提交交易
            $this->db->transCommit();

            return [
                'status' => true,
                'id' => $productId
            ];
        } catch (\Exception $e) {
            $this->db->transRollback();
            log_message('error', '更新作品異常: ' . $e->getMessage());
            return [
                'status' => false,
                'errors' => ['system' => '系統錯誤，請聯繫管理員']
            ];
        }
    }
}
