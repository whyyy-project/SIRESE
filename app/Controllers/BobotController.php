<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SmartphoneModel;
use CodeIgniter\HTTP\ResponseInterface;

class BobotController extends BaseController
{
  public $smartphone;
  function __construct()
  {
    $this->smartphone = new SmartphoneModel();
  }
    public function index()
    {
        //
    }
    public function mainVideo(){
    $videoData = $this->smartphone->mainVideo();

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
            }
        }
    }
    dd($uniqueVideos);
}

}
