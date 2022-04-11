<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PropertiesAmenities extends Migration
{
    protected $table = 'properties_amenities';
    public function up()
    {
        $this->forge->addField([
            'pa_id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'pa_amenities' => [
                'type' => 'JSON',
                'null' => true,
            ],
        
            'pa_prop_id' => [
                'type' => 'INT',
                'constraint' => 11, 
            ],

            'pa_status' => [
                'type' => 'boolean',
                'default' => true,
            ],
            'pa_created_at' => [
                'type' => 'datetime',
            ],

            'pa_update_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'pa_update_by' => [
                'type' => 'INT',
                'null' => true,
            ],

            'pa_created_by' => [
                'type' => 'INT',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('pa_id', true);
        $this->forge->addForeignKey('pa_prop_id', 'properties_info', 'prpt_id');
        $this->forge->createTable($this->table);
    }

    public function down()
    {
        $this->forge->dropTable($this->table);
    }
}
