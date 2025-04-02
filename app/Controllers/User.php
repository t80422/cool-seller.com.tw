<?php

namespace App\Controllers;

use App\Models\UsersModel;

class User extends BaseController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UsersModel();
    }

    // 列表
    public function index()
    {
        // 確保有權限訪問
        $this->ensurePermission('account');
        
        $keyword = $this->request->getGet('keyword');
        $pager = service('pager');
        $page = (int)($this->request->getGet('page') ?? 1);
        
        // 獲取用戶權限等級
        $userPower = session()->get('u_power') ?? 0;
        $userId = session()->get('USER_ID');
        
        // 如果是一般使用者，僅顯示自己的帳號
        $datas = ($userPower == 99) ? 
            $this->userModel->getList($keyword, $page) : 
            $this->userModel->getListById($userId);
        
        // 如果是一般使用者的查詢結果，不需要分頁
        $pager_links = ($userPower == 99) ? 
            $pager->makeLinks($page, $datas['perPage'], $datas['total'], 'backend_pages') : '';

        $data = [
            'pager_links' => $pager_links,
            'datas' => $datas['items'] ?? $datas,
            'keyword' => !empty($this->request->getGet('keyword')) ? $this->request->getGet('keyword') : '',
            'isAdmin' => ($userPower == 99)
        ];

        return view('backend/user/index', $data);
    }

    // 新增
    public function create()
    {
        // 確保有權限訪問
        $this->ensurePermission('account');
        
        // 獲取用戶權限等級
        $userPower = session()->get('u_power') ?? 0;
        
        return view('backend/user/form', [
            'isEdit' => false,
            'isAdmin' => ($userPower == 99)
        ]);
    }

    // 送出新增
    public function additem()
    {
        // 確保有權限訪問
        $this->ensurePermission('account');
        
        // 檢查是否為 POST 請求
        if (! $this->request->is('post')) {
            return redirect()->back();
        }

        // 獲取用戶權限等級
        $userPower = session()->get('u_power') ?? 0;
        
        $pwd = $this->request->getVar('pwd');
        $chkPwd = $this->request->getVar('chk-pwd');
        $power = $this->request->getVar('power');

        // 先檢查密碼一致性
        if ($pwd !== $chkPwd) {
            return redirect()->back()->withInput()->with('error', '確認密碼與密碼不同');
        }
        
        // 檢查一般使用者是否嘗試創建管理者帳號
        if ($userPower != 99 && $power == 99) {
            return redirect()->back()->withInput()->with('error', '您沒有權限創建管理者帳號');
        }

        // 處理啟用狀態 (checkbox未勾選時不會傳值)
        $enabled = $this->request->getVar('enabled') ? 1 : 0;

        // 收集表單數據
        $data = [
            'u_name' => $this->request->getVar('name'),
            'u_account' => $this->request->getVar('account'),
            'u_pwd' => $pwd,
            'u_power' => $power,
            'u_enabled' => $enabled,
        ];

        // 執行驗證
        if (!$this->userModel->validate($data)) {
            $errors = $this->userModel->errors();
            return redirect()->back()->withInput()->with('validation', $errors);
        }

        // 開始事務處理
        $db = \Config\Database::connect();
        $db->transBegin();

        try {
            // 驗證通過，插入數據
            if (!$this->userModel->insert($data)) {
                $errors = $this->userModel->errors();
                log_message('error', '資料庫插入錯誤: ' . print_r($errors, true));
                $db->transRollback();
                return redirect()->back()->withInput()->with('error', '資料庫錯誤');
            }
            
            // 獲取新插入記錄的ID
            $newUserId = $this->userModel->getInsertID();
            
            // 如果是管理者設定一般使用者權限
            if ($power == 0 && $userPower == 99) {
                $permissions = $this->request->getVar('permissions') ?: [];
                $this->permissionModel->saveUserPermission($newUserId, $permissions);
            }
            
            $db->transCommit();
            return redirect()->to('backend/user')->with('message', '用戶新增成功');
        } catch (\Exception $e) {
            $db->transRollback();
            log_message('error', '新增用戶異常: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', '系統錯誤，請聯繫管理員');
        }
    }

    // 修改
    public function edit($id = null)
    {
        // 確保有權限訪問
        $this->ensurePermission('account');
        
        // 獲取用戶權限等級和當前用戶ID
        $userPower = session()->get('u_power') ?? 0;
        $currentUserId = session()->get('USER_ID');
        
        // 對於一般使用者，只能編輯自己的帳號
        if ($userPower != 99 && $id != $currentUserId) {
            return redirect()->to('backend/user')->with('error', '您只能編輯自己的帳號');
        }
        
        $data = $this->userModel->find($id);
        
        // 獲取用戶權限設定
        $permissions = [];
        if ($data['u_power'] == 0) {
            $permData = $this->permissionModel->getPermissionByUserId($id);
            if ($permData) {
                $permissions = json_decode($permData['p_permissions'], true) ?: [];
            }
        }

        return view('backend/user/form', [
            'isEdit' => true,
            'user' => $data,
            'isAdmin' => ($userPower == 99),
            'userPermissions' => $permissions
        ]);
    }

    // 修改資料
    public function edititem()
    {
        // 確保有權限訪問
        $this->ensurePermission('account');
        
        $userId = $this->request->getVar('userId');
        $power = $this->request->getVar('power');
        
        // 獲取用戶權限等級和當前用戶ID
        $userPower = session()->get('u_power') ?? 0;
        $currentUserId = session()->get('USER_ID');
        
        // 對於一般使用者，只能編輯自己的帳號
        if ($userPower != 99 && $userId != $currentUserId) {
            return redirect()->to('backend/user')->with('error', '您只能編輯自己的帳號');
        }
        
        // 檢查一般使用者是否嘗試提升自己為管理者
        if ($userPower != 99 && $power == 99) {
            return redirect()->back()->withInput()->with('error', '您沒有權限將帳號變更為管理者');
        }
        
        $data = [
            'u_name' => $this->request->getVar('name'),
            'u_account' => $this->request->getVar('account'),
            'u_power' => $power,
            'u_enabled' => $this->request->getVar('enabled') ? 1 : 0,
            'u_modify_time' => date('Y-m-d H:i:s'),
        ];

        $pwd = $this->request->getVar('pwd');

        if (!empty($pwd)) {
            $chkPwd = $this->request->getVar('chk-pwd');

            if ($pwd !== $chkPwd) {
                return redirect()->back()->withInput()->with('error', '確認密碼與密碼不同');
            }

            $data['u_pwd'] = $pwd;
        }

        // 如果是編輯模式，設置驗證規則以排除自身
        $this->userModel->setValidationRules([
            'u_account' => "is_unique[users.u_account,u_id,$userId]"
        ]);

        // 執行驗證
        if (!$this->userModel->validate($data)) {
            $errors = $this->userModel->errors();
            return redirect()->back()->withInput()->with('validation', $errors);
        }

        // 開始事務處理
        $db = \Config\Database::connect();
        $db->transBegin();

        try {
            if (!$this->userModel->update($userId, $data)) {
                $errors = $this->userModel->errors();
                $db->transRollback();
                return redirect()->back()->withInput()->with('error', '資料庫錯誤');
            }
            
            // 如果是管理者設定一般使用者權限
            if ($power == 0 && $userPower == 99) {
                $permissions = $this->request->getVar('permissions') ?: [];
                $this->permissionModel->saveUserPermission($userId, $permissions);
            }
            
            $db->transCommit();
            return redirect()->to('backend/user')->with('message', '用戶資料更新成功');
        } catch (\Exception $e) {
            $db->transRollback();
            return redirect()->back()->withInput()->with('error', '系統錯誤，請聯繫管理員');
        }
    }

    // 刪除資料
    public function delitem($sn = null)
    {
        // 確保有權限訪問
        $this->ensurePermission('account');
        
        // 獲取用戶權限等級和當前用戶ID
        $userPower = session()->get('u_power') ?? 0;
        $currentUserId = session()->get('USER_ID');
        
        // 對於一般使用者，不能刪除任何帳號
        if ($userPower != 99) {
            return redirect()->to('backend/user')->with('error', '您沒有權限刪除帳號');
        }
        
        $this->userModel->delete($sn);

        return redirect()->back();
    }
}
