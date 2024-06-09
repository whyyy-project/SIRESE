<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BobotModel;
use App\Models\NormalisasiModel;
use App\Models\SmartphoneModel;
use CodeIgniter\HTTP\ResponseInterface;

class BobotController extends BaseController
{
  public $smartphone;
  public $bobot;
  function __construct()
  {
    $this->smartphone = new SmartphoneModel();
    $this->bobot = new BobotModel;

    $this->body();
    $this->lcd();
    $this->system();
    $this->memory();
    $this->mainCamera();
    $this->frontCamera();
    $this->baterai();
    $this->harga();
    $this->normalisasiValidate();

  }
    public function index()
    {
        //
    }
      public function bobot()
  {
    $this->countNull('body');
    $this->countNull('lcd');
    $this->countNull('sistem');
    $this->countNull('memori');
    $this->countNull('front_camera');
    $this->countNull('main_camera');
    $this->countNull('battery');
    $this->countNull('harga');
    $data = [
      'title' => 'Konversi Nilai',
      'page' => 'bobot',
    ];
    return view('admin/bobot', $data);

  }

    // count null
  public function countNull($data){
    $totalNull = 0;
        $dataBody = $this->bobot->select('nilai')->like('kriteria', $data)->findAll();

        foreach ($dataBody as $row) {
            foreach ($row as $key => $value) {
                if (is_null($value) || $value === '0') {
                    $totalNull++;
                }
            }
        }

        if ($totalNull >= 1) {
            session()->setFlashdata($data, 'alert');
        }
  }

  public function body(){
    // konversi perhitungan dimensi
    $dimensi = $this->smartphone->getBy('build');
    foreach($dimensi as $dms){
      $pisah = explode(', ', strtolower($dms['build']));
      foreach($pisah as $bld){
        if ($this->bobot->where('konversi', $bld)->where('sub_kriteria', 'build')->countAllResults() < 1){
          $input = [
                'kriteria' => 'body',
                'sub_kriteria' => 'build',
                'konversi' => $bld,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                ];
            $this->bobot->insert($input);
        }
      }
    }
  }

  public function lcd(){
      $this->konversi('lcd', 'lcd_type');
  }
          
  public function system(){
      $this->konversi('sistem', 'os');
      $this->konversi('sistem', 'chipset');
      $this->konversi('sistem', 'cpu');
  }
          
  public function memory(){
      $this->konversi('memori', 'ram');
      $this->konversi('memori', 'rom');
  }



    public function mainCamera(){
      $mainVideo = $this->smartphone->select('main_video')->findAll();
      // Array baru untuk menyimpan hasil tanpa duplikat
      $uniqueVideos = [];
      // Loop melalui setiap data video
      foreach ($mainVideo as $videos) {
          // Akses kolom 'main_video' dari setiap elemen
          $videoList = explode(',', strtolower($videos['main_video']));
          
          // Loop melalui setiap video dalam daftar
          foreach ($videoList as $video) {
              // Hapus spasi di sekitar video
              $video = trim($video);
              // Jika video belum ada di array hasil, tambahkan
              if (!in_array($video, $uniqueVideos)) {
                  $uniqueVideos[] = $video;
                  if ($this->bobot->where('konversi', $video)->where('sub_kriteria', 'main_video')->countAllResults() < 1)
                  {
                    $input = [
                      'kriteria' => 'main_camera',
                      'sub_kriteria' => 'main_video',
                      'konversi' => $video,
                      'created_at' => date('Y-m-d H:i:s'),
                      'updated_at' => date('Y-m-d H:i:s'),
                    ];
                    $this->bobot->insert($input);
                  }
              }
          }
          // konversi umum
          $this->konversi('main_camera', 'main_camera');
          $this->konversi('main_camera', 'main_type');

      }
  }
    public function frontCamera(){
      $videoData = $this->smartphone->select('front_video')->findAll();

      $uniqueVideos = [];
      foreach ($videoData as $videos) {
          $videoList = explode(',', strtolower($videos['front_video']));
          foreach ($videoList as $video) {
              $video = trim($video);
              if (!in_array($video, $uniqueVideos)) {
                  $uniqueVideos[] = $video;
                  if ($this->bobot->where('konversi', $video)->where('sub_kriteria', 'front_video')->countAllResults() < 1)
                  {
                    $input = [
                      'kriteria' => 'front_camera',
                      'sub_kriteria' => 'front_video',
                      'konversi' => $video,
                      'created_at' => date('Y-m-d H:i:s'),
                      'updated_at' => date('Y-m-d H:i:s'),
                    ];
                    $this->bobot->insert($input);
                  }
              }
          }
          // konversi umum
          $this->konversi('front_camera', 'front_camera');
      }
  }


  public function baterai(){
    $this->konversi('battery', 'usb');

    $getKapasitas = $this->bobot->where('sub_kriteria', 'battery_capacity')->countAllResults();
      if($getKapasitas < 4){
      $this->bobot->where('sub_kriteria', 'battery_capacity')->delete();
            // Mendapatkan battery minimum
    $battery_capacityMinResult = $this->smartphone->select('battery_capacity')->orderBy('battery_capacity', 'asc')->first();
    $battery_capacityMin = $battery_capacityMinResult['battery_capacity'];

    // Mendapatkan battery_capacity maksimum
    $battery_capacityMaxResult = $this->smartphone->select('battery_capacity')->orderBy('battery_capacity', 'desc')->first();
    $battery_capacityMax = $battery_capacityMaxResult['battery_capacity'];

    // Menghitung rentang battery_capacity
    $rentang = $battery_capacityMax - $battery_capacityMin;

    // Menghitung selisih rentang yang dibagi menjadi 5 bagian
    $step = $rentang / 5;
    $battery_capacityPertama = $battery_capacityMin + $step;
    // Membuat array hitungbattery_capacity
    $hitungbattery_capacity = [];
    for ($i = 0; $i < 4; $i++) {
        $hitungbattery_capacity[] = $battery_capacityPertama + ($step * $i);
    }
    $this->bobot->where('sub_kriteria', 'battery_capacity')->delete();
    $tambah = 1;
    foreach ($hitungbattery_capacity as $battery_capacity) {
          $data = [
            'kriteria' =>'battery',
            'sub_kriteria' => 'battery_capacity',
            'konversi' => $battery_capacity,
            'nilai' => $tambah*20,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
          ];
      $tambah++;
      $this->bobot->insert($data);
        }
      }
    }
    
public function harga()
{
    // 
    // Mendapatkan harga minimum
    $hargaMinResult = $this->smartphone->select('harga')->orderBy('harga', 'asc')->first();
    $hargaMin = $hargaMinResult['harga'];

    // Mendapatkan harga maksimum
    $hargaMaxResult = $this->smartphone->select('harga')->orderBy('harga', 'desc')->first();
    $hargaMax = $hargaMaxResult['harga'];

    // Menghitung rentang harga
    $rentang = $hargaMax - $hargaMin;

    // Menghitung selisih rentang yang dibagi menjadi 5 bagian
    $step = $rentang / 10;
    $hargaPertama = $hargaMin + $step;
    // Membuat array hitungHarga
    $hitungHarga = [];
    for ($i = 0; $i < 9; $i++) {
        $hitungHarga[] = $hargaPertama + ($step * $i);
    }
    $this->bobot->where('sub_kriteria', 'harga')->delete();
    $tambah = 1;
    foreach ($hitungHarga as $harga) {
          $data = [
            'kriteria' =>'harga',
            'sub_kriteria' => 'harga',
            'konversi' => $harga,
            'nilai' => $tambah*10,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
          ];
      $tambah++;
      $this->bobot->insert($data);
        }
}


  // function untuk membuat konversi lebih mudah
 public function konversi($kriteria, $sub_kriteria) {
    // Mengambil data dari $this->smartphone berdasarkan $sub_kriteria
    $ambil = $this->smartphone->getBy($sub_kriteria);
    
    // Membuat array dari konversi yang diambil
    $konversi_ambil = [];
    foreach ($ambil as $data) {
        $konversi_ambil[] = strtolower($data[$sub_kriteria]);
    }
    
    // Mengambil semua data konversi dari $this->bobot berdasarkan $sub_kriteria
    $bobot_data = $this->bobot->select('konversi')->where('sub_kriteria', $sub_kriteria)->findAll();
    
    // Membuat array dari konversi yang ada di $this->bobot
    $konversi_bobot = [];
    foreach ($bobot_data as $bobot) {
        $konversi_bobot[] = $bobot['konversi'];
    }
    
    // Menambahkan data konversi yang tidak ada di $this->bobot
    foreach ($konversi_ambil as $konversi) {
        if (!in_array($konversi, $konversi_bobot)) {
            $input = [
                'kriteria' => $kriteria,
                'sub_kriteria' => $sub_kriteria,
                'konversi' => $konversi,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $this->bobot->insert($input);
        }
    }
    
    // Menghapus data konversi dari $this->bobot yang tidak ada di $ambil
    foreach ($konversi_bobot as $konversi) {
        if (!in_array($konversi, $konversi_ambil)) {
            $this->bobot->where('konversi', $konversi)->where('sub_kriteria', $sub_kriteria)->delete();
        }
    }
  }

  function normalisasiValidate(){
    $hp = $this->smartphone->select('id')->findAll();
    $norm = new NormalisasiModel();
    foreach($hp as $sm){
      $verify = $norm->where('id_smartphone', $sm['id'])->first();
      if(!$verify){
        $addNorm = [
                    'id_smartphone' => $sm['id'],
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
        $norm->insert($addNorm);
      }
    }


    $hasEmptyField = false;
    foreach ($norm->findAll() as $konversi) {
            foreach ($konversi as $field => $value) {
                if (empty($value)) {
                    $hasEmptyField = true;
                    break 2;
                }
            }
        }
        
        if ($hasEmptyField) {
            session()->setFlashdata('konversi', 'alert');
        }
  }
}
