<?php

namespace App\Controllers\Backend;

use CodeIgniter\Controller;
use CodeIgniter\Files\File;
use App\Models\ProductMainCategoriesModel;
use App\Models\ProductSubCategoriesModel;
use CodeIgniter\I18n\Time;

class ProductSC extends Controller{
    // 列表頁
    public function index($page = 1){
        $ProductSC =  new ProductSubCategoriesModel();

        $page = (int)($this->request->getGet('page') ?? 1);
        $perPage = 10;        
        $offset = ($page - 1 ) * $perPage;
        
		$data['Datas']=$ProductSC->getSCData($perPage,$offset);
		$data['total']=$ProductSC->getCount();
		
		$pager = \Config\Services::pager();
        $data['pager_links'] = $pager->makeLinks($page,$perPage,$data['total'],'backend_pages');
		return view('backend/productsc/index',$data);
    }
    
    // 新增頁面
    public function create(){  
		$ProductMC =  new ProductMainCategoriesModel();
		$data['Datas'] = $ProductMC->where('pmc_Enabled','1')->orderBy('pmc_Sort','asc')->findAll();         
        return view('backend/productsc/create',$data);
    }

    // 新增資料
    public function additem(){

        if(! $this->request->is('post')){
            return redirect()->back();
        }

        $model = new ProductSubCategoriesModel();
	

        $img = $this->request->getFile('Ppic');
        // 檢查文件是否有效
        if ($img->isValid() && !$img->hasMoved()) {
            // 移動文件到目標目錄
            $newName = $img->getRandomName();			
            $img->move('public/images/products/categories', $newName);
            //echo '文件已成功上傳並移動到目標目錄';
        } else {
			return redirect()->back()->with('error','文件上傳失敗');   
        }
        $data = [
			'psc_pmc_Id'=> $this->request->getVar('psc_pmc_Id'),
            'psc_Name'=> $this->request->getVar('data_Name'),
			'psc_ImageName'=> $img->getClientName(),
            'psc_Image'=> $newName,
            'psc_CreateAt'=> date('Y-m-d H:i:s'),
            'psc_UpdateAt'=> date('Y-m-d H:i:s'),
            'psc_Sort'=>$this->request->getVar('data_Sort'),
            'psc_Enabled'=>$this->request->getVar('data_Enabled')                 
        ];

        $model->insert($data);
        return redirect()->to('backend/productsc');

    }

    // 修改頁面
    public function edit($sn = null){

        if(!$sn){
            return redirect()->to('productsc');
        }
		$ProductSC =  new ProductSubCategoriesModel();
		$data['Data']=$ProductSC->getOneSCData($sn)[0];
		//echo $data['Data'];
		
		$ProductMC =  new ProductMainCategoriesModel();
		$data['MCData'] = $ProductMC->where('pmc_Enabled','1')->orderBy('pmc_Sort','asc')->findAll();                 
        return view('backend/productsc/edit', $data);
    }

    // 修改資料
    public function edititem(){
        
        if(! $this->request->is('post')){
            return redirect()->back();
        }

        if(! $this->request->getVar('datasn')){
            return redirect()->back();
        }        

        $model = new ProductSubCategoriesModel();

        $olddata = $model->find($this->request->getVar('datasn'));

        $filepath = $olddata['psc_ImageName'];

       $img = $this->request->getFile('Ppic');

        // 檢查文件是否有效
        if ($img->isValid() && !$img->hasMoved()) {
            // 移動文件到目標目錄
            $newName = $img->getRandomName();			
            $img->move('public/images/products/categories', $newName);
            $filepath = $newName;
        } 
		
        $data = [
            'psc_pmc_Id'=> $this->request->getVar('psc_pmc_Id'),
            'psc_Name'=> $this->request->getVar('psc_Name'),
			'psc_ImageName'=> $img->getClientName(),
            'psc_Image'=> $newName,
            'psc_UpdateAt'=> date('Y-m-d H:i:s'),
            'psc_Sort'=>$this->request->getVar('psc_Sort'),
            'psc_Enabled'=>$this->request->getVar('psc_Enabled')                   
        ];
		
       

        $model->update($this->request->getVar('datasn') , $data);

        return redirect()->to('backend/productsc');

    }

    // 刪除資料
    public function delitem($sn = null){
        if(! $sn){
            return redirect()->back();
        }        

        $model = new ProductSubCategoriesModel();
        
        $model->delete($sn);

        return redirect()->back();

    }
	
}