<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PropertiesArea extends Migration
{
    protected $table = 'properties_area';
    public function up()
    {
        $this->forge->addField([
            'ptar_id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'ptar_square_feet' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'ptar_carpet_area' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],

            'ptar_build-up_area' => [
                'type' => 'varchar',
                'constraint' => '20',
                'null' => true,
            ],

            'ptar_yard' => [
                'type' => 'varchar',
                'constraint' => '250',
                'null' => true,
            ],

            'ptar_meter' => [
                'type' => 'varchar',
                'constraint' => '250',
                'null' => true,
            ],

            'ptar_super_carpet_area' => [
                'type' => 'varchar',
                'constraint' => '250',
                'null' => true,
            ],
            'ptar_prop_id' => [
                'type' => 'INT',
                'constraint' => 11,
               
            ],

            'ptar_status' => [
                'type' => 'boolean',
                'default' => true,
            ],
            'ptar_created_at' => [
                'type' => 'datetime',
            ],

            'ptar_update_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'ptar_update_by' => [
                'type' => 'INT',
                'null' => true,
            ],

            'ptar_created_by' => [
                'type' => 'INT',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('ptar_id', true);
        $this->forge->addForeignKey('ptar_prop_id', 'properties_info', 'prpt_id');
        $this->forge->createTable($this->table);
    }

    public function down()
    {
        $this->forge->dropTable($this->table);
    }
}
