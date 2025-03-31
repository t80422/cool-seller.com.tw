<?php

namespace App\Controllers\Backend;

use CodeIgniter\Controller;
use App\Models\NobuyModel;

class Lockdata extends Controller{
    // 列表頁
    public function index($page = 1){        

        $Lockdata = new NobuyModel();

        if(!empty($this->request->getGet('keyword'))){
            $Lockdata->like('n_c_sn',$this->request->getGet('keyword'))
                ->orLike('n_p_sn',$this->request->getGet('keyword'));
        }

        $pager = service('pager');
        $page = (int)($this->request->getGet('page') ?? 1);
        $perPage = 10;
        $total = $Lockdata->countAllResults(false);
        $offset = ($page - 1) * $perPage;
        $pager_links = $pager->makeLinks($page,$perPage,$total,'backend_pages');

        $Lockdata = $Lockdata->findAll($perPage,$offset);

        $data = [
            'pager_links' => $pager_links,
            'Lockdata' => $Lockdata,
            'keyword' => !empty($this->request->getGet('keyword')) ? $this->request->getGet('keyword') : '',
        ];

        return view('lockdata/index',$data);
    }

    // 新增頁
    public function create(){
        return view('lockdata/create');
    }

    // 新增資料
    public function additem(){
        if(! $this->request->is('post')){
            return redirect()->back();
        }

        $model = new NobuyModel();

        $data = [
            'n_c_sn' => $this->request->getVar('n_c_sn'),
            'n_p_sn' => $this->request->getVar('n_p_sn'),
            'n_memo' => $this->request->getVar('n_memo'),
            'n_create_time' => date('Y-m-d H:i:s'),
            
        ];

        $model->insert($data);
        
        return redirect()->to('lockdata');
    }

    // 修改頁面
    public function edit($sn = null){

        if(!$sn){
            return redirect()->to('lockdata');
        }

        $model = new NobuyModel();

        $Lockdata = $model->find($sn);

        $data['Lockdata'] = $Lockdata;

        return view('lockdata/edit', $data);
    }

    // 修改資料
    public function edititem(){
        if(! $this->request->is('post')){
            return redirect()->back();
        }

        if(! $this->request->getVar('Nsn')){
            return redirect()->back();
        }

        $model = new NobuyModel();

        $data = [
            'n_c_sn' => $this->request->getVar('n_c_sn'),
            'n_p_sn' => $this->request->getVar('n_p_sn'),
            'n_memo' => $this->request->getVar('n_memo'),
            'n_create_time' => date('Y-m-d H:i:s'),
            // 'u_last_login' => '',
            // 'u_status' => 1,
        ];

        $model->update($this->request->getVar('Nsn') , $data);

        return redirect()->to('lockdata');

    }

    // 刪除資料
    public function delitem($sn = null){
        if(! $sn){
            return redirect()->back();
        }        

        $model = new NobuyModel();
        
        $model->delete($sn);

        return redirect()->back();

    }
}