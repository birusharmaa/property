<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AllotStatus extends Migration
{
    protected $table = 'allot_status';
    public function up()
    {
        $this->forge->addField([
            'als_id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'als_title' => [
                'type' => 'varchar',
                'constraint' => '255', 
                'null' => true,
            ],
            'als_status' => [
                'type' => 'boolean',
                'default' => true,
            ],

            'als_created_at' => [
                'type' => 'datetime',
            ],

            'als_update_at' => [
                'type' => 'datetime',
                'null' => true,
            ],

            'als_update_by' => [
                'type' => 'INT',
                'null' => true,
            ],

            'als_created_by' => [
                'type' => 'INT',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('als_id', true);
        $this->forge->createTable($this->table);
    }

    public function down()
    {
        $this->forge->dropTable($this->table);
    }
}
