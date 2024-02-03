<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JenisProsessor extends Migration
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
            'prosessor' => [
                'type' => 'varchar',
                'constraint' => 50,
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
        $this->forge->createTable('jenis_prosessor');
    }

    public function down()
    {
        $this->forge->dropTable('jenis_prosessor');
    }
}
