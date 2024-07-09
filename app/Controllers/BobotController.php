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
      if(!$pisah){
        return redirect()->to(base_url('master-data/update/'.$b['slug']))->with('eror', 'Penulisan Build tidak sesuai! (contoh : ALUMUNIUM FRAME, GLASS BACK)');
      }
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
      $dimensi = $this->smartphone->select('slug, dimensi')->findAll();
      // Array baru untuk menyimpan hasil perkalian
      $dataKonversi = [];
      // Melakukan iterasi pada setiap elemen di array dimensi
      foreach ($dimensi as $item) {
          // Memisahkan nilai dengan delimiter " x "
          $pisah = explode(" x ", strtolower($item['dimensi']));
          if(!$pisah){
          return redirect()->to(base_url('master-data/update/'.$item['slug']))->with('eror', 'Penulisan Dimensi tidak sesuai! (contoh : 168 x 78 x 8.1)');
          }
          list($panjang, $lebar, $tinggi) = $pisah;
          // Menghitung perkalian panjang dan lebar
          $perkalian = (float)$panjang * (float)$lebar * (float)$tinggi;
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
      $rentang = (float)$beratMax - (float)$beratMin;

      // Menghitung selisih rentang yang dibagi menjadi 5 bagian
      $step = $rentang / 5;
      $beratPertama = $beratMin + $step;
      // Membuat array hitungberat
      $hitungberat = [];
      for ($i = 0; $i < 4; $i++) {
        $hitungberat[] = (float)$beratPertama + ($step * $i);
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
      $lcd_resolusi = $this->smartphone->select('slug, lcd_resolusi')->findAll();
      // Array baru untuk menyimpan hasil perkalian
      $dataKonversi = [];
      // Melakukan iterasi pada setiap elemen di array lcd_resolusi
      foreach ($lcd_resolusi as $item) {
        $pisah = explode(" x ", strtolower($item['lcd_resolusi']));
        if(!$pisah){
          return redirect()->to(base_url('master-data/update/'.$item['slug']))->with('eror', 'Penulisan Resolusi LCD tidak sesuai! (contoh : 1080 x 2460)');
        }
        list($panjang, $lebar) = $pisah;
          // Menghitung perkalian panjang dan lebar
          $perkalian = (float)$panjang * (float)$lebar;
        // echo $panjang."x".$lebar ."x".$lebar. " = ". $perkalian." hasil<br>";
          // Menambahkan hasil perkalian ke array baru
          $dataKonversi[] = $perkalian;
      }
    // Mendapatkan lcd_resolusi minimum
    $lcd_resolusiMin = min($dataKonversi);

    // Mendapatkan lcd_resolusi maksimum
    $lcd_resolusiMax = max($dataKonversi);

    // Menghitung rentang lcd_resolusi
    $rentang = (float)$lcd_resolusiMax - (float)$lcd_resolusiMin;

    // Menghitung selisih rentang yang dibagi menjadi 5 bagian
    $step = $rentang / 5;
    $lcd_resolusiPertama = (float)$lcd_resolusiMin + $step;
    // Membuat array hitunglcd_resolusi
    $hitunglcd_resolusi = [];
    for ($i = 0; $i < 4; $i++) {
        $hitunglcd_resolusi[] = (float)$lcd_resolusiPertama + ($step * $i);
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
          'konversi' => round($lcd_size, 1),
          'nilai' => $tambah / 10,
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

      // Menghitung selisih rentang yang dibagi menjadi 100 bagian
      $step = $rentang / 100;
      $hargaPertama = $hargaMin + $step;
      // Membuat array hitungHarga
      $hitungHarga = [];
      for ($i = 0; $i < 99; $i++) {
        $hitungHarga[] = $hargaPertama + ($step * $i);
      }
      $this->bobot->where('sub_kriteria', 'harga')->delete();
      $tambah = 0;
      foreach ($hitungHarga as $harga) {
        $data = [
          'kriteria' => 'harga',
          'sub_kriteria' => 'harga',
          'konversi' => $harga,
          'nilai' => $tambah + 1,
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
        ];
        $tambah++;
        $this->bobot->insert($data);
      }
    }
    
  // reset bobot
    // $this->bobot->where('sub_kriteria', 'harga')->delete();
}


  // function untuk membuat konversi lebih mudah
 public function konversi($kriteria, $sub_kriteria) {
    $ambil = $this->smartphone->getBy($sub_kriteria);
    
    $konversi_ambil = [];
    foreach ($ambil as $data) {
        $konversi_ambil[] = strtolower($data[$sub_kriteria]);
    }
    
    $bobot_data = $this->bobot->select('konversi')->where('sub_kriteria', $sub_kriteria)->findAll();
    
    $konversi_bobot = [];
    foreach ($bobot_data as $bobot) {
        $konversi_bobot[] = $bobot['konversi'];
    }
    
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
    
    foreach ($konversi_bobot as $konversi) {
        if (!in_array($konversi, $konversi_ambil)) {
            $this->bobot->where('konversi', $konversi)->where('sub_kriteria', $sub_kriteria)->delete();
        }
    }
  }
  function video($kriteria, $sub){
    
      $videoData = $this->smartphone->select('slug,'.$sub)->findAll();

      foreach ($videoData as $videos) {
        $pisah = explode(',', strtolower($videos[$sub]));
        if(!$pisah){
          return redirect()->to(base_url('master-data/update/'.$videos['slug']))->with('eror', 'Penulisan '.$sub.' tidak sesuai! (contoh : 4k 60/30fps, 2k 120/90/60fps)');
        }
        $videoList = $pisah;
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
}
