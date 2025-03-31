<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'u_id';
    protected $allowedFields = [
        'u_name',
        'u_account',
        'u_pwd',
        'u_power',
        'u_update_time',
        'u_last_login',
        'u_enabled'
    ];

    protected $validationRules = [
        'u_account' => 'is_unique[users.u_account,u_id,{u_id}]',
        'u_email' => 'valid_email|is_unique[users.u_email,u_id,{u_id}]'
    ];

    protected $validationMessages = [
        'u_account' => [
            'is_unique' => '帳號重複請重新輸入',
        ],
        'u_email' => [
            'valid_email' => '信箱格式不正確',
            'is_unique' => '信箱重複請重新輸入',
        ]
    ];

    /**
     * 驗證用戶登入
     *
     * @param string $account 用戶帳號
     * @param string $password 用戶密碼
     * @param bool $adminOnly 是否只檢查管理員
     * @return array|null 成功返回用戶數據，失敗返回null
     */
    public function verifyUser(string $account, string $password, bool $adminOnly = false)
    {
        $builder = $this->builder();
        $builder->where('u_account', $account);
        
        if ($adminOnly) {
            $builder->where('u_power', 'admin');
        }
        
        $user = $builder->get()->getRowArray();
        
        if (!$user) {
            return null; // 用戶不存在
        }
        
        if ($user['u_pwd'] !== $password) {
            return null; // 密碼錯誤
        }
        
        if ($user['u_enabled'] != 1) {
            return null; // 用戶被停用
        }
        
        return $user;
    }
    
    /**
     * 更新用戶最後登入時間
     *
     * @param int $userSn 用戶序號
     * @return bool 更新結果
     */
    public function updateLastLogin(int $userSn)
    {
        $data = ['u_last_login' => date('Y-m-d H:i:s')];
        return $this->update($userSn, $data);
    }

    public function getList($keyword, $page = 1)
    {
        $builder = $this->builder();

        if (!empty($keyword)) {
            $builder->groupStart()
                ->like('u_name', $keyword)
                ->orLike('u_account', $keyword)
                ->orLike('u_email', $keyword)
                ->groupEnd();
        }

        $total = $builder->countAllResults(false);
        $perPage = 10;
        $offset = ($page - 1) * $perPage;
        $users = $builder->limit($perPage, $offset)
            ->get()
            ->getResultArray();

        return [
            'total' => $total,
            'perPage' => $perPage,
            'items' => $users
        ];
    }
}
