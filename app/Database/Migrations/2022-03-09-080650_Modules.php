<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Modules extends Migration
{
    protected $table = 'modules';
    public function up()
    {
        $this->forge->addField([
            'mod_id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'mod_name' => [
                'type'=> 'varchar',
                'constraint' => '250',
            ],
            'mod_class'=> [
                'type'=> 'varchar',
                'constraint' => '250',
            ],
            'mod_url'=> [
                'type'=> 'text',
                'constraint' => '250',
            ],
            
            'mod_status' => [
                'type' => 'boolean',
                'default' => true,
            ],
            'mod_created_at' => [
                'type' => 'datetime',
            ],

            'mod_update_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'mod_update_by' => [
                'type' => 'INT',
                'null' => true,
            ],
            'mod_created_by' => [
                'type' => 'INT',
                'null' => true,

            ],
        ]);
        $this->forge->addKey('mod_id', true);
        $this->forge->createTable($this->table);
    }

    public function down()
    {
        $this->forge->dropTable($this->table);
    }
}
