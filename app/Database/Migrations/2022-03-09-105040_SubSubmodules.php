<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SubSubmodules extends Migration
{
    protected $table = 'sub_sub_modules';
    public function up()
    {
        $this->forge->addField([
            'ssm_id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'ssm_name' => [
                'type'=> 'varchar',
                'constraint' => '250',
            ],
            'ssm_class'=> [
                'type'=> 'varchar',
                'constraint' => '250',
            ],
            'ssm_url'=> [
                'type'=> 'text',
                'constraint' => '250',
            ],
            'sm_id' => [
                'type'=> 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            
            'ssm_status' => [
                'type' => 'boolean',
                'default' => true,
            ],
            'ssm_created_at' => [
                'type' => 'datetime',
            ],

            'ssm_update_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'ssm_update_by' => [
                'type' => 'INT',
                'null' => true,
            ],
            'ssm_created_by' => [
                'type' => 'INT',
                'null' => true,

            ],
        ]);
        $this->forge->addKey('ssm_id', true);
        $this->forge->createTable($this->table);
    }

    public function down()
    {
        $this->forge->dropTable($this->table);
    }
}
