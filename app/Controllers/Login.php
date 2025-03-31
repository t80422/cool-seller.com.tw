<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\UsersModel;

class Login extends Controller
{
    protected $userModel;
    
    public function __construct()
    {
        $this->userModel = new UsersModel();
    }
    
    public function index()
    {
        return view('backend/login/index');
    }

    public function login()
    {
        // 判斷是否Post
        if (! $this->request->is('post')) {
            return redirect()->back();
        }
        
        // 表單驗證規則
        $rules = [
            'account' => 'required',
            'pwd' => 'required'
        ];
        
        // 驗證成功
        if ($this->validate($rules)) {
            $account = $this->request->getVar('account');
            $password = $this->request->getVar('pwd');
            
            // 使用模型方法驗證用戶
            $user = $this->userModel->verifyUser($account, $password);
            
            if ($user) {
                // 加入session           
                session()->set('USER_NAME', $user['u_name']);
                session()->set('LOGIN_TIME', date('Y/m/d H:i:s'));
                session()->set('USER_ID', $user['u_id']);
                session()->set('USER_POWER', $user['u_power']);
                
                // 更新登入時間
                $this->userModel->updateLastLogin($user['u_id']);

                return redirect()->to('/backend/setting/mypage');
            } else {
                return redirect()->back()->with('error', '帳號或密碼錯誤，或帳號已被停用');
            }
        }
        // 驗證失敗
        else {
            return redirect()->back()->with('error', '請輸入帳號密碼');
        }
    }

    public function logout()
    {
        session()->remove('USER_NAME');
        session()->remove('USER_SN');
        session()->remove('LOGIN_TIME');
        session()->remove('USER_POWER');
        return redirect()->to('/')->with('message', '已登出系統');
    }
}
