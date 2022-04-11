<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class VisitorBook extends Migration
{
    protected $table = 'visitorbooks';
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'varchar',
                'constraint' => '250',
                'null' => true,
            ],
            'phone' => [
                'type' => 'varchar',
                'constraint' => '15',
            ],
            'email' => [
                'type' => 'varchar',
                'constraint' => '100',
            ],
            'meeting_with' => [
                'type' => 'INT',
                'constraint' => '11',
                'unsigned'       => true,
            ],

            'purpose' => [
                'type' => 'varchar',
                'constraint' => '250',
                'null' => true,
            ],
            'visitor_id_no' => [
                'type' => 'varchar',
                'constraint' => '20',
                'null' => true,
            ],
            'in_time' => [
                'type' => 'time',
                'null' => true,
            ],
            'out_time' => [
                'type' => 'time',
                'null' => true,
            ],

            'status' => [
                'type' => 'boolean',
                'default' => true,
            ],
            'created_at' => [
                'type' => 'datetime',
            ],
            'created_by' => [
                'type' => 'INT',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],

            'updated_by' => [
                'type' => 'INT',
                'null' => true,
            ],

            'deleted_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'deleted_by' => [
                'type' => 'INT',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable($this->table);
    }
    public function down()
    {
        $this->forge->dropTable($this->table);
    }
}
