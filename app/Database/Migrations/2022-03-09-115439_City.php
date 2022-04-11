<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class City extends Migration
{
    protected $table = 'city';
    public function up()
    {
        $this->forge->addField([
            'ct_id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'ct_title' => [
                'type' => 'varchar',
                'constraint' => '250',

            ],
            'state_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'null' => true,
            ],

            'ct_status' => [
                'type' => 'boolean',
                'default' => true,
            ],
            'ct_created_at' => [
                'type' => 'datetime',
            ],

            'ct_update_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'ct_update_by' => [
                'type' => 'INT',
                'null' => true,
            ],
            'ct_created_by' => [
                'type' => 'INT',
                'null' => true,

            ],
        ]);
        $this->forge->addKey('ct_id', true);
        $this->forge->addForeignKey('state_id', 'state','st_id');
        $this->forge->createTable($this->table);
    }

    public function down()
    {
        $this->forge->dropTable($this->table);
    }
}
