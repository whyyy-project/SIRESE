<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JenisProsessorSeeder extends Seeder
{
    public function run()
    {
        $today = date('Y-m-d H:i:s');

        $data = [
            ['prosessor' => 'APPLE', 'created_at' => $today, 'updated_at' => $today],
            ['prosessor' => 'SAMSUNG', 'created_at' => $today, 'updated_at' => $today],
            ['prosessor' => 'MEDIATEK', 'created_at' => $today, 'updated_at' => $today],
            ['prosessor' => 'QUALCOMM', 'created_at' => $today, 'updated_at' => $today],
            ['prosessor' => 'UNISOC', 'created_at' => $today, 'updated_at' => $today],
        ];

        // Using Query Builder
        $this->db->table('jenis_prosessor')->insertBatch($data);
    }
}
