<?php

namespace App\Models;

use CodeIgniter\Model;

class BobotUserModel extends Model
{
  protected $table = 'bobotuser';
  protected $primaryKey = 'id';
  protected $useAutoIncrement = true;
  protected $returnType = 'array';
  protected $useSoftDeletes = false;
  protected $protectFields = true;
  protected $allowedFields = [
    'body', 'layar', 'system', 'memory', 'main_camera', 'front_camera', 'battery', 'harga', 'harga_min', 'harga_max', 'created_at', 'updated_at'
  ];

  // Dates
  protected $useTimestamps = true;
  protected $dateFormat = 'datetime';
  protected $createdField = 'created_at';
  protected $updatedField = 'updated_at';
}
