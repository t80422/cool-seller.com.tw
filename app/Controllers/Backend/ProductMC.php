<?php

namespace App\Controllers\Backend;

use CodeIgniter\Controller;
use CodeIgniter\Files\File;
use App\Models\ProductMainCategoriesModel;
use CodeIgniter\I18n\Time;

class ProductMC extends Controller{
    // 列表頁
    public function index($page = 1){
        $ProductMC =  new ProductMainCategoriesModel();

        $pager = service('pager');
        $page = (int)($this->request->getGet('page') ?? 1);
        $perPage = 10;        
        $total = $ProductMC->countAllResults(false);
        $offset = ($page - 1 ) * $perPage;
        
        $pager_links = $pager->makeLinks($page,$perPage,$total,'backend_pages');
      
        $ProductMC = $ProductMC->orderBy('pmc_Sort','asc')->findAll($perPage , $offset);
//print_r($ProductMC);       
        $data = [
            'pager_links' => $pager_links,
            'Datas' => $ProductMC,            
        ];

        return view('backend/productmc/index',$data);
    }
    
    // 新增頁面
    public function create(){      
        return view('backend/productmc/create');
    }

    // 新增資料
    public function additem(){

        if(! $this->request->is('post')){
            return redirect()->back();
        }

        $model = new ProductMainCategoriesModel();
	

        $img = $this->request->getFile('Ppic');
        // 檢查文件是否有效
        if ($img->isValid() && !$img->hasMoved()) {
            // 移動文件到目標目錄
            $newName = $img->getRandomName();			
            $img->move('public/images/products/MainCategories', $newName);
            //echo '文件已成功上傳並移動到目標目錄';
        } else {
			return redirect()->back()->with('error','文件上傳失敗');   
        }
        $data = [
            'pmc_Name'=> $this->request->getVar('pmc_Name'),
            'pmc_Desc'=> $this->request->getVar('pmc_Desc'),
            'pmc_ImageFile'=> $newName,
			'pmc_ImageName'=> $img->getClientName(),
            'pmc_CreateAt'=> date('Y-m-d H:i:s'),
            'pmc_UpdateAt'=> date('Y-m-d H:i:s'),
            'pmc_Sort'=>$this->request->getVar('pmc_Sort'),
            'pmc_Enabled'=>$this->request->getVar('pmc_Enabled')                 
        ];

        $model->insert($data);
        return redirect()->to('backend/productmc');

    }

    // 修改頁面
    public function edit($sn = null){

        if(!$sn){
            return redirect()->to('productmc');
        }

        $model = new ProductMainCategoriesModel();
        $data['Data']= $model->find($sn);

        return view('backend/productmc/edit', $data);
    }

    // 修改資料
    public function edititem(){
        
        if(! $this->request->is('post')){
            return redirect()->back();
        }

        if(! $this->request->getVar('datasn')){
            return redirect()->back();
        }        

        $model = new ProductMainCategoriesModel();

        $olddata = $model->find($this->request->getVar('datasn'));

        $filepath = $olddata['pmc_ImageName'];

       $img = $this->request->getFile('Ppic');

        // 檢查文件是否有效
        if ($img->isValid() && !$img->hasMoved()) {
            // 移動文件到目標目錄
            $newName = $img->getRandomName();			
            $img->move('public/images/products/MainCategories', $newName);
            $filepath = $newName;
        } 
		
        $data = [
           'pmc_Name'=> $this->request->getVar('pmc_Name'),
            'pmc_Desc'=> $this->request->getVar('pmc_Desc'),
            'pmc_ImageFile'=> $newName,
			'pmc_ImageName'=> $img->getClientName(),
            'pmc_UpdateAt'=> date('Y-m-d H:i:s'),
            'pmc_Sort'=>$this->request->getVar('pmc_Sort'),
            'pmc_Enabled'=>$this->request->getVar('pmc_Enabled')                   
        ];
		
       

        $model->update($this->request->getVar('datasn') , $data);

        return redirect()->to('backend/productmc');

    }

    // 刪除資料
    public function delitem($sn = null){
        if(! $sn){
            return redirect()->back();
        }        

        $model = new BannersModel();
        
        $model->delete($sn);

        return redirect()->back();

    }
	
}