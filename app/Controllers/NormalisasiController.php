<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KonversiModel;
use App\Models\KuantitatifModel;
use App\Models\NormalisasiModel;
use App\Models\SmartphoneModel;
use CodeIgniter\HTTP\ResponseInterface;

class NormalisasiController extends BaseController
{
  public $smartphone;
  public $kuanti;
  public $bobot;
  public $convert;
  function __construct()
  {
    $this->smartphone = new SmartphoneModel();
    $this->kuanti = new KuantitatifModel();
    $this->bobot = new KonversiModel();
    $this->convert = new NormalisasiModel();
  }
    public function index()
    {
      $this->kuanti->query("TRUNCATE TABLE normalisasi");
      $dataSmartphone = $this->smartphone->findAll();
      foreach ($dataSmartphone as $sm){
        // kenalkan idSmartphone
        $id = $sm['id'];
        // buat data baru
        $insert = [
          'id_smartphone' => $id,
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
          ];
        $this->convert->insert($insert);
      }
    $kriteria = $this->bobot->select('sub_kriteria')->distinct()->findAll();
      foreach($kriteria as $k){
        $this->konversi($k['sub_kriteria']);
        }
      session()->setFlashdata('success', 'Berhasil melakukan normalisasi data.');
      return redirect()->back();
    }

    public function delete(){
      $this->kuanti->query("TRUNCATE TABLE normalisasi");
      session()->setFlashdata('success', 'Berhasil Menghapus data normalisasi.');
      return redirect()->back();
    }
    private function konversi($sub){
      $dKuan = $this->kuanti->select('id_smartphone, '.$sub)->findAll();
      $min = $this->kuanti->select($sub)->orderBy($sub, 'asc')->first();
      $max = $this->kuanti->select($sub)->orderBy($sub, 'desc')->first();
      if($min[$sub] != 0 && $max[$sub] != 0){
        foreach($dKuan as $dk){
        $nilai = ($dk[$sub] - $min[$sub]) / ($max[$sub] - $min[$sub]);
          $this->convert->where('id_smartphone', $dk['id_smartphone'])->set($sub, $nilai)->update();
        }
      }
    }
}
