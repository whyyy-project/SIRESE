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
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    public function allDataSmartphonePaging($perPage, $offset)
    {
        return $this->limit($perPage, $offset)
            ->get()
            ->getResultArray();
    }
}
