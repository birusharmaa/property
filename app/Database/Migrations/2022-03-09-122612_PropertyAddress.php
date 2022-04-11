<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PropertyAddress extends Migration
{
    protected $table = 'properties_address';
    public function up()
    {
        $this->forge->addField([
            'ptadd_id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'ptadd_state' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'ptadd_city' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],

            'ptadd_zip_code' => [
                'type' => 'varchar',
                'constraint' => '20',
                'null' => true,
            ],

            'ptadd_near_by' => [
                'type' => 'varchar',
                'constraint' => '250',
                'null' => true,
            ],

            'ptadd_locality' => [
                'type' => 'varchar',
                'constraint' => '250',
                'null' => true,
            ],

            'ptadd_tower_name' => [
                'type' => 'varchar',
                'constraint' => '250',
                'null' => true,
            ],

            'ptadd_block' => [
                'type' => 'varchar',
                'constraint' => '250',
                'null' => true,
            ],

            'ptadd_pocket' => [
                'type' => 'varchar',
                'constraint' => '250',
                'null' => true,
            ],
            'ptadd_township' => [
                'type' => 'varchar',
                'constraint' => '250',
                'null' => true,
            ],
            'ptadd_society_name' => [
                'type' => 'varchar',
                'constraint' => '250',
                'null' => true,
            ],
            'ptadd_builder_name' => [
                'type' => 'varchar',
                'constraint' => '250',
                'null' => true,
            ],

            'ptadd_building' => [
                'type' => 'varchar',
                'constraint' => '250',
                'null' => true,
            ],
            'ptadd_property_type1' => [
                'type' => 'varchar',
                'constraint' => '250',
                'null' => true,
            ],
            'ptadd_floor' => [
                'type' => 'varchar',
                'constraint' => '250',
                'null' => true,
            ],
            'ptadd_facing' => [
                'type' => 'varchar',
                'constraint' => '250',
                'null' => true,
            ],
            'ptadd_house_unit_no' => [
                'type' => 'varchar',
                'constraint' => '250',
                'null' => true,
            ],
            'ptadd_longitude' => [
                'constraint' => '250',
                'null' => true,
            ],
            'ptadd_latitude' => [
                'constraint' => '250',
                'null' => true,
            ],
            'ptadd_property_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'ptadd_status' => [
                'type' => 'boolean',
                'default' => true,
            ],
            'ptadd_created_at' => [
                'type' => 'datetime',
            ],

            'ptadd_update_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'ptadd_update_by' => [
                'type' => 'INT',
                'null' => true,
            ],

            'ptadd_update_by' => [
                'type' => 'INT',
                'null' => true,
            ],
            'ptadd_created_by' => [
                'type' => 'INT',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('ptadd_id', true);
        $this->forge->addForeignKey('ptadd_property_id', 'properties_info', 'prpt_id');
        $this->forge->createTable($this->table);
    }

    public function down()
    {
        $this->forge->dropTable($this->table);
    }
}
