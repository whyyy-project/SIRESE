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
                'merek' => 'Zenfone 10',
                'slug' => 'asus_zenfone-10_8_128',
                'gambar' => 'asus_zenfone_10.png',
                'dimensi' => '146.5 x 68.1 x 9.4',
                'berat' => '172',
                'build' => 'aluminium frame, plastic back',
                'lcd_type' => 'SUPER AMOLED',
                'lcd_size' => '84.6',
                'lcd_resolusi' => '1080 x 2400',
                'os' => 'Android 13',
                'chipset' => 'Snapdragon 8 Gen 2',
                'cpu' => 'Octa-core',
                'ram' => '8',
                'rom' => '128',
                'main_camera' => '50',
                'main_type' => 'DUAL',
                'main_video' => '8K 24FPS, 4K 30/60FPS',
                'front_camera' => '32',
                'front_video' => '1080p 30FPS',
                'usb' => 'USB Type-C 2.0',
                'battery_capacity' => '4300',
                'harga' => '8999000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [ 
                'brand' => 'ASUS',
                'merek' => 'Zenfone 10',
                'slug' => 'asus_zenfone-10_16_512',
                'gambar' => 'asus_zenfone_10.png',
                'dimensi' => '146.5 x 68.1 x 9.4',
                'berat' => '172',
                'build' => 'aluminium frame, plastic back',
                'lcd_type' => 'SUPER AMOLED',
                'lcd_size' => '84.6',
                'lcd_resolusi' => '1080 x 2400',
                'os' => 'Android 13',
                'chipset' => 'Snapdragon 8 Gen 2',
                'cpu' => 'Octa-core',
                'ram' => '16',
                'rom' => '512',
                'main_camera' => '50',
                'main_type' => 'DUAL',
                'main_video' => '8K 24FPS, 4K 30/60FPS',
                'front_camera' => '32',
                'front_video' => '1080p 30FPS',
                'usb' => 'USB Type-C 2.0',
                'battery_capacity' => '4300',
                'harga' => '11999000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            
        ];

        // Load model
        $produkModel = model('App\Models\SmartphoneModel');

        // Insert data
        $produkModel->insertBatch($data);
    }
}
