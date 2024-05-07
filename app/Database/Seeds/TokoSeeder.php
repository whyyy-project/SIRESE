<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TokoSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_toko' => 'MAJU MAPAN CELL',
                'desa' => 'Sugihwaras',
                'kecamatan' => 'Sugihwaras',
                'kota' => 'Bojonegoro',
                'provinsi' => 'Jawa Timur',
                'alamat_lengkap' => 'Jl. Raya Sugihwaras No. 90, Slawung, Sugihwaras, Kec. Sugihwaras, Kab. Bojonegoro, Jawa Timur 62183',
                'fb' => 'https://www.facebook.com/groups/1659184890891936/?locale2=id_ID&_rdr',
                'telepon' => '6285777555758',
                'foto' => 'majumapancell.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            
        ];

        // Load model
        $produkModel = model('App\Models\TokoModel');

        // Insert data
        $produkModel->insertBatch($data);
    }
}
