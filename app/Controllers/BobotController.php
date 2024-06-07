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

  // function untuk membuat konversi lebih mudah
  public function konversi($kriteria, $sub_kriteria){
              // main camera
      $ambil = $this->smartphone->getBy($sub_kriteria);
      foreach ($ambil as $data) {
      $konversi = strtolower($data[$sub_kriteria]);
          if ($this->bobot->where('konversi', $konversi)->where('sub_kriteria', $sub_kriteria)->countAllResults() < 1)
          {
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
  }

}
