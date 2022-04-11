<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Projects extends Migration
{
    protected $table = 'projects';
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'project_title' => [
                'type' => 'varchar',
                'constraint' => '250',
                'null' => true,
            ],
            'city_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned'       => true,
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
            'update_at' => [
                'type' => 'datetime',
                'null' => true,
            ],

            'update_by' => [
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
            'ques_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('city_id', 'property_city', 'id');
        $this->forge->createTable($this->table);
    }
    public function down()
    {
        $this->forge->dropTable($this->table);
    }
}
