<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KonversiMigration extends Migration
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
            'kriteria' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'sub_kriteria' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'konversi' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'nilai' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
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
        $this->forge->createTable('konversi');
    }

    public function down()
    {
        $this->forge->dropTable('konversi');
    }
}
