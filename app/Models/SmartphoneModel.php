<?php

namespace App\Models;

use CodeIgniter\Model;

class SmartphoneModel extends Model
{
    protected $table            = 'smartphone';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['brand', 'merek','slug', 'gambar','dimensi','berat','build','lcd_type','lcd_size','lcd_resolusi','os','chipset','cpu','ram','rom','main_camera','main_type','main_video','front_camera','front_video','usb','battery_capacity','harga','created_at', 'updated_at'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    public function randomData(){
        $query = $this->db->table($this->table)
        ->orderBy('RAND()')
        ->limit(2)
        ->get();
        return $query->getResult();
    }
    public function allDataSmartphonePaging($perPage, $offset, $sortBy, $type, $max)
    {
        if($sortBy == 'filter'){
            return $this->limit($perPage, $offset)
                ->where('harga >=', $type)
                ->where('harga <=', $max)
                ->orderBy('harga', 'asc')
                ->get()
                ->getResultArray();
        }else if($sortBy != null){
            return $this->limit($perPage, $offset)
                ->orderBy($sortBy, $type)
                ->get()
                ->getResultArray();
        }else{
            return $this->limit($perPage, $offset)
                ->orderBy('merek', 'asc')
                ->get()
                ->getResultArray();
        }
    }

    function hasilCari($data)
    {
        $keywords = explode(' ', $data);

        $builder = $this->table($this->table);

        // Loop melalui kata kunci dan mencocokkannya dengan kolom data.
        foreach ($keywords as $word) {
            $builder->groupStart(); // Memulai grup OR.

            $builder->like('brand', $word);
            $builder->orLike('merek', $word);
            $builder->orlike('slug', $word);
            $builder->orlike('os', $word);
            $builder->orlike('ram', $word);
            $builder->orlike('rom', $word);
            $builder->groupEnd();
        }
        return $builder->get()->getResultArray();
    }

    public function findDataSmartphonePaging($perPage, $offset, $data)
    {
        $keywords = explode(' ', $data);

        $builder = $this->table($this->table);

        // Loop melalui kata kunci dan mencocokkannya dengan kolom data.
        foreach ($keywords as $word) {
            $builder->groupStart(); // Memulai grup OR.

            $builder->like('brand', $word);
            $builder->orLike('merek', $word);
            $builder->orlike('slug', $word);
            $builder->orlike('os', $word);
            $builder->orlike('ram', $word);
            $builder->orlike('rom', $word);
            $builder->groupEnd(); // Mengakhiri grup OR.
        }
        $builder->limit($perPage, $offset);
        return $builder->get()->getResultArray();
    }
    public function findBySlug($data){
        return $this->where('slug', $data)
            ->limit(1)
            ->get()
            ->getRow();
    }
  
    public function getBy($data){
    return $this->select($data)->distinct()->findAll();
    }
    public function mainVideo(){
    return $this->select('main_video')->findAll();
    }

}
