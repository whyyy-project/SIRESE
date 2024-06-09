<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BobotUserMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'body' => [
                'type' => 'INT',
                'constraint' => 100,
            ],
            'layar' => [
                'type' => 'INT',
                'constraint' => 100,
            ],
            'system' => [
                'type' => 'INT',
                'constraint' => 100,
            ],
            'memory' => [
                'type' => 'INT',
                'constraint' => 100,
            ],
            'main_camera' => [
                'type' => 'INT',
                'constraint' => 100,
            ],
            'front_camera' => [
                'type' => 'INT',
                'constraint' => 100,
            ],
            'battery' => [
                'type' => 'INT',
                'constraint' => 100,
            ],
            'harga' => [
                'type' => 'INT',
                'constraint' => 100,
            ],
            'harga_min' => [
                'type' => 'INT',
                'constraint' => 100,
                'null' => true,
                ],
                'harga_max' => [
                  'type' => 'INT',
                  'constraint' => 100,
                  'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('bobotUser');
    }

    public function down()
    {
        $this->forge->dropTable('bobotUser');
        
    }
}
