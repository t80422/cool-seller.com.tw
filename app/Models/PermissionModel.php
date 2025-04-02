<?php

namespace App\Models;

use CodeIgniter\Model;

class PermissionModel extends Model
{
    protected $table = 'permissions';
    protected $primaryKey = 'p_id';
    protected $allowedFields = [
        'p_user_id',     // 用戶ID，當為0時表示預設權限
        'p_permissions',
        'p_create_at',
        'p_update_at'
    ];
    
    /**
     * 根據用戶ID獲取權限設定
     *
     * @param int $userId 用戶ID
     * @return array|null 權限設定數據
     */
    public function getPermissionByUserId($userId)
    {
        return $this->where('p_user_id', $userId)->first();
    }
    
    /**
     * 保存用戶權限設定
     *
     * @param int $userId 用戶ID
     * @param array $permissions 權限列表
     * @return bool 是否保存成功
     */
    public function saveUserPermission($userId, $permissions)
    {
        // 權限數據轉為 JSON 存儲
        $permissionsJson = json_encode($permissions);
        
        // 檢查是否已存在該用戶的設定
        $existingPerm = $this->getPermissionByUserId($userId);
        
        $data = [
            'p_user_id' => $userId,
            'p_permissions' => $permissionsJson
        ];
        
        // 如果已存在，更新；否則，插入
        if ($existingPerm) {
            return $this->update($existingPerm['p_id'], $data);
        } else {
            return $this->insert($data);
        }
    }
    
    /**
     * 檢查用戶是否有特定功能的訪問權限
     *
     * @param int $userId 用戶ID
     * @param string $permission 功能權限代碼
     * @return bool 是否有權限
     */
    public function hasUserPermission($userId, $permission)
    {
        // 獲取用戶權限列表
        $permData = $this->getPermissionByUserId($userId);
        if (!$permData) {
            return false;
        }
        
        $permissions = json_decode($permData['p_permissions'], true) ?: [];
        
        return in_array($permission, $permissions);
    }
    
    /**
     * 向下兼容舊的方法，使用用戶ID而不是權限等級
     * 
     * @param int $power 權限等級 (保留參數，不使用)
     * @param string $permission 功能權限代碼
     * @return bool 是否有權限
     */
    public function hasPermission($power, $permission)
    {
        // 管理者擁有所有權限
        if ($power == 99) {
            return true;
        }
        
        // 獲取當前用戶ID
        $userId = session()->get('USER_ID');
        
        // 使用新的基於用戶ID的方法
        return $this->hasUserPermission($userId, $permission);
    }
} 