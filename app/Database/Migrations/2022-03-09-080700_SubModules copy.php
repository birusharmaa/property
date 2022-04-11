<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SubModules extends Migration
{
    protected $table = 'sub_modules';
    public function up()
    {
        $this->forge->addField([
            'sm_id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'sm_name' => [
                'type'=> 'varchar',
                'constraint' => '250',
            ],
            'sm_class'=> [
                'type'=> 'varchar',
                'constraint' => '250',
            ],
            'sm_url'=> [
                'type'=> 'text',
                'constraint' => '250',
            ],
            'sm_mod_id'=> [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            
            'sm_status' => [
                'type' => 'boolean',
                'default' => true,
            ],
            'sm_created_at' => [
                'type' => 'datetime',
            ],

            'sm_update_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'sm_update_by' => [
                'type' => 'INT',
                'null' => true,
            ],
            'sm_created_by' => [
                'type' => 'INT',
                'null' => true,

            ],
        ]);
        $this->forge->addKey('sm_id', true);
        $this->forge->addForeignKey('sm_mod_id', 'modules','mod_id');
        $this->forge->createTable($this->table);
    }

    public function down()
    {
        $this->forge->dropTable($this->table);
    }
}
