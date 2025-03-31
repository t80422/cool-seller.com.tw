<?php

namespace App\Models;

use CodeIgniter\Model;

class BannersModel extends Model
{
    protected $table = 'banners';
    protected $primaryKey = 'b_Id';
    protected $allowedFields = [
        'b_Id', 
        'd_dc_Id',
        'b_Name',
        'b_Description',
		'b_Link',
        'b_FileName',
        'b_CreateAt',
        'b_UpdateAt',
        'b_Sequence',
        'b_IsShow'        
    ];

    public function getList($page = 1, $keyword = null)
    {
        $this->where('b_IsShow', true);

        if (!empty($keyword)) {
            $this->like('b_FileName', $keyword);
        }

        return $this->orderBy('b_Sequence', 'ASC')
            ->paginate(10, 'default', $page);
    }
	
	 public function getAllBanners(){
        return $this->where('b_IsShow', true)
            ->orderBy('b_Sequence', 'asc')
            ->findAll();
    }
}
