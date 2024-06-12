<?php

namespace App\Models;

use CodeIgniter\Model;

class NormalisasiModel extends Model
{
    protected $table            = 'normalisasi';
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
    // protected $deletedField  = 'deleted_at';

  public function validateData()
      {
      return $this->select('smartphone.id, normalisasi.dimensi, normalisasi.berat, normalisasi.build, normalisasi.lcd_type, normalisasi.lcd_size, normalisasi.lcd_resolusi, normalisasi.os, normalisasi.chipset, normalisasi.cpu, normalisasi.ram, normalisasi.rom, normalisasi.main_camera, normalisasi.main_type, normalisasi.main_video, normalisasi.front_camera, normalisasi.front_video, normalisasi.usb, normalisasi.battery_capacity, normalisasi.harga')
          ->join('smartphone', 'smartphone.id = normalisasi.id')
          ->findAll();
  }
        public function getJoin($id)
    {
        return $this->select('smartphone.id, normalisasi.dimensi, normalisasi.berat, normalisasi.build, normalisasi.lcd_type, normalisasi.lcd_size, normalisasi.lcd_resolusi, normalisasi.os, normalisasi.chipset, normalisasi.cpu, normalisasi.ram, normalisasi.rom, normalisasi.main_camera, normalisasi.main_type, normalisasi.main_video, normalisasi.front_camera, normalisasi.front_video, normalisasi.usb, normalisasi.battery_capacity, normalisasi.harga')
                    ->where('smartphone.id', $id)
                    ->join('smartphone', 'smartphone.id = normalisasi.id_smartphone')
                    ->findAll();
    }

    public function getData(){
      return $this->select('smartphone.id, smartphone.brand, smartphone.merek, smartphone.ram AS mRam, smartphone.rom AS mRom, normalisasi.dimensi, normalisasi.berat, normalisasi.build, normalisasi.lcd_type, normalisasi.lcd_size, normalisasi.lcd_resolusi, normalisasi.os, normalisasi.chipset, normalisasi.cpu, normalisasi.ram, normalisasi.rom, normalisasi.main_camera, normalisasi.main_type, normalisasi.main_video, normalisasi.front_camera, normalisasi.front_video, normalisasi.usb, normalisasi.battery_capacity, normalisasi.harga')
                    ->join('smartphone', 'smartphone.id = normalisasi.id_smartphone')
                    ->findAll();
    }
    public function updateData($id, $data){
      $this->where('id_smartphone', $id)->update($data);
    }
}
