<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdatePermissionsTable extends Migration
{
    public function up()
    {
        // 添加 p_user_id 欄位
        $this->forge->addColumn('permissions', [
            'p_user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false,
                'default' => 0,
                'after' => 'p_id'
            ]
        ]);
        
        // 將現有 p_power=0 的記錄更新為 p_user_id=0（作為預設權限）
        $this->db->query('UPDATE permissions SET p_user_id = 0 WHERE p_power = 0');
        
        // 移除舊的 p_power 欄位
        $this->forge->dropColumn('permissions', 'p_power');
        
        // 添加索引
        $this->forge->addKey('p_user_id', false, true);
    }

    public function down()
    {
        // 添加 p_power 欄位
        $this->forge->addColumn('permissions', [
            'p_power' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false,
                'default' => 0,
                'after' => 'p_id'
            ]
        ]);
        
        // 還原數據
        $this->db->query('UPDATE permissions SET p_power = 0 WHERE p_user_id = 0');
        
        // 移除 p_user_id 欄位
        $this->forge->dropColumn('permissions', 'p_user_id');
    }
} 