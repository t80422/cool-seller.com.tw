<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * 產品
 */
class ProductModel extends Model
{
    protected $table            = 'products';
    protected $primaryKey       = 'p_Id';
    protected $allowedFields    = [
        'p_Name', // 名稱
        'p_Description', // 描述
        'p_Image', // 圖
        'p_UpdatedAt', // 更新時間
        'p_Sequence', // 排序
        'p_psc_Id', // 產品子類別編號
        'p_Tag', // 產品TAG
        'p_Star' // 明星商品
    ];

    public function getByPSCId($pscId)
    {
        return $this->where('p_psc_Id', $pscId)->findAll();
    }

    public function getProductWithPMCAndPSC($productId)
    {
        return $this->baseBuilder()
            ->where('p.p_Id', $productId)
            ->get()
            ->getFirstRow('array');
    }

    public function search(?string $keyword = null, array $tags = [], int $page = 1, int $pscId): array
    {
        $builder = $this->builder()->where('p_psc_Id', $pscId);

        // 關鍵字搜尋
        if (!empty($keyword)) {
            $builder->like('p_Name', $keyword);
        }

        // 標籤篩選
        if (!empty($tags)) {
            $builder->groupStart();

            foreach ($tags as $index => $tag) {
                if ($index === 0) {
                    $builder->like('p_Tag', $tag);
                } else {
                    $builder->orLike('p_Tag', $tag);
                }
            }

            $builder->groupEnd();
        }

        // 添加排序
        $builder->orderBy('p_Sequence', 'ASC');

        // 分頁
        $perPage = 10;
        $totalPages = ceil($builder->countAllResults(false) / $perPage);
        $offset = ($page - 1) * $perPage;
        $builder->limit($perPage, $offset);

        $result = $builder->get()->getResultArray();

        return [
            'page' => $page,
            'products' => $result,
            'totalPages' => $totalPages
        ];
    }

    public function getStarProducts()
    {
        return $this->where('p_Star', 1)->findAll();
    }

    public function globalSearch(string $keyword, int $page = 1)
    {
        $builder = $this->builder();

        // 關鍵字搜尋
        if (!empty($keyword)) {
            $builder->like('p_Name', $keyword);
        }

        // 分頁
        $perPage = 10;
        $totalPages = ceil($builder->countAllResults(false) / $perPage);
        $offset = ($page - 1) * $perPage;
        $builder->limit($perPage, $offset);

        $result = $builder->get()->getResultArray();

        return [
            'page' => $page,
            'products' => $result,
            'totalPages' => $totalPages,
            'perPage' => $perPage
        ];
    }

    public function getAll(int $page = 1)
    {
        $builder = $this->baseBuilder();

        // 分頁
        $perPage = 10;
        $totalPages = ceil($builder->countAllResults(false) / $perPage);
        $offset = ($page - 1) * $perPage;
        $builder->limit($perPage, $offset);
        $datas = $builder->get()->getResult();

        return [
            'page' => $page,
            'datas' => $datas,
            'totalPages' => $totalPages,
            'perPage' => $perPage
        ];
    }

    private function baseBuilder()
    {
        return $this->builder('products p')
            ->join('product_sub_categories psc', 'p.p_psc_Id = psc.psc_Id', 'left')
            ->join('product_main_categories pmc', 'psc.psc_pmc_Id = pmc.pmc_Id', 'left');
    }
}
