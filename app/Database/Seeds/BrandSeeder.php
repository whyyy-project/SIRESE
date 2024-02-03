<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BrandSeeder extends Seeder
{
    public function run()
    {
        $today = date('Y-m-d H:i:s');

        $data = [
            ['nama_brand' => 'Asus', 'created_at' => $today, 'updated_at' => $today],
            ['nama_brand' => 'Iphone', 'created_at' => $today, 'updated_at' => $today],
            ['nama_brand' => 'Samsung', 'created_at' => $today, 'updated_at' => $today],
            ['nama_brand' => 'Realme', 'created_at' => $today, 'updated_at' => $today],
            ['nama_brand' => 'Xiaomi', 'created_at' => $today, 'updated_at' => $today],
            ['nama_brand' => 'Vivo', 'created_at' => $today, 'updated_at' => $today],
            ['nama_brand' => 'Oppo', 'created_at' => $today, 'updated_at' => $today],
            ['nama_brand' => 'Infinix', 'created_at' => $today, 'updated_at' => $today],
            ['nama_brand' => 'Poco', 'created_at' => $today, 'updated_at' => $today],
            ['nama_brand' => 'Itel', 'created_at' => $today, 'updated_at' => $today],
        ];

        // Using Query Builder
        $this->db->table('brands')->insertBatch($data);
    }
}
