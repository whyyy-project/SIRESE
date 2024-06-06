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
    $this->mainVideo();
    $this->frontVideo();

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
      'title' => 'Welcome Admin',
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
    public function mainVideo(){
      $videoData = $this->smartphone->select('main_video')->findAll();

      // Array baru untuk menyimpan hasil tanpa duplikat
      $uniqueVideos = [];

      // Loop melalui setiap data video
      foreach ($videoData as $videos) {
          // Akses kolom 'main_video' dari setiap elemen
          $videoList = explode(',', $videos['main_video']);
          
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
      }
  }
    public function frontVideo(){
      $videoData = $this->smartphone->select('front_video')->findAll();

      // Array baru untuk menyimpan hasil tanpa duplikat
      $uniqueVideos = [];

      // Loop melalui setiap data video
      foreach ($videoData as $videos) {
          // Akses kolom 'front_video' dari setiap elemen
          $videoList = explode(',', $videos['front_video']);
          
          // Loop melalui setiap video dalam daftar
          foreach ($videoList as $video) {
              // Hapus spasi di sekitar video
              $video = trim($video);
              // Jika video belum ada di array hasil, tambahkan
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
      }
  }

}
