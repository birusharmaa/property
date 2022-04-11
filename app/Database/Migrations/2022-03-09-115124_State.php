<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class State extends Migration
{
    protected $table = 'state';
    public function up()
    {
        $this->forge->addField([
            'st_id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'st_title' => [
                'type' => 'varchar',
                'constraint' => '250',

            ],
            'country_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'null' => true,
            ],

            'st_status' => [
                'type' => 'boolean',
                'default' => true,
            ],
            'st_created_at' => [
                'type' => 'datetime',
            ],

            'st_update_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'st_update_by' => [
                'type' => 'INT',
                'null' => true,
            ],
            'st_created_by' => [
                'type' => 'INT',
                'null' => true,

            ],
        ]);
        $this->forge->addKey('st_id', true);
        $this->forge->createTable($this->table);
    }

    public function down()
    {
        $this->forge->dropTable($this->table);
    }
}
