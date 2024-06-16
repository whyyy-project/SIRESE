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
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'layar' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'system' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'memory' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'main_camera' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'front_camera' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'battery' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'harga' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'harga_min' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
              'null' => true,
            ],
            'harga_max' => [
                  'type' => 'VARCHAR',
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
