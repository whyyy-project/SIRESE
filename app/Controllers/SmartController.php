<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BobotUserModel;
use App\Models\KonversiModel;
use App\Models\KuantitatifModel;
use App\Models\SmartphoneModel;
use CodeIgniter\HTTP\ResponseInterface;

class SmartController extends BaseController
{
  public $kuanti;
  public $smartphone;
  public $norm;
  public $nilai;
  function __construct()
    {
    $this->kuanti = new KuantitatifModel();
    $this->smartphone = new SmartphoneModel();
    $this->norm = new KonversiModel();
    $this->nilai = new BobotUserModel();
  }
    public function index()
    {
      $body = $this->request->getPost('body');
      $display = $this->request->getPost('display');
      $system = $this->request->getPost('system');
      $memory = $this->request->getPost('memory');
      $mainCamera = $this->request->getPost('mainCamera');
      $frontCamera = $this->request->getPost('frontCamera');
      $battery = $this->request->getPost('battery');
      $price = $this->request->getPost('price');
    }
}
