<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProsessorSeeder extends Seeder
{
    public function run()
    {
        $today = date('Y-m-d H:i:s');

        $data = [
            ['jenis_id' => 3, 'nama_prosessor' => 'Samsung Exynos 2200', 'rating' => 100, 'created_at' => $today, 'updated_at' => $today],
            ['jenis_id' => 3, 'nama_prosessor' => 'Samsung Exynos 2400', 'rating' => 99, 'created_at' => $today, 'updated_at' => $today],
            ['jenis_id' => 4, 'nama_prosessor' => 'Qualcomm Snapdragon 8 Gen 3', 'rating' => 96, 'created_at' => $today, 'updated_at' => $today],
        ];

        // Using Query Builder
        $this->db->table('prosessor')->insertBatch($data);
    }
}
