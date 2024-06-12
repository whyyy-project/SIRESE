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
    // konversi perhitungan build
    $build = $this->smartphone->getBy('build');
    foreach($build as $b){
      $pisah = explode(', ', strtolower($b['build']));
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
    // dimensi
    $getDimensi = $this->bobot->where('sub_kriteria', 'dimensi')->countAllResults();
    if($getDimensi<4){
      $this->bobot->where('sub_kriteria', 'dimensi')->delete();
      $dimensi = $this->smartphone->select('dimensi')->findAll();
      // Array baru untuk menyimpan hasil perkalian
      $dataKonversi = [];
      // Melakukan iterasi pada setiap elemen di array dimensi
      foreach ($dimensi as $item) {
          // Memisahkan nilai dengan delimiter " x "
          list($panjang, $lebar, $tinggi) = explode(" x ", strtolower($item['dimensi']));
          // Menghitung perkalian panjang dan lebar
          $perkalian = $panjang * $lebar * $tinggi;
        // echo $panjang."x".$lebar ."x".$lebar. " = ". $perkalian." hasil<br>";
          // Menambahkan hasil perkalian ke array baru
          $dataKonversi[] = $perkalian;
      }
    // Mendapatkan dimensi minimum
    $dimensiMin = min($dataKonversi);

    // Mendapatkan dimensi maksimum
    $dimensiMax = max($dataKonversi);

    // Menghitung rentang dimensi
    $rentang = $dimensiMax - $dimensiMin;

    // Menghitung selisih rentang yang dibagi menjadi 5 bagian
    $step = $rentang / 5;
    $dimensiPertama = $dimensiMin + $step;
    // Membuat array hitungdimensi
    $hitungdimensi = [];
    for ($i = 0; $i < 4; $i++) {
        $hitungdimensi[] = $dimensiPertama + ($step * $i);
    }
    $this->bobot->where('sub_kriteria', 'dimensi')->delete();
    $tambah = 1;
    foreach ($hitungdimensi as $dimensi) {
          $data = [
            'kriteria' =>'body',
            'sub_kriteria' => 'dimensi',
            'konversi' => $dimensi,
            'nilai' => $tambah*20,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
          ];
      $tambah++;
      $this->bobot->insert($data);
        }
      }
      
      // berat
    if ($this->bobot->where('sub_kriteria', 'berat')->countAllResults() < 4) {
      $this->bobot->where('sub_kriteria', 'berat')->delete();
      $beratMinResult = $this->smartphone->select('berat')->orderBy('berat', 'asc')->first();
      $beratMin = $beratMinResult['berat'];

      // Mendapatkan berat maksimum
      $beratMaxResult = $this->smartphone->select('berat')->orderBy('berat', 'desc')->first();
      $beratMax = $beratMaxResult['berat'];

      // Menghitung rentang berat
      $rentang = $beratMax - $beratMin;

      // Menghitung selisih rentang yang dibagi menjadi 5 bagian
      $step = $rentang / 5;
      $beratPertama = $beratMin + $step;
      // Membuat array hitungberat
      $hitungberat = [];
      for ($i = 0; $i < 4; $i++) {
        $hitungberat[] = $beratPertama + ($step * $i);
      }
      $tambah = 1;
      foreach ($hitungberat as $berat) {
        $data = [
          'kriteria' => 'body',
          'sub_kriteria' => 'berat',
          'konversi' => $berat,
          'nilai' => $tambah * 20,
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
        ];
        $tambah++;
        $this->bobot->insert($data);
      }
    }
  }

  public function lcd(){
      $this->konversi('lcd', 'lcd_type');

       // lcd_resolusi
    $getUkuran = $this->bobot->where('sub_kriteria', 'lcd_resolusi')->countAllResults();
    if($getUkuran<4){
      $this->bobot->where('sub_kriteria', 'lcd_resolusi')->delete();
      $lcd_resolusi = $this->smartphone->select('lcd_resolusi')->findAll();
      // Array baru untuk menyimpan hasil perkalian
      $dataKonversi = [];
      // Melakukan iterasi pada setiap elemen di array lcd_resolusi
      foreach ($lcd_resolusi as $item) {
          // Memisahkan nilai dengan delimiter " x "
          list($panjang, $lebar) = explode(" x ", strtolower($item['lcd_resolusi']));
          // Menghitung perkalian panjang dan lebar
          $perkalian = $panjang * $lebar;
        // echo $panjang."x".$lebar ."x".$lebar. " = ". $perkalian." hasil<br>";
          // Menambahkan hasil perkalian ke array baru
          $dataKonversi[] = $perkalian;
      }
    // Mendapatkan lcd_resolusi minimum
    $lcd_resolusiMin = min($dataKonversi);

    // Mendapatkan lcd_resolusi maksimum
    $lcd_resolusiMax = max($dataKonversi);

    // Menghitung rentang lcd_resolusi
    $rentang = $lcd_resolusiMax - $lcd_resolusiMin;

    // Menghitung selisih rentang yang dibagi menjadi 5 bagian
    $step = $rentang / 5;
    $lcd_resolusiPertama = $lcd_resolusiMin + $step;
    // Membuat array hitunglcd_resolusi
    $hitunglcd_resolusi = [];
    for ($i = 0; $i < 4; $i++) {
        $hitunglcd_resolusi[] = $lcd_resolusiPertama + ($step * $i);
    }
    $this->bobot->where('sub_kriteria', 'lcd_resolusi')->delete();
    $tambah = 1;
    foreach ($hitunglcd_resolusi as $lcd_resolusi) {
          $data = [
            'kriteria' =>'lcd',
            'sub_kriteria' => 'lcd_resolusi',
            'konversi' => $lcd_resolusi,
            'nilai' => $tambah*20,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
          ];
      $tambah++;
      $this->bobot->insert($data);
        }
      }

      // ukuran lcd
    if ($this->bobot->where('sub_kriteria', 'lcd_size')->countAllResults() < 1) {
      // Mendapatkan lcd_size minimum
      $lcd_sizeMinResult = $this->smartphone->select('lcd_size')->orderBy('lcd_size', 'asc')->first();
      $lcd_sizeMin = $lcd_sizeMinResult['lcd_size'];

      // Mendapatkan lcd_size maksimum
      $lcd_sizeMaxResult = $this->smartphone->select('lcd_size')->orderBy('lcd_size', 'desc')->first();
      $lcd_sizeMax = $lcd_sizeMaxResult['lcd_size'];

      // Menghitung rentang lcd_size
      $rentang = $lcd_sizeMax - $lcd_sizeMin;

      // Menghitung selisih rentang yang dibagi menjadi 5 bagian
      $step = $rentang / 10;
      $lcd_sizePertama = $lcd_sizeMin + $step;
      // Membuat array hitunglcd_size
      $hitunglcd_size = [];
      for ($i = 0; $i < 9; $i++) {
        $hitunglcd_size[] = $lcd_sizePertama + ($step * $i);
      }
      $this->bobot->where('sub_kriteria', 'lcd_size')->delete();
      $tambah = 1;
      foreach ($hitunglcd_size as $lcd_size) {
        $data = [
          'kriteria' => 'lcd',
          'sub_kriteria' => 'lcd_size',
          'konversi' => $lcd_size,
          'nilai' => $tambah * 10,
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
        ];
        $tambah++;
        $this->bobot->insert($data);
      }
    }
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
      $this->konversi('main_camera', 'main_camera');
      $this->konversi('main_camera', 'main_type');
      $this->video('main_camera', 'main_video');

  }
    public function frontCamera(){
      $this->konversi('front_camera', 'front_camera');
      $this->konversi('front_camera', 'front_camera');
      $this->video('front_camera', 'front_video');


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
    if ($this->bobot->where('sub_kriteria', 'harga')->countAllResults() < 1) {
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
          'kriteria' => 'harga',
          'sub_kriteria' => 'harga',
          'konversi' => $harga,
          'nilai' => $tambah * 10,
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
        ];
        $tambah++;
        $this->bobot->insert($data);
      }
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
  function video($kriteria, $sub){
    
      $videoData = $this->smartphone->select($sub)->findAll();

      foreach ($videoData as $videos) {
        $videoList = explode(',', strtolower($videos[$sub]));
      for ($i = 0; $i < count($videoList) ; $i++){
        if($this->bobot->where('sub_kriteria', $sub)->where('konversi', $videoList[$i])->countAllResults() == 0){
          $input = [
                      'kriteria' => $kriteria,
                      'sub_kriteria' => $sub,
                      'konversi' => $videoList[$i],
                      'created_at' => date('Y-m-d H:i:s'),
                      'updated_at' => date('Y-m-d H:i:s'),
                    ];
                    $this->bobot->insert($input);
        }
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
