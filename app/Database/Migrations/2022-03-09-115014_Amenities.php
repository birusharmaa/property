<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Amenities extends Migration
{
    protected $table = 'amenities';
    public function up()
    {
        $this->forge->addField([
            'ame_id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'ame_title' => [
                'type'=> 'varchar',
                'constraint' => '250',
            ],
            
            'ame_status' => [
                'type' => 'boolean',
                'default' => true,
            ],
            'ame_created_at' => [
                'type' => 'datetime',
            ],

            'ame_update_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'ame_update_by' => [
                'type' => 'INT',
                'null' => true,
            ],
            'ame_created_by' => [
                'type' => 'INT',
                'null' => true,

            ],
        ]);
        $this->forge->addKey('ame_id', true);
        $this->forge->createTable($this->table);
    }

    public function down()
    {
        $this->forge->dropTable($this->table);
    }
}
