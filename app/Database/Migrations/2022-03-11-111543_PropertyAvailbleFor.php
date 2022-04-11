<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PropertyAvailbleFor extends Migration
{
    protected $table = 'propertiesavailablefors';
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'title' => [
                'type' => 'varchar',
                'constraint' => '250',

            ],
            'status' => [
                'type' => 'boolean',
                'default' => true,
            ],
            'created_at' => [
                'type' => 'datetime',
            ],

            'update_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'update_by' => [
                'type' => 'INT',
                'null' => true,
            ],
            'created_by' => [
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
