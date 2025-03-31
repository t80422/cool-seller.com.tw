<?php
namespace App\Controllers\Backend;

use CodeIgniter\Controller;
use App\Models\CustomerModel;
use App\Models\NobuyModel;
use App\Models\ProductModel;

class Customer extends Controller{
    // 列表頁
    public function index($page = 1){
        $Customers = new CustomerModel();

        if(!empty($this->request->getGet('keyword'))){
            // echo $this->request->getGet('keyword');exit;
            $Customers->like('c_id',$this->request->getGet('keyword'))
            ->orLike('c_name',$this->request->getGet('keyword'));
        }

        $pager = service('pager');
        $page = (int)($this->request->getGet('page') ?? 1);
        $perPage = 10;        
        $total = $Customers->countAllResults(false);
        $offset = ($page - 1 ) * $perPage;
        $pager_links = $pager->makeLinks($page,$perPage,$total,'backend_pages');

        $Customers = $Customers->orderBy('c_create_time','desc')->findAll($perPage , $offset);
        
        $data = [
            'pager_links' => $pager_links,
            'Customers' => $Customers,
            'keyword' => !empty($this->request->getGet('keyword')) ? $this->request->getGet('keyword') : '',
        ];

        return view('customer/index',$data);
    }

    // 不予售予頁面
    public function nobuy($sn = null){
        if(!$sn){
            return redirect()->to('customer');
        }

        $Customer = (new CustomerModel())->find($sn);

        $Nobuys = (new NobuyModel())->where('n_c_sn',$Customer['c_id'])->orderby('n_create_time','desc')->findAll();

        $Items = [];
        $i = 0;
        foreach($Nobuys as $nobuy){
            $product = (new ProductModel())->where('p_product_code',$nobuy['n_p_sn'])->first();
            if($product){
                $Items[$i] = [
                    "icon" => $product['p_pic'] ?? "/image/imgfile.png",
                    "name" => $product['p_name'] ?? "",
                    "unit" => $product['p_unit'] ?? "",
                    "storecode" => $product['p_store_code'] ?? "",
                    "productcode" => $product['p_product_code'] ?? "",
                    "barcode" => $product['p_barcode'] ?? "",
                    "storage" => $product['p_storage'] ?? "",
                    "price1" => $product['p_price'] ?? "",
                    "price2" => $product['p_price2'] ?? "",
                    "createtime" => $nobuy['n_create_time'] ?? "",
                    "memo" => $nobuy['n_memo'] ?? ""
                ];
                $i++;
            }
        }

        //echo '<pre>',print_r($Items),'</pre>';exit;

        $data['CustomerName'] = $Customer['c_name'];
        $data['Items'] = $Items;

        return view('customer/nobuy',$data);
    }

    // 不予售予匯入
    public function nobuyexport(){
        $response = array("success"=> 0 , "text" => "錯誤");

        $file = $this->request->getFile('file');

        set_time_limit(600);

        $UpdateData = array();
        $InsertData = array();
        
        if(empty($file->getName())){
            $response['success'] = 0;
            $response['text'] = "請選擇檔案";
            print_r(json_encode($response));
            exit;
        }else{
            if(mb_detect_encoding(file_get_contents($file)) != "UTF-8"){
                $response['success'] = 0;
                $response['text'] = "請使用utf-8編碼";
                print_r(json_encode($response));
                exit;
            }else{
                $fp = fopen($file,'r');
                while($line = fgets($fp)){

                    if(!empty($line) && count(explode(',',$line)) >= 5){
        
                        $value = explode(',',$line);

                        $Nobuy = (new NobuyModel())->where('n_c_sn',trim($value[0]))->where('n_p_sn',trim($value[1]))->first();                                

                        if($Nobuy){
                            array_push($UpdateData,[
                                'n_sn' => $Nobuy['n_sn'],
                                'n_c_sn' => trim($value[0]),
                                'n_p_sn' => trim($value[1]),
                                'n_create_time' => trim($value[2]),
                                'n_memo' => trim($value[3]),
                            ]);
                        }else{
                            array_push($InsertData,[
                                //'n_sn' => $Nobuy['n_sn'],
                                'n_c_sn' => trim($value[0]),
                                'n_p_sn' => trim($value[1]),
                                'n_create_time' => trim($value[2]),
                                'n_memo' => trim($value[3]),
                            ]);
                        }                        

                        if(count($UpdateData) >= 10000){
                            (new NobuyModel())->updateBatch($UpdateData,'n_sn');
                            $UpdateData = array();
                        }

                        if(count($InsertData) >= 10000){
                            (new NobuyModel())->insertBatch($InsertData);
                            $InsertData = array();
                        }    
                    }

                }

                if(count($UpdateData) > 0){
                    (new NobuyModel())->updateBatch($UpdateData,'n_sn');
                    $UpdateData = array();
                }

                if(count($InsertData) > 0){
                    (new NobuyModel())->insertBatch($InsertData);
                    $InsertData = array();
                }

                fclose($fp);

                $response['success'] = 1;
                $response['text'] = "成功";
                print_r(json_encode($response));
                // return json_encode($response);
                exit;
            }
        }

    }

    // 新增頁
    public function create(){
        return view('customer/create');
    }

    // 新增資料
    public function additem(){

        if(! $this->request->is('post')){
            return redirect()->back();
        }

        $model = new CustomerModel();

        $customer = (new CustomerModel)->where('c_id',$this->request->getVar('cid'))->countAllResults();
        if($customer > 0){
            return redirect()->back()->with('error','編號重複，請重新輸入')->withInput();
        }

        $data = [
            //'c_sn' => ,
            'c_id' => $this->request->getVar('cid'),
            'c_pw' => '',
            'c_no' => '',
            'c_short_name' => '',
            'c_name' => $this->request->getVar('name'),
            'c_address' => $this->request->getVar('address'),
            'c_phone' => $this->request->getVar('phone'),
            'c_plevel' => 0,
            'c_create_time' => date('Y-m-d H:i:s'),
            'c_modify_time' => date('Y-m-d H:i:s'),
            'c_status' => 1,
        ];

        $model->insert($data);

        return redirect()->to('customer');

    }

    // 編輯頁
    public function edit($sn = null){
        if(!$sn){
            return redirect()->to('customer');
        }

        $model = new CustomerModel();
        $Customer = $model->find($sn);
        $data['Customer'] = $Customer;
        return view('customer/edit',$data);
    }

    // 編輯資料
    public function edititem(){
        if(! $this->request->is('post')){
            return redirect()->back();
        }

        if(! $this->request->getVar('Csn')){
            return redirect()->back();
        }

        $customer = (new CustomerModel)->where('c_id',$this->request->getVar('cid'))->first();
        if($customer != null && $customer['c_sn'] != $this->request->getVar('Csn')){
            return redirect()->back()->with('error','編號重複，請重新輸入')->withInput();
        }

        $model = new CustomerModel();

        $data = [
            'c_id' => $this->request->getVar('cid'),
            'c_pw' => '',
            'c_no' => '',
            'c_short_name' => '',
            'c_name' => $this->request->getVar('name'),
            'c_address' => $this->request->getVar('address'),
            'c_phone' => $this->request->getVar('phone'),
            'c_plevel' => 0,
            // 'c_create_time' => date('Y-m-d H:i:s'),
            'c_modify_time' => date('Y-m-d H:i:s'),
            'c_status' => 1,
        ];

        $model->update($this->request->getVar('Csn'),$data);

        return redirect()->to('customer');

    }

    // 刪除資料
    public function delitem($sn = null){
        if(! $sn){
            return redirect()->back();
        }        

        $model = new CustomerModel();
        
        $model->delete($sn);

        return redirect()->back();

    }
  
    // 匯入資料
    public function export(){
        $response = array("success"=> 0 , "text" => "");

        $file = $this->request->getFile('file');

        set_time_limit(600);

        $UpdateData = array();
        $InsertData = array();
        
        if(empty($file->getName())){
            $response['success'] = 0;
            $response['text'] = "請選擇檔案";
            print_r(json_encode($response));
            exit;
        }else{
            if(mb_detect_encoding(file_get_contents($file)) != "UTF-8"){
                $response['success'] = 0;
                $response['text'] = "請使用utf-8編碼";
                print_r(json_encode($response));
                exit;
            }else{
                $fp = fopen($file,'r');
                while($line = fgets($fp)){

                    if(!empty($line) && count(explode('!',$line)) >= 4){

                        $value = explode('!',$line);

                        $Customer = (new CustomerModel())->where('c_id',trim($value[0]))->first();
                        $csn = $Customer != null ? $Customer['c_sn'] : 0;
                        if($csn > 0){
                            array_push($UpdateData , [
                                'c_sn' => $csn,
                                'c_name' => trim($value[1]),
                                'c_phone' => trim($value[2]),
                                //'c_plevel' => intval(trim($value[3])),
                                'c_plevel' => 0,
                                'c_modify_time' => date('Y-m-d H:i:s'),
                            ]);
                        }else{
                            array_push($InsertData, [
                                'c_id' => trim($value[0]),
                                'c_name' => trim($value[1]),
                                'c_phone' => trim($value[2]),
                                // 'c_plevel' => intval(trim($value[3])),
                                'c_plevel' => 0,
                                'c_status' => 1,
                                'c_modify_time' => date('Y-m-d H:i:s'),
                                'c_create_time' => date('Y-m-d H:i:s'),
                            ]);
                        }

                        if(count($UpdateData) >= 10000){
                            (new CustomerModel())->updateBatch($UpdateData,'c_sn');
                            $UpdateData = array();
                        }

                        if(count($InsertData) >= 10000){
                            (new CustomerModel())->insertBatch($InsertData);
                            $InsertData = array();
                        }    
                    }

                }

                if(count($UpdateData) > 0){
                    (new CustomerModel())->updateBatch($UpdateData,'c_sn');
                    $UpdateData = array();
                }

                if(count($InsertData) > 0){
                    (new CustomerModel())->insertBatch($InsertData);
                    $InsertData = array();
                }

                fclose($fp);

                $response['success'] = 1;
                $response['text'] = "成功";
                print_r(json_encode($response));
                // return json_encode($response);
                exit;
            }
        }

        exit;
    }

    
}