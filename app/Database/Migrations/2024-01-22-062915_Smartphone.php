<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Smartphone extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'brand_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'merk' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'batrai' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'ram' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'internal' =>[
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'prosessor_id' =>[
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'prosessor' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'kamera_depan' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'kamera_belakang' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'harga' => [
                'type' => 'int',
                'constraint' => 50,
            ],
            'rilis' => [
                'type' => 'varchar',
                'constraint' => 50
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

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('brand_id', 'brands', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('prosessor_id', 'prosessor', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('smartphone');
    }

    public function down()
    {
        $this->forge->dropTable('smartphone');
    }
}
