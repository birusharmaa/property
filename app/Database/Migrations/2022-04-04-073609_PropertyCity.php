<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PropertyCity extends Migration
{
    protected $table = 'propertycities';
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'ct_title' => [
                'type' => 'varchar',
                'constraint' => '250',
                'null' => true,
            ],
            'state_id' => [
                'type' => 'INT',
                'constraint' => '11',
            ],

            'status' => [
                'type' => 'boolean',
                'default' => true,
            ],
            'created_at' => [
                'type' => 'datetime',
            ],
            'created_by' => [
                'type' => 'INT',
                'null' => true,
            ],
            'update_at' => [
                'type' => 'datetime',
                'null' => true,
            ],

            'update_by' => [
                'type' => 'INT',
                'null' => true,
            ],

            'deleted_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'deleted_by' => [
                'type' => 'INT',
                'null' => true,
            ],
       
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable($this->table);
    }
    public function down()
    {
        $this->forge->dropTable($this->table);
    }
}
