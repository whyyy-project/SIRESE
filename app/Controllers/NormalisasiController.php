<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BobotModel;
use App\Models\NormalisasiModel;
use App\Models\SmartphoneModel;
use CodeIgniter\HTTP\ResponseInterface;

class NormalisasiController extends BaseController
{
  public $norm;
  public $bobot;
  public $smartphone;
  function __construct()
  {
    $this->norm = new NormalisasiModel();
    $this->bobot = new BobotModel();
    $this->smartphone = new SmartphoneModel();

  }
    public function index()
    {
    session()->setFlashdata('success', 'Berhasil Konversi Data');
    return redirect()->back();
    }
public function convert(){
    $sub_kriteria = $this->bobot->select('sub_kriteria, konversi, nilai')->distinct()->findAll();
    foreach($sub_kriteria as $sk){
      if($sk['sub_kriteria'] != 'harga' || $sk['sub_kriteria'] != 'battery_capacity' ){

      $get = $this->smartphone->select('id, merek')->where($sk['sub_kriteria'], $sk['konversi'])->findAll();
      foreach($get as $sm){

          // Mengambil nilai minimum
          $min = $this->bobot->where('sub_kriteria', $sk['sub_kriteria'])->where('nilai >', 0)->orderBy('nilai', 'asc')->first();
          // Mengambil nilai maksimum
          $max = $this->bobot->where('sub_kriteria', $sk['sub_kriteria'])->orderBy('nilai', 'desc')->first();
            if($sk['nilai'] && $max['nilai']&& $min['nilai']){
            $nilai = ($sk['nilai'] - $min['nilai']) / ($max['nilai'] - $min['nilai']);
              $this->norm->where('id_smartphone', $sm['id'])->set($sk['sub_kriteria'], $nilai)->update();
            }
      }
      }
    }
    echo "yoi";
}

}
