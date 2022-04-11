<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddRole extends Migration
{
    protected $table = 'user_roles';
    public function up()
    {
        $this->forge->addField([
            'r_id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'name' => [
                'type'=> 'varchar',
                'constraint' => '250',
            ],
            
            'type' => [
                'type' => 'ENUM("Super Admin","Admin","User", "Staff")',
                'default' => NULL,
                'null' => true,
            ],
            
            'status' => [
                'type' => 'boolean',
                'default' => true,
            ],
            
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addKey('r_id', true);
        $this->forge->createTable($this->table);
    }

    public function down()
    {
        $this->forge->dropTable($this->table);
    }
}
