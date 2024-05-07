<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TokoMigration extends Migration
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
            'nama_toko' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'desa' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'kecamatan' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'kota' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'provinsi' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'alamat_lengkap' => [
                'type' => 'TEXT',
            ],
            'fb' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'ig' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'tiktok' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'telepon' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'foto' => [
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
        $this->forge->createTable('toko');
    }

    public function down()
    {
        $this->forge->dropTable('toko');
    }
}
