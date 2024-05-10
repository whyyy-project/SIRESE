<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class NormalisasiMigration extends Migration
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
            'id_smartphone' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'dimensi' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'berat' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'build' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'lcd_type' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'lcd_size' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'lcd_resolusi' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'os' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'chipset' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'cpu' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'ram' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'rom' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'main_camera' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'main_type' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'main_video' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'front_camera' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'front_video' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'usb' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'battery_capacity' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'harga' => [
                'type' => 'INT',
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
        $this->forge->addForeignKey('id_smartphone','smartphone','id','NO ACTION','NO ACTION');
        $this->forge->createTable('normalisasi');
    }

    public function down()
    {
        $this->forge->dropTable('normalisasi');
    }
}
