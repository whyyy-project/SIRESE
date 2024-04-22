<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DataSmartphone extends Seeder
{
    public function run()
    {
        $data = [
            [
                'brand' => 'ASUS',
                'merek' => 'Merek X',
                'build' => 'Build 1',
                'ram' => '4',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'brand' => 'Brand B',
                'merek' => 'Merek Y',
                'build' => 'Build 2',
                'ram' => '8',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Load model
        $produkModel = model('App\Models\ProdukModel');

        // Insert data
        $produkModel->insertBatch($data);
    }
}
