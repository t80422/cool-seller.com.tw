<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\DownloadsModel;

class DownloadCategoriesModel extends Model
{
    protected $table            = 'download_categories';
    protected $primaryKey       = 'dc_Id';
    protected $allowedFields    = [
        'dc_Name' // 名稱
    ];

    public function getAllWithDownloads()
    {
        $categories = $this->findAll();
        $downloadModel = new DownloadsModel();

        foreach ($categories as &$category) {
            $category['downloads'] = $downloadModel->where('d_dc_Id', $category['dc_Id'])
                ->where('d_IsShow', true)
                ->orderBy('d_Sequence', 'asc')
                ->findAll();
        }

        return $categories;
    }
}
