<?php

namespace App\Models;

use CodeIgniter\Model;

class TokoModel extends Model
{
    protected $table            = 'toko';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_toko','desa','kecamatan','kota','provinsi','alamat_lengkap','fb','ig','tiktok','telepon','foto','created_at','updated_at'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function allDataTokoPaging($perPage, $offset)
    {
        return $this->limit($perPage, $offset)
            ->get()
            ->getResultArray();
    }
}
