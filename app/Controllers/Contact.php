<?php

namespace App\Controllers;

use App\Models\ContactModel;

class Contact extends BaseController
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

        return view('contact\index', [
            'datas' => $datas['items'],
            'pager_links' => $pager_links,
            'keyword' => !empty($keyword) ? $keyword : ''
        ]);
    }

    // 刪除資料
    public function delete($id = null)
    {
        $this->contactModel->delete($id);

        return redirect()->back();
    }
}
