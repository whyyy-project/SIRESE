<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama' => 'Wahyu Nur Cahyo',
                'username' => 'admin123',
                'password' => password_hash('admin123', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            
        ];

        // Load model
        $produkModel = model('App\Models\UserModel');

        // Insert data
        $produkModel->insertBatch($data);
    }
}
