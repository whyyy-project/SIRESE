<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BrandRating extends Migration
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
            'rating' => [
                'type' => 'int',
                'constraint' => 5,
            ],
            'usia' => [
                'type' => 'INT',
                'constraint' => 3,
                'unsigned' => true,
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
        $this->forge->createTable('brand_ratings');
    }

    public function down()
    {
        $this->forge->dropTable('brand_ratings');
    }
}
