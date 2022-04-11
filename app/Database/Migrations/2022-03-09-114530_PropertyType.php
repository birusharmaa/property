<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PropertyType extends Migration
{
    protected $table = 'property_type';
    public function up()
    {
        $this->forge->addField([
            'pt_id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'pt_title' => [
                'type'=> 'varchar',
                'constraint' => '250',
            ],
            
            'pt_status' => [
                'type' => 'boolean',
                'default' => true,
            ],
            'pt_created_at' => [
                'type' => 'datetime',
            ],

            'pt_update_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'pt_update_by' => [
                'type' => 'INT',
                'null' => true,
            ],
            'pt_created_by' => [
                'type' => 'INT',
                'null' => true,

            ],
        ]);
        $this->forge->addKey('pt_id', true);
        $this->forge->createTable($this->table);
    }

    public function down()
    {
        $this->forge->dropTable($this->table);
    }
}
