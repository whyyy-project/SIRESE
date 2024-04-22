<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SmartphoneMigration extends Migration
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
            'brand' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'merek' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
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
                'type' => 'ENUM("2","3","4","6","8","12","18","24")',
            ],
            'rom' => [
                'type' => 'ENUM("16","32","64","128","256","512","1000")',
            ],
            'main_camera' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'main_type' => [
                'type' => 'ENUM("SINGGLE","DUAL","TRIPLE","QUAD")',
            ],
            'video_main' => [
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
        $this->forge->createTable('smartphone');
    }

    public function down()
    {
        $this->forge->dropTable('produk');
    }
}
