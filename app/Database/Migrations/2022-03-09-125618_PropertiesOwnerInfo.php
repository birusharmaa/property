<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PropertiesOwnerInfo extends Migration
{
    protected $table = 'properties_owner_info';
    public function up()
    {
        $this->forge->addField([
            'poi_id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'poi_prop_owner_name' => [
                'type' => 'varchar',
                'constraint' => '250',
                'null' => true,
            ],
            'poi_owner_phone_umber' => [
                'type' => 'varchar',
                'constraint' => '15',
                'null' => true,
            ],
            'poi_alt_number' => [
                'type' => 'varchar',
                'constraint' => '20',
                'null' => true,
            ],
            'poi_owner_email' => [
                'type' => 'varchar',
                'constraint' => '250',
                'null' => true,
            ],

            'poi_prop_id' => [
                'type' => 'INT',
                'constraint' => 11, 
            ],

            'poi_status' => [
                'type' => 'boolean',
                'default' => true,
            ],
            'poi_created_at' => [
                'type' => 'datetime',
            ],

            'poi_update_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'poi_update_by' => [
                'type' => 'INT',
                'null' => true,
            ],

            'poi_created_by' => [
                'type' => 'INT',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('poi_id', true);
        $this->forge->addForeignKey('poi_prop_id', 'properties_info', 'prpt_id');
        $this->forge->createTable($this->table);
    }

    public function down()
    {
        $this->forge->dropTable($this->table);
    }
}
