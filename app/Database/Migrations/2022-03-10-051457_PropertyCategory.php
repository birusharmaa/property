<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PropertyCategory extends Migration
{
    protected $table = 'property_category';
    public function up()
    {
        $this->forge->addField([
            'cat_id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'cat_title' => [
                'type' => 'varchar',
                'constraint' => '255',
                'null' => true,
            ],
            'cat_status' => [
                'type' => 'boolean',
                'default' => true,
            ],

            'cat_created_at' => [
                'type' => 'datetime',
            ],

            'cat_update_at' => [
                'type' => 'datetime',
                'null' => true,
            ],

            'cat_update_by' => [
                'type' => 'INT',
                'null' => true,
            ],

            'cat_created_by' => [
                'type' => 'INT',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('cat_id', true);
        $this->forge->createTable($this->table);
    }

    public function down()
    {
        $this->forge->dropTable($this->table);
    }
}
