<?php

namespace App\Controllers;

use App\Models\PermissionModel;
use App\Models\UsersModel;

class Permission extends BaseController
{
    protected $permissionModel;
    protected $userModel;
    
    public function __construct()
    {
        $this->permissionModel = new PermissionModel();
        $this->userModel = new UsersModel();
    }
    
    public function index()
    {
        // 確保只有管理者可以訪問權限管理
        $userPower = session()->get('u_power') ?? 0;
        if ($userPower != 99) {
            return redirect()->to('backend/setting/mypage');
        }
        
        // 獲取所有一般使用者
        $normalUsers = $this->userModel->where('u_power', 0)->findAll();
        $userPermissions = [];
        
        // 獲取每個用戶的權限設定
        foreach ($normalUsers as $user) {
            $userId = $user['u_id'];
            $permData = $this->permissionModel->getPermissionByUserId($userId);
            if ($permData) {
                $permissions = json_decode($permData['p_permissions'], true) ?: [];
                $userPermissions[$userId] = [
                    'name' => $user['u_name'],
                    'account' => $user['u_account'],
                    'permissions' => $permissions
                ];
            } else {
                $userPermissions[$userId] = [
                    'name' => $user['u_name'],
                    'account' => $user['u_account'],
                    'permissions' => []
                ];
            }
        }
        
        return view('backend/permission/index', [
            'userPermissions' => $userPermissions
        ]);
    }
    
    public function save()
    {
        // 確保只有管理者可以儲存權限設定
        $userPower = session()->get('u_power') ?? 0;
        if ($userPower != 99) {
            return redirect()->to('backend/setting/mypage');
        }
        
        if (!$this->request->is('post')) {
            return redirect()->back();
        }
        
        // 獲取用戶 ID 和權限設定
        $userId = $this->request->getPost('user_id');
        $permissions = $this->request->getPost('permissions') ?: [];
        
        // 存儲權限設定
        $success = $this->permissionModel->saveUserPermission($userId, $permissions);
        
        if ($success) {
            return redirect()->to('backend/permission')->with('message', '權限設定已儲存');
        } else {
            return redirect()->to('backend/permission')->with('error', '權限設定儲存失敗');
        }
    }
} 