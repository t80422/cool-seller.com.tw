<?php

namespace App\Controllers\Backend;

use CodeIgniter\Controller;
use App\Models\OrderModel;
use App\Models\OrderDetailModel;
use App\Models\CustomerModel;
use App\Models\ProductModel;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Settings;
Settings::setZipClass(Settings::PCLZIP);


class Order2 extends Controller{
    // 列表頁
    public function index($page = 1){
        $Orders = new OrderModel();        

        $keywords = [];

        if(!empty($this->request->getGet('s_status')) && $this->request->getGet('s_status') != "all"){
            if($this->request->getGet('s_status') == "n"){
                $Orders->groupStart()->where('o_status',0)->orWhere('o_status',null)->groupEnd();
            }
            if($this->request->getGet('s_status') == "y"){
                $Orders->where('o_status',1);
            }
        }
        $keyowords['s_status'] = !empty($this->request->getGet('s_status')) ? $this->request->getGet('s_status') : "";

        if(!empty($this->request->getGet('s_date'))){
            // echo date('Y-m-d H:i:s',strtotime($this->request->getGet('s_date')));exit;
            $Orders->where('o_create_time >=',date('Y-m-d H:i:s',strtotime($this->request->getGet('s_date'))));
        }
        $keyowords['s_date'] = !empty($this->request->getGet('s_date')) ? $this->request->getGet('s_date') : "";
        
        if(!empty($this->request->getGet('e_date'))){
            $Orders->where('o_create_time <=',$this->request->getGet('e_date'));
        }
        $keyowords['e_date'] = !empty($this->request->getGet('e_date')) ? $this->request->getGet('e_date') : "";
        
        if(!empty($this->request->getGet('keyword'))){
            $customer = (new CustomerModel())->like('c_id',$this->request->getGet('keyword'))->orLike('c_name',$this->request->getGet('keyword'))->findColumn('c_sn');
            $Orders->groupStart()->where('o_sn',$this->request->getGet('keyword'))->orWhereIn('o_c_sn',$customer)->groupEnd();            
        }
        $keyowords['keyword'] = !empty($this->request->getGet('keyword')) ? $this->request->getGet('keyword') : "";

        $pager = service('pager');
        $page = (int)($this->request->getGet('page') ?? 1);
        $perPage = 10;
        $total = $Orders->countAllResults(false);
        $offset = ($page - 1) * $perPage;
        $pager_links = $pager->makeLinks($page,$perPage,$total,'backend_pages');

        $Orders = $Orders->orderby('o_create_time','desc')->findAll($perPage,$offset);

        foreach($Orders as $key => $order){
            $customer = (new CustomerModel())->find($order['o_c_sn']);
            $Orders[$key]['o_c_sn'] = $customer != null ? $customer['c_id'] : '';
            $Orders[$key]['o_c_name'] = $customer != null ? $customer['c_name'] : '';
        }

        $data = [
            'pager_links' => $pager_links,
            'Orders' => $Orders,
            'keywords' => $keyowords,
        ];

        return view('order/index',$data);
    }

    // 明細頁
    public function edit($sn = null){        
        if(!$sn){
            return redirect()->to('order');
        }

        $model = new OrderModel();

        $Order = $model->find($sn);

        $Customer = (new CustomerModel())->find($Order['o_c_sn']);

        $Order['o_c_name'] = $Customer != null ? $Customer['c_name'] : "";
        
        $Order['o_details'] = (new OrderDetailModel())->where('od_o_sn',$sn)->orderBy('od_sn')->findAll();
        
        $Order['o_sum_money'] = round(floatval($Order['o_toal_money'] ?? 0) / 1.05 , 2);

        $Order['o_tax'] = $Order['o_toal_money'] - $Order['o_sum_money'];

        foreach($Order['o_details'] as $key => $detail){
            $Product = (new ProductModel())->find($detail['od_p_sn']);
            $Order['o_details'][$key]['od_p_name'] = $Product != null ? $Product['p_name'] : "";
            $Order['o_details'][$key]['od_p_unit'] = $Product != null ? $Product['p_unit'] : "";
            $Order['o_details'][$key]['od_p_storecode'] = $Product != null ? $Product['p_store_code'] : "";
            $Order['o_details'][$key]['od_p_productcode'] = $Product != null ? $Product['p_product_code'] : "";
            $Order['o_details'][$key]['od_p_barcode'] = $Product != null ? $Product['p_barcode'] : "";
            $Order['o_details'][$key]['od_p_total'] = round(floatval($Order['o_details'][$key]['od_amount']) * floatval($Order['o_details'][$key]['od_price']),2);
        }

        // echo '<pre>',print_r($Order),'</pre>';exit;

        $data = ['Order' =>$Order];

        return view('order/edit',$data);
    }

    // 詳細頁
    public function detail(){
        return view('order/detail');
    }

    // 編輯資料
    public function edititem(){

        if(! $this->request->is('post')){
            return redirect()->back();
        }
        
        $sn = $this->request->getVar('o_sn');

        $total1 = 0;
        $total2 = 0;

        $PSNs = $this->request->getVar('p_sn');
        $Prices = $this->request->getVar('p_price');
        $Amounts = $this->request->getVar('p_amount');
        $Memos = $this->request->getVar('p_memo');


        if( !empty($PSNs) && count($PSNs) > 0){

            // 先將不再新的陣列裡刪除
            (new OrderDetailModel())->where('od_o_sn',$sn)->whereNotIn('od_p_sn',$PSNs)->delete();

            $UpdateData = array();
            $InsertData = array();
            for($i = 0 ; $i < count($PSNs) ; $i++)    {
                $detail = (new OrderDetailModel())->where('od_o_sn',$sn)->where('od_p_sn',$PSNs[$i])->first();
                // echo '<pre>',print_r($PSNs),'</pre>';
                if($detail){
                    array_push($UpdateData,[
                        'od_sn' => $detail['od_sn'],
                        'od_amount' => $Amounts[$i],
                        'od_price' => $Prices[$i],
                        'od_memo' => $Memos[$i],
                        'od_modify_time' => date('Y-m-d H:i:s')
                    ]);
                }else{
                    array_push($InsertData,[
                        'od_o_sn' => $sn,
                        'od_p_sn' => $PSNs[$i],
                        'od_amount' => $Amounts[$i],
                        'od_price' => $Prices[$i],
                        'od_memo' => $Memos[$i],
                        'od_create_time' => date('Y-m-d H:i:s'),
                        'od_modify_time' => date('Y-m-d H:i:s')
                    ]);
                }
                $total1 += floatval($Amounts[$i]) * floatval($Prices[$i]);
            }
            // echo '<pre>',print_r($UpdateData),'</pre>';
            // echo '<pre>',print_r($InsertData),'</pre>';exit;
            if(count($UpdateData) > 0){ (new OrderDetailModel())->updateBatch($UpdateData,'od_sn'); }
            if(count($InsertData) > 0){ (new OrderDetailModel())->insertBatch($InsertData); }
        }else{
            (new OrderDetailModel())->where('od_o_sn',$sn)->delete();
        }
        
        $total1 = round($total1,2);
        $total2 = $total1 > 0 ? round($total1 * 1.05,2) : 0;


        $model = new OrderModel();

        $data = [
            'o_toal_money' => $total2,
            'o_modify_time' => date('Y-m-d H:i:s'),
            'o_status' => $this->request->getVar('o_status') ?? 0,
            'o_memo' => $this->request->getVar('o_memo') ?? "",
        ];
        $model->update($sn,$data);

        return redirect()->to('order');
    }

    // 刪除
    public function delitem($sn = null){
        if($sn){
            (new OrderDetailModel())->where('od_o_sn',$sn)->delete();
            $model = new OrderModel();
            $order = $model->find($sn);
            $model->delete($order);
        }

        return redirect()->to('order');
    }

    // 合併
    public function merge(){
        if(! $this->request->is('post')){
            return redirect()->back();
        }

        $result = array( 'success' => false , 'msg' => "" );

        $orders = (new OrderModel())->whereIn('o_sn',$this->request->getVar('orders'))->orderBy('o_sn')->findAll();

        if(count($orders) < 2){
            $result['msg'] = "請至少選擇2筆訂單";
        }else{
            // 查看是否有不同客戶
            $CstmCount = count(array_unique(array_column($orders,'o_c_sn')));
            if($CstmCount != 1 ){
                $result['msg'] = "請選擇相同客戶";
            }else{
                $STime = strtotime($orders[0]['o_create_time']);
                $ETime = strtotime($orders[count($orders)-1]['o_create_time']);
                // 差看是否相差5天內的訂單
                if((($ETime - $STime) / 3600 / 24) > 5){
                    $result['msg'] = "請選相差五天內的訂單";
                }else{
                    $sn = $orders[count($orders) -1]['o_sn'];
                    $DeleteData = array();
                    $model = new OrderModel();
                    $detailmodel = new OrderDetailModel();
                    $order = $model->find($sn);      
                    // 訂單回圈              
                    foreach($orders as $o){                        
                        if($o['o_sn'] != $sn){
                            $details = $detailmodel->where('od_o_sn',$o['o_sn'])->findAll();
                            // 明細迴圈
                            foreach($details as $detail){
                                $mdetail = $detailmodel->where('od_o_sn',$sn)->where('od_p_sn',$detail['od_p_sn'])->where('od_price',$detail['od_price'])->first();
                                // 如果主訂單有此明細update
                                if($mdetail){
                                    $data = [                                        
                                        'od_amount' => $mdetail['od_amount'] + $detail['od_amount'],
                                        'od_modify_time' => date('Y-m-d H:i:s'),
                                    ];
                                    $detailmodel->update($mdetail['od_sn'],$data);
                                    
                                }
                                // 如果主訂單無此明細insert
                                else{
                                    $data = [
                                        'od_o_sn' => $sn,
                                        'od_p_sn' => $detail['od_p_sn'],
                                        'od_amount' => $detail['od_amount'],
                                        'od_price' => $detail['od_price'],
                                        'od_memo' => $detail['od_memo'],
                                        'od_create_time' => date('Y-m-d H:i:s'),
                                        'od_modify_time' => date('Y-m-d H:i:s'),
                                    ];
                                    $detailmodel->insert($data);
                                }
                            }
                            // 加入刪除訂單行列
                            array_push($DeleteData,$o['o_sn']);
                        }
                    }
                    // 重新計算總額
                    $total = 0;
                    $dds = $detailmodel->where('od_o_sn',$sn)->findAll();
                    foreach($dds as $dd){
                        $total = $total + (floatval($dd['od_amount']) * floatval($dd['od_price']));
                    }
                    $data = [
                        'o_toal_money' => round(($total*1.05),2)
                    ];
                    $model->update($sn,$data);
                    
                    // 刪除其餘訂單
                    $detailmodel->whereIn('od_o_sn',$DeleteData)->delete();
                    $model->whereIn('o_sn',$DeleteData)->delete();    


                    $result['msg'] = "合併後訂單編號為".$sn;    
                    $result['success'] = true;
                }
            }
        }
        

        return json_encode($result,JSON_UNESCAPED_UNICODE);
    }

    // 列印
    public function Print($sn = null){

        $order = (new OrderModel())->find($sn);

        $orderDetail = (new OrderDetailModel())->where('od_o_sn',$sn)->findAll();
//print_r($model->getLastQuery()->getQuery());exit();
        $Customer = (new CustomerModel())->find($order['o_c_sn']);
        
        $phpWord = new PhpWord();
        // 全域樣式
        $phpWord->setDefaultFontSize(12);

        $section = $phpWord->addSection(array('marginBottom'=>285,'marginLeft'=>285,'marginRight'=>285,'marginTop'=>285));

        // 添加頁首        
        $header = $section->addHeader();        
        // $header->addText('大發日用品-商品查補理貨表');
        // $header->addText('列印時間：'.date('Y-m-d H:i:s'),array('align'=>'right'));
        $htable = $header->addTable(array(
            'unit' => \PhpOffice\PhpWord\SimpleType\TblWidth::PERCENT,
            'width' => 100 * 50,
        ));
        $htable->addRow();
        $htable->addCell()->addText('大發日用品-商品查補理貨表');
        $htable->addCell()->addText('列印時間：'.date('Y-m-d H:i:s'),null,array('align'=>'right'));
        // $htable->addRow();
        $header->addText($order['o_sn'].' 廠商編號'.$order['o_c_sn'].' '.$Customer['c_name']);        
        // $htable->addCell(100*50)->addText($order['o_sn'].' 廠商編號'.$order['o_c_sn'].' '.$Customer['c_name']);
        // $header->addRow();
        $htable = $header->addTable(array(
            'borderColor'=>'000000',
            'borderSize'=>'6',
            'unit' => \PhpOffice\PhpWord\SimpleType\TblWidth::PERCENT,
            'width' => 5000,
        ));
        $htable->addRow();
        $htable->addCell(7.5*50)->addText('儲位');
        $htable->addCell(40*50)->addText('品名');
        $htable->addCell(25*50)->addText('條碼');
        $htable->addCell(5*50)->addText('價格');
        $htable->addCell(7.5*50)->addText('數量');
        $htable->addCell(5*50)->addText('小計');
        $htable->addCell(10*50)->addText('備註');

        // $htable->
        $table = $section->addTable(array(
            'unit' => \PhpOffice\PhpWord\SimpleType\TblWidth::PERCENT,
            'width' => 5000,
            'borderTopColor' =>'000000',
            // 'borderTopSize' => 6,
            'borderRightColor' =>'000000',
            'borderRightSize' => 6,
            'borderBottomColor' =>'000000',
            'borderBottomSize' => 6,
            'borderLeftColor' =>'000000',
            'borderLeftSize' => 6,
            
        ));
		//先抓到暫存陣列，然後用 儲位排序
		/*
		$i=0;
		foreach($orderDetail as $detail){
            $product = (new ProductModel())->find($detail['od_p_sn']);
            $table->addRow();
            
            $orderDetail_temp[$i]["p_storage"]=$product['p_storage'];
            $orderDetail_temp[$i]["p_name"]=$product['p_name'];
            $orderDetail_temp[$i]["p_barcode"]=$product['p_barcode'];
            $orderDetail_temp[$i]["od_price"]=$detail['od_price'];
            $orderDetail_temp[$i]["od_amount"]=$detail['od_amount'];
            $orderDetail_temp[$i]["od_amount2"]=round(floatval($detail['od_price'])*floatval($detail['od_amount']),2);
            $orderDetail_temp[$i]["od_memo"]=$detail['od_memo'];
    $i++;
        }*/
		/*
        foreach($orderDetail_temp as $detail){
            $table->addCell(7.*50)->addText($detail['p_storage']);
            $table->addCell(40*50)->addText($detail['p_name']);
            $table->addCell(25*50)->addText($detail['p_barcode']);
            $table->addCell(5*50)->addText($detail['od_price'],null,array('align'=>'right'));
            $table->addCell(7.5*50,['borderRightSize' => 6])->addText($detail['od_amount'],null,array('align'=>'right'));
            $table->addCell(5*50,['borderRightSize' => 6])->addText($detail['od_amount2'],null,array('align'=>'right'));
            $table->addCell(10*50)->addText($detail['od_memo']);
    
        }*/

        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $tmpdocfile = 'test.docx';
        $objWriter->save($tmpdocfile); // 儲存為暫存檔
        $file_size = filesize($tmpdocfile);header("Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingm");
        header("Content-Length: " . $file_size);
        header('Content-Disposition: attachment; filename="test_download.docx";');
        header('Content-Transfer-Encoding: binary');
        readfile($tmpdocfile); // 讀出檔案內容開始下載
        unlink($tmpdocfile); // 刪除暫存檔

        //return redirect()->to('order/edit/'.$sn);
    }


    // Combobox Product Name
    public function ComboboxProductName(){
        $model = new ProductModel();
        $Products = $model->where('p_status',1)->orderBy('p_store_code')->findAll();

        $data = array();

        $i = 0 ;

        return json_encode($Products,JSON_UNESCAPED_UNICODE );
        // return $data;
    }
}