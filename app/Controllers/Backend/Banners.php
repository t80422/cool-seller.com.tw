<?php

namespace App\Controllers\Backend;

use CodeIgniter\Controller;
use CodeIgniter\Files\File;
use App\Models\BannersModel;
use CodeIgniter\I18n\Time;

class Banners extends Controller{
    // 列表頁
    public function index($page = 1){
        $Banners =  new BannersModel();

        $pager = service('pager');
        $page = (int)($this->request->getGet('page') ?? 1);
        $perPage = 10;        
        $total = $Banners->countAllResults(false);
        $offset = ($page - 1 ) * $perPage;
        
        $pager_links = $pager->makeLinks($page,$perPage,$total,'backend_pages');
        
        $Banners = $Banners->orderBy('b_Sequence','asc')->findAll($perPage , $offset);
//print_r($model->getLastQuery()->getQuery());        
        $data = [
            'pager_links' => $pager_links,
            'Datas' => $Banners,            
        ];

        return view('backend/banners/index',$data);
    }
    
    // 新增頁面
    public function create(){      
        return view('backend/banners/create');
    }

    // 新增資料
    public function additem(){

        if(! $this->request->is('post')){
            return redirect()->back();
        }

        $model = new BannersModel();
	

        $img = $this->request->getFile('Ppic');
        // 檢查文件是否有效
        if ($img->isValid() && !$img->hasMoved()) {
            // 移動文件到目標目錄
            $newName = $img->getRandomName();			
            $img->move('public/images/banners', $newName);
            //echo '文件已成功上傳並移動到目標目錄';
        } else {
			return redirect()->back()->with('error','文件上傳失敗');   
        }
        $data = [
            'b_Name'=> $this->request->getVar('b_Name'),
            'b_Description'=> $this->request->getVar('b_Description'),
            'b_FileName'=> $newName,
            'b_CreateAt'=> date('Y-m-d H:i:s'),
            'b_UpdateAt'=> date('Y-m-d H:i:s'),
            'b_Sequence'=>$this->request->getVar('b_Sequence'),
            'b_IsShow'=>$this->request->getVar('b_IsShow')                 
        ];

        $model->insert($data);
        return redirect()->to('backend/banners');

    }

    // 修改頁面
    public function edit($sn = null){

        if(!$sn){
            return redirect()->to('banners');
        }

        $model = new BannersModel();
        $data['Data']= $model->find($sn);

        return view('backend/banners/edit', $data);
    }

    // 修改資料
    public function edititem(){
        
        if(! $this->request->is('post')){
            return redirect()->back();
        }

        if(! $this->request->getVar('datasn')){
            return redirect()->back();
        }        

        $model = new BannersModel();

        $olddata = $model->find($this->request->getVar('datasn'));

        $filepath = $olddata['b_FileName'];

       $img = $this->request->getFile('Ppic');

        // 檢查文件是否有效
        if ($img->isValid() && !$img->hasMoved()) {
            // 移動文件到目標目錄
            $newName = $img->getRandomName();			
            $img->move('public/images/banners', $newName);
            $filepath = $newName;
        } 
		
        $data = [
            'b_Name'=> $this->request->getVar('b_Name'),
            'b_Description'=> $this->request->getVar('b_Description'),
            'b_FileName'=> $filepath,            
            'b_UpdateAt'=> date('Y-m-d H:i:s'),
            'b_Sequence'=>$this->request->getVar('b_Sequence'),
            'b_IsShow'=>$this->request->getVar('b_IsShow')                 
        ];
		
       

        $model->update($this->request->getVar('datasn') , $data);

        return redirect()->to('backend/banners');

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