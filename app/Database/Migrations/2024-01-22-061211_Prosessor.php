<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Prosessor extends Migration
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
            'jenis_id'=>[
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'nama_prosessor' => [
                'type' => 'varchar',
                'constraint' => 50,
            ],
            'rating'=>[
                'type' => 'int',
                'constraint' => 5,
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
        $this->forge->addForeignKey('jenis_id', 'jenis_prosessor', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('prosessor');
    }

    public function down()
    {
        $this->forge->dropTable('prosessor');
    }
}
