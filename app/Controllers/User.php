<?php

namespace App\Controllers\Backend;

use CodeIgniter\Controller;
use App\Models\UsersModel;

class User extends Controller
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UsersModel();
    }

    // 列表
    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        $pager = service('pager');
        $page = (int)($this->request->getGet('page') ?? 1);
        $datas = $this->userModel->getList($keyword, $page);
        $pager_links = $pager->makeLinks($page, $datas['perPage'], $datas['total'], 'backend_pages');

        $data = [
            'pager_links' => $pager_links,
            'Users' => $datas['items'],
            'keyword' => !empty($this->request->getGet('keyword')) ? $this->request->getGet('keyword') : '',
        ];

        return view('backend/user/index', $data);
    }

    // 新增
    public function create()
    {
        return view('backend/user/form', [
            'isEdit' => false
        ]);
    }

    // 送出新增
    public function additem()
    {
        // 檢查是否為 POST 請求
        if (! $this->request->is('post')) {
            return redirect()->back();
        }

        $pwd = $this->request->getVar('pwd');
        $chkPwd = $this->request->getVar('chk-pwd');

        // 收集表單數據
        $data = [
            'u_name' => $this->request->getVar('name'),
            'u_account' => $this->request->getVar('account'),
            'u_pwd' => $pwd,
            'u_power' => $this->request->getVar('power'),
            'u_email' => $this->request->getVar('email'),
            'u_create_time' => date('Y-m-d H:i:s'),
            'u_modify_time' => date('Y-m-d H:i:s'),
            'u_last_login' => '',
            'u_status' => 1,
        ];

        // 驗證資料
        if ($pwd !== $chkPwd) {
            return redirect()->back()->withInput()->with('error', '確認密碼與密碼不同');
        }

        // 執行驗證
        if (!$this->userModel->validate($data)) {
            $errors = $this->userModel->errors();
            return redirect()->back()->withInput()->with('validation', $errors);
        }

        // 驗證通過，插入數據
        if (!$this->userModel->insert($data)) {
            $errors = $this->userModel->errors();
            log_message('error', '資料庫插入錯誤: ' . print_r($errors, true));
            return redirect()->back()->withInput()->with('error', '資料庫錯誤');
        };

        return redirect()->to('backend/user');
    }

    // 修改
    public function edit($sn = null)
    {
        if (!$sn) {
            return redirect()->to('user');
        }

        $data = $this->userModel->find($sn);
        $data['u_pwd'] = null;

        return view('backend/user/form', [
            'isEdit' => true,
            'user' => $data
        ]);
    }

    // 修改資料
    public function edititem()
    {
        $userId = $this->request->getVar('userId');
        $data = [
            'u_name' => $this->request->getVar('name'),
            'u_account' => $this->request->getVar('account'),
            'u_power' => $this->request->getVar('power'),
            'u_email' => $this->request->getVar('email'),
            'u_modify_time' => date('Y-m-d H:i:s'),
        ];

        $pwd = $this->request->getVar('pwd');

        if (!empty($pwd)) {
            $data['u_pwd'] = $pwd;
            $chkPwd = $this->request->getVar('chk-pwd');

            if ($pwd !== $chkPwd) {
                return redirect()->back()->withInput()->with('error', '確認密碼與密碼不同');
            }
        }

        // 如果是編輯模式，設置驗證規則以排除自身
        $this->userModel->setValidationRules([
            'u_account' => "is_unique[iv_users.u_account,u_sn,$userId]",
            'u_email' => "valid_email|is_unique[iv_users.u_email,u_sn,$userId]"
        ]);

        // 執行驗證
        if (!$this->userModel->validate($data)) {
            $errors = $this->userModel->errors();
            return redirect()->back()->withInput()->with('validation', $errors);
        }

        if (!$this->userModel->update($userId, $data)) {
            $errors = $this->userModel->errors();
            log_message('error', '資料庫更新錯誤: ' . print_r($errors, true));
            return redirect()->back()->withInput()->with('error', '資料庫錯誤');
        }

        return redirect()->to('backend/user');
    }

    // 刪除資料
    public function delitem($sn = null)
    {
        $this->userModel->delete($sn);

        return redirect()->back();
    }
}
