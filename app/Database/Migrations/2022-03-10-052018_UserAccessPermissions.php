<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserAccessPermissions extends Migration
{
    protected $table = 'user_access_permissions';
    public function up()
    {
        $this->forge->addField([
            'uap_id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],

            'uap_user_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'user_role_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],

            'uap_permission' => [
                'type' => 'JSON',
                "null" => true
            ],
            'uap_full_access' => [
                'type' => 'boolean',
                'default' => true,
            ],
            'uap_status' => [
                'type' => 'boolean',
                'default' => true,
            ],
            'uap_update_by' => [
                'type' => 'INT',
                'null' => true,
            ],
            'uap_created_by' => [
                'type' => 'INT',
                'null' => true,

            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addKey('uap_id', true);
        $this->forge->createTable($this->table);
    }

    public function down()
    {
        $this->forge->dropTable($this->table);
    }
}
