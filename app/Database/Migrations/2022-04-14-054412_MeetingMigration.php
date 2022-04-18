<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MeetingMigration extends Migration
{
    protected $table = 'meetings';
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'emp_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'lead_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],

            'meeting_date' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'meeting_time' => [
                'type' => 'time',
                'null' => true,
            ],
            'purpose' => [
                'type' => 'varchar',
                'constraint' => '250',
                'null' => true,
            ],
            'remark_after_meet' => [
                'type' => 'varchar',
                'constraint' => '250',
                'null' => true,
            ],
            'meeting_status' => [
                'type'           => 'INT',
                'constraint'     => 11,
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
