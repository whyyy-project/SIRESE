<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BobotModel;
use App\Models\SmartphoneModel;
use CodeIgniter\HTTP\ResponseInterface;

class AdminPagesController extends BaseController
{
    public $smartphone;
    public $bobot;

    public function __construct() {
        // Inisialisasi model
        $this->smartphone = new SmartphoneModel();
        $this->bobot = new BobotModel();

        // Panggil fungsi yang ingin dieksekusi sebelum fungsi lainnya
        $this->alertBobot();
    }

    public function alertBobot() {
        $totalNull = 0;
        $data = $this->bobot->select('nilai')->findAll();

        foreach ($data as $row) {
            foreach ($row as $key => $value) {
                if (is_null($value) || $value === '') {
                    $totalNull++;
                }
            }
        }

        if ($totalNull >= 1) {
            session()->setFlashdata('bobot', 'alert');
        }
    }
  public function index()
  {
    $smartphone = $this->smartphone->findAll();
    $data = [
      'title' => 'Admin Page',
      'page' => 'dashboard',
      'smartphone' => $smartphone,
    ];
    return view('admin/dashboard', $data);

  }
  public function master()
  {
    $smartphone = $this->smartphone->orderBy('merek', 'asc')->findAll();
    $data = [
      'title' => 'Data Smartphone',
      'page' => 'master',
      'smartphone' => $smartphone,
    ];
    return view('admin/master-data', $data);

  }
  public function tambahSmartphone()
  {
    $brand = $this->smartphone->getBy('brand');
    $merek = $this->smartphone->getBy('merek');
    $dimensi = $this->smartphone->getBy('dimensi');
    $berat = $this->smartphone->getBy('berat');
    $build = $this->smartphone->getBy('build');
    $lcd_type = $this->smartphone->getBy('lcd_type');
    $lcd_size = $this->smartphone->getBy('lcd_size');
    $lcd_resolusi = $this->smartphone->getBy('lcd_resolusi');
    $os = $this->smartphone->getBy('os');
    $chipset = $this->smartphone->getBy('chipset');
    $cpu = $this->smartphone->getBy('cpu');
    $ram = $this->smartphone->getBy('ram');
    $rom = $this->smartphone->getBy('rom');
    $main_camera = $this->smartphone->getBy('main_camera');
    $main_type = $this->smartphone->getBy('main_type');
    $main_video = $this->smartphone->getBy('main_video');
    $front_camera = $this->smartphone->getBy('front_camera');
    $front_video = $this->smartphone->getBy('front_video');
    $usb = $this->smartphone->getBy('usb');
    $battery_capacity = $this->smartphone->getBy('battery_capacity');
    $harga = $this->smartphone->getBy('harga');
    $data = [
      'title' => 'Tambah Smartphone',
      'page' => 'master',
      'brand' => $brand,
      'merek' => $merek,
      'dimensi' => $dimensi,
      'berat' => $berat,
      'build' => $build,
      'lcd_type' => $lcd_type,
      'lcd_size' => $lcd_size,
      'lcd_resolusi' => $lcd_resolusi,
      'os' => $os,
      'chipset' => $chipset,
      'cpu' => $cpu,
      'ram' => $ram,
      'rom' => $rom,
      'main_camera' => $main_camera,
      'main_type' => $main_type,
      'main_video' => $main_video,
      'front_camera' => $front_camera,
      'front_video' => $front_video,
      'usb' => $usb,
      'battery_capacity' => $battery_capacity,
      'harga' => $harga,
    ];
    return view('admin/tambah-smartphone', $data);

  }

  public function toko()
  {
    $data = [
      'title' => 'Welcome Admin',
      'page' => 'toko',
    ];
    return view('admin/dashboard', $data);

  }
  public function profil()
  {
    $data = [
      'title' => 'Welcome Admin',
      'page' => 'profil',
    ];
    // return view('admin/dashboard', $data);
    return "aku";

  }



}
