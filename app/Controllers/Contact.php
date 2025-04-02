<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ContactModel;

class Contact extends Controller
{
    private $contactModel;

    public function __construct()
    {
        $this->contactModel = new ContactModel();
    }

    public function create()
    {
        // 顯示聯絡表單頁面
        return view('contact/create');
    }

    public function submit()
    {
        $contactData = [
            'co_Name' => $this->request->getPost('name'),
            'co_Email' => $this->request->getPost('email'),
            'co_Subject' => $this->request->getPost('subject'),
            'co_Message' => $this->request->getPost('message')
        ];

        $this->contactModel->save($contactData);

        return redirect()->to(site_url('/'));
    }

    // 列表
    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        $pager = service('pager');
        $page = (int)($this->request->getGet('page') ?? 1);
        $datas = $this->contactModel->getList($keyword, $page);
        $pager_links = $pager->makeLinks($page, $datas['perPage'], $datas['total'], 'backend_pages');

        $data = [
            'pager_links' => $pager_links,
            'Datas' => $datas['items'],
            'keyword' => !empty($this->request->getGet('keyword')) ? $this->request->getGet('keyword') : '',
        ];

        return view('backend/contact/index', $data);
    }

    // 刪除資料
    public function delitem($sn = null)
    {
        $this->contactModel->delete($sn);
        return redirect()->back()->with('message', '聯絡我們項目已刪除');
    }

    // 查看詳細訊息
    public function view($id = null)
    {
        $data = $this->contactModel->find($id);

        if (empty($data)) {
            return redirect()->to('backend/contact')->with('error', '找不到指定的聯絡我們項目');
        }

        return view('backend/contact/view', [
            'contact' => $data
        ]);
    }
}
