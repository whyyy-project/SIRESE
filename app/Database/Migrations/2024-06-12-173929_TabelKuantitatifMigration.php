<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TabelKuantitatifMigration extends Migration
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
                'type' => 'FLOAT',
                'null' => true,
            ],
            'berat' => [
                'type' => 'FLOAT',
                'null' => true,
            ],
            'build' => [
              'type' => 'FLOAT',
                'null' => true,
            ],
            'lcd_type' => [
                'type' => 'FLOAT',
                'null' => true,
            ],
            'lcd_size' => [
                'type' => 'FLOAT',
                'null' => true,
            ],
            'lcd_resolusi' => [
                'type' => 'FLOAT',
                'null' => true,
            ],
            'os' => [
                'type' => 'FLOAT',
                'null' => true,
            ],
            'chipset' => [
                'type' => 'FLOAT',
                'null' => true,
            ],
            'cpu' => [
                'type' => 'FLOAT',
                'null' => true,
            ],
            'ram' => [
                'type' => 'FLOAT',
                'null' => true,
            ],
            'rom' => [
                'type' => 'FLOAT',
                'null' => true,
            ],
            'main_camera' => [
                'type' => 'FLOAT',
                'null' => true,
            ],
            'main_type' => [
                'type' => 'FLOAT',
                'null' => true,
            ],
            'main_video' => [
                'type' => 'FLOAT',
                'null' => true,
            ],
            'front_camera' => [
                'type' => 'FLOAT',
                'null' => true,
            ],
            'front_video' => [
                'type' => 'FLOAT',
                'null' => true,
            ],
            'usb' => [
                'type' => 'FLOAT',
                'null' => true,
            ],
            'battery_capacity' => [
                'type' => 'FLOAT',
                'null' => true,
            ],
            'harga' => [
                'type' => 'FLOAT',
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
        $this->forge->addForeignKey('id_smartphone','smartphone','id','NO ACTION','NO ACTION');
        $this->forge->createTable('kuantitatif');
    }

    public function down()
    {
        $this->forge->dropTable('kuantitatif');
    }
}
