<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BobotModel;
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
                if (is_null($value) || $value === '') {
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
    echo "Pembagi: ".$step . "<br>";
    $hargaPertama = $hargaMin + $step;

    // Membuat array hitungHarga
    $hitungHarga = [];
    for ($i = 0; $i < 9; $i++) {
        $hitungHarga[] = $hargaPertama + ($step * $i);
    }

    // Menampilkan hasil (hanya untuk contoh, sesuaikan dengan kebutuhan Anda)
    echo "Harga Min: " . $hargaMin . "<br>";
    echo "Harga Max: " . $hargaMax . "<br>";
    echo "Rentang Harga: " . $rentang . "<br>";
    echo "<br>Array Hitung Harga: <br>";
    $no = 1;
    foreach ($hitungHarga as $harga) {
        echo $no . ". kurang dari " .$harga . "<br>";
        $no++;
        }
      echo $no . ". lebih dari " .$harga . "<br>";
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

}
