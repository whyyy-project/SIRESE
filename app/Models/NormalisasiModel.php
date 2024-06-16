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
    public function getWithRange($minPrice, $maxPrice)
    {
        $builder = $this->db->table('normalisasi');
        $builder->select('normalisasi.*,
        smartphone.merek AS sMerek,
        smartphone.brand AS sBrand,
        smartphone.slug AS sSlug,
        smartphone.ram as sRam,
        smartphone.rom AS sRom,
        smartphone.harga AS sHarga,
        smartphone.gambar AS sGambar,
        kuantitatif.dimensi AS kdimensi,
        kuantitatif.berat AS kberat,
        kuantitatif.build AS kbuild,
        kuantitatif.lcd_type AS klcd_type,
        kuantitatif.lcd_size AS klcd_size,
        kuantitatif.lcd_resolusi AS klcd_resolusi,
        kuantitatif.os AS kos,
        kuantitatif.chipset AS kchipset,
        kuantitatif.cpu AS kcpu,
        kuantitatif.ram AS kram,
        kuantitatif.rom AS krom,
        kuantitatif.main_camera AS kmain_camera,
        kuantitatif.main_type AS kmain_type, 
        kuantitatif.main_video AS kmain_video,
        kuantitatif.front_camera AS kfront_camera,
        kuantitatif.front_video AS kfront_video,
        kuantitatif.usb AS kusb,
        kuantitatif.battery_capacity AS kbattery_capacity,
        kuantitatif.harga AS kharga');
        $builder->join('smartphone', 'smartphone.id = normalisasi.id_smartphone', 'left');
        $builder->join('kuantitatif', 'smartphone.id = kuantitatif.id_smartphone', 'left');
        $builder->where('smartphone.harga >=', $minPrice);
        $builder->where('smartphone.harga <=', $maxPrice);
        $query = $builder->get();
        return $query->getResultArray();
    }
}


