<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PropertyUeserRelation extends Migration
{
    protected $table = 'property_ueser_relation';
    public function up()
    {
        $this->forge->addField([
            'pur_id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'pur_user_id' => [
                'type' => 'JSON',
                'null' => true,
            ],
        
            'pur_prop_id' => [
                'type' => 'INT',
                'constraint' => 11, 
            ],
            'pur_allot_status_id' => [
                'type' => 'INT',
                'constraint' => 11, 
            ],
            'pur_status' => [
                'type' => 'boolean',
                'default' => true,
            ],

            'pur_created_at' => [
                'type' => 'datetime',
            ],

            'pur_update_at' => [
                'type' => 'datetime',
                'null' => true,
            ],

            'pur_update_by' => [
                'type' => 'INT',
                'null' => true,
            ],

            'pur_created_by' => [
                'type' => 'INT',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('pur_id', true);
        $this->forge->addForeignKey('pur_prop_id', 'properties_info', 'prpt_id');
        $this->forge->createTable($this->table);
    }

    public function down()
    {
        $this->forge->dropTable($this->table);
    }
}
