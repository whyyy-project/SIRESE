<?php

namespace App\Models;

use CodeIgniter\Model;

class KuantitatifModel extends Model
{
    protected $table            = 'kuantitatif';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_smartphone','dimensi','berat','build','lcd_type','lcd_size','lcd_resolusi','os','chipset','cpu','ram','rom','main_camera','main_type','main_video','front_camera','front_video','usb','battery_capacity','harga','created_at', 'updated_at'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
        public function getData(){
      return $this->select('smartphone.id, smartphone.brand, smartphone.merek, smartphone.ram AS mRam, smartphone.rom AS mRom, kuantitatif.dimensi, kuantitatif.berat, kuantitatif.build, kuantitatif.lcd_type, kuantitatif.lcd_size, kuantitatif.lcd_resolusi, kuantitatif.os, kuantitatif.chipset, kuantitatif.cpu, kuantitatif.ram, kuantitatif.rom, kuantitatif.main_camera, kuantitatif.main_type, kuantitatif.main_video, kuantitatif.front_camera, kuantitatif.front_video, kuantitatif.usb, kuantitatif.battery_capacity, kuantitatif.harga')
                    ->join('smartphone', 'smartphone.id = kuantitatif.id_smartphone')
                    ->findAll();
    }
}
