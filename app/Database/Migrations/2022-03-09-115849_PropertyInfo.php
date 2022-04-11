<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PropertyInfo extends Migration
{
    protected $table = 'properties_info';
    public function up()
    {
        $this->forge->addField([
            'prpt_id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'prpt_title' => [
                'type' => 'varchar',
                'constraint' => '250',
            ],

            'prpt_no_of_bedrooms' => [
                'type' => 'varchar',
                'constraint' => '250',
                'null' => true,
            ],

            'prpt_no_of_bathrooms' => [
                'type' => 'varchar',
                'constraint' => '250',
                'null' => true,
            ],

            'prpt_no_of_balconies' => [
                'type' => 'varchar',
                'constraint' => '250',
                'null' => true,
            ],

            'prpt_kitechen_size' => [
                'type' => 'varchar',
                'constraint' => '250',
                'null' => true,
            ],
            'prpt_property_type' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'null' => true,
            ],

            'prpt_bathroom_style' => [
                'type' => 'varchar',
                'constraint' => '250',
                'null' => true,
            ],
            'prpt_drawing_hall' => [
                'type' => 'varchar',
                'constraint' => '250',
                'null' => true,
            ],
            'prpt_dining_hall' => [
                'type' => 'varchar',
                'constraint' => '250',
                'null' => true,
            ],
            'prpt_no_of_sittings' => [
                'type' => 'varchar',
                'constraint' => '250',
                'null' => true,
            ],
            'prpt_no_of_cabins' => [
                'type' => 'varchar',
                'constraint' => '250',
                'null' => true,
            ],
            'prpt_property_type1' => [
                'type' => 'varchar',
                'constraint' => '250',
                'null' => true,
            ],
            'prpt_residential' => [
                'type' => 'varchar',
                'constraint' => '250',
                'null' => true,
            ],
            'prpt_commercial' => [
                'type' => 'varchar',
                'constraint' => '250',
                'null' => true,
            ],
            'prpt_industrial' => [
                'type' => 'varchar',
                'constraint' => '250',
                'null' => true,
            ],
            'prpt_no_of_lifts' => [
                'type' => 'varchar',
                'constraint' => '250',
                'null' => true,
            ],
            'prpt_no_of_entry_gates' => [
                'type' => 'varchar',
                'constraint' => '250',
                'null' => true,
            ],
            'prpt_drawing_hall_size' => [
                'type' => 'varchar',
                'constraint' => '250',
                'null' => true,
            ],
            'prpt_dining_hall_size' => [
                'type' => 'varchar',
                'constraint' => '250',
                'null' => true,
            ],
            'prpt_room_size' => [
                'type' => 'varchar',
                'constraint' => '250',
                'null' => true,
            ],
            'prpt_washroomsize' => [
                'type' => 'varchar',
                'constraint' => '250',
                'null' => true,
            ],
            'prpt_servant_room' => [
                'type' => 'varchar',
                'constraint' => '250',
                'null' => true,
            ],

            'prpt_images_link' => [
                'type' => 'varchar',
                'constraint' => '250',
                'null' => true,
            ],
            'prpt_video_link' => [
                'type' => 'varchar',
                'constraint' => '250',
                'null' => true,
            ],

            'prpt_status' => [
                'type' => 'boolean',
                'default' => true,
            ],
            'prpt_created_at' => [
                'type' => 'datetime',
            ],

            'prpt_update_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'prpt_update_by' => [
                'type' => 'INT',
                'null' => true,
            ],
            'prpt_created_by' => [
                'type' => 'INT',
                'null' => true,

            ],
        ]);
        $this->forge->addKey('prpt_id', true);
        $this->forge->addForeignKey('prpt_property_type', 'property_type', 'pt_id');
        $this->forge->createTable($this->table);
    }

    public function down()
    {
        $this->forge->dropTable($this->table);
    }
}
