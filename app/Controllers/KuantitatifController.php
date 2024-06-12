<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KonversiModel;
use App\Models\KuantitatifModel;
use App\Models\SmartphoneModel;
use CodeIgniter\HTTP\ResponseInterface;

class KuantitatifController extends BaseController
{
  public $kuantitatif;
  public $smartphone;
  public $bobot;
  function __construct()
  {
    $this->kuantitatif = new KuantitatifModel();
    $this->smartphone = new SmartphoneModel();
    $this->bobot = new KonversiModel();
  }
    public function index()
    {
      // kosongkan data
      $this->kuantitatif->query("TRUNCATE TABLE kuantitatif");
      // ambil id smrtphn
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
          $this->kuantitatif->insert($insert);
          }

          // jalankan konversi tiap kriteria
        $this->body();
        $this->lcd();
        $this->sistem();
        $this->memori();
        $this->main_camera();
        $this->front_camera();
        $this->battery();
        $this->harga();
        session()->setFlashdata('success', 'Berhasil melakukan konversi data.');
        return redirect()->back();
    }

    public function reset(){
      $this->kuantitatif->query("TRUNCATE TABLE kuantitatif");
    }

    public function body(){
      $this->dimensi();
      $this->berat();
      $this->build();
    }
    public function lcd(){
      $this->umum('lcd_type');
      $this->lcd_size();
      $this->lcd_resolusi();
    }
    public function sistem(){
      $this->umum('os');
      $this->umum('chipset');
      $this->umum('cpu');
    }
    public function memori(){
      $this->umum('rom');
      $this->umum('ram');
    }
    public function main_camera(){
      $this->umum('main_camera');
      $this->umum('main_type');
      $this->video('main_video');
    }
    public function front_camera(){
      $this->umum('front_camera');
      $this->video('front_video');
    }
    public function battery(){
      $this->umum('usb');
      $this->capacity();
    }
    public function harga(){
      $dSm = $this->smartphone->select('id, harga')->findAll();
      // get bobot konversi
      $getBobot = $this->bobot->where('sub_kriteria', 'harga')->orderBy('nilai', 'asc')->findAll();
      $max = $this->bobot->where('sub_kriteria', 'harga')->orderBy('nilai', 'desc')->first();
      foreach($dSm as $sm){
        foreach($getBobot as $bbt){
          if((float)$sm['harga'] < (float)$bbt['konversi']){
            $nilai = $bbt['nilai'];
            $this->kuantitatif->where('id_smartphone', $sm['id'])->set('harga', $nilai)->update();
            break;
          }
          if((float)$sm['harga'] > (float)$max['konversi']){
              $nilai = 100;
              $this->kuantitatif->where('id_smartphone', $sm['id'])->set('harga', $nilai)->update();
          }
        }
      }
    }

    // perhitungan konversi
  private function dimensi()
  {
    $smartphone = $this->smartphone->select('id, merek, dimensi')->findAll();
    $dataKonversi = [];
    foreach ($smartphone as $item) {
      list($panjang, $lebar, $tinggi) = explode(" x ", strtolower($item['dimensi']));
      $perkalian = $panjang * $lebar * $tinggi;
      $dataKonversi[] = $perkalian;
      // get bobot konversi
      $getBobot = $this->bobot->where('sub_kriteria', 'dimensi')->orderBy('nilai', 'asc')->findAll();
      $max = $this->bobot->where('sub_kriteria', 'dimensi')->orderBy('nilai', 'desc')->first();
      foreach($getBobot as $bbt){
        if((float)$perkalian < (float)$bbt['konversi']){
          $nilai = $bbt['nilai'];
          $this->kuantitatif->where('id_smartphone', $item['id'])->set('dimensi', $nilai)->update();
          break;
          }
          if((float)$perkalian > (float)$max['konversi']){
            $nilai = 100;
          $this->kuantitatif->where('id_smartphone', $item['id'])->set('dimensi', $nilai)->update();
          }
      }
    }
  }
  private function berat(){
    $smartphone = $this->smartphone->select('id, berat')->findAll();
    foreach($smartphone as $sm){
     // get bobot konversi
      $getBobot = $this->bobot->where('sub_kriteria', 'berat')->orderBy('nilai', 'asc')->findAll();
      $max = $this->bobot->where('sub_kriteria', 'berat')->orderBy('nilai', 'desc')->first();
      foreach($getBobot as $bbt){
        if((float)$sm['berat'] < (float)$bbt['konversi']){
          $nilai = $bbt['nilai'];
          $this->kuantitatif->where('id_smartphone', $sm['id'])->set('berat', $nilai)->update();
          break;
          }
          if((float)$sm['berat'] > (float)$max['konversi']){
            $nilai = 100;
          $this->kuantitatif->where('id_smartphone', $sm['id'])->set('berat', $nilai)->update();
          }
      }
    }
  }
  private function build(){
    $dSm = $this->smartphone->select('id, build')->findAll();
    foreach($dSm as $sm){
      $nilai = 0;
      $pisah = explode(', ', strtolower($sm['build']));
      for ($i = 0; $i < count($pisah) ; $i++){
        $getNilai = $this->bobot->where('sub_kriteria', 'build')->where('konversi', $pisah[$i])->first();
        if (isset($getNilai) && $getNilai) {
          $nilai = $nilai + $getNilai['nilai'];
          }
      }
      $this->kuantitatif->where('id_smartphone', $sm['id'])->set('build', $nilai)->update();
    }
  }

  private function lcd_size(){
    $dSm = $this->smartphone->select('id, lcd_size')->findAll();
    foreach($dSm as $sm){
      $getBobot = $this->bobot->where('sub_kriteria', 'lcd_size')->orderBy('nilai', 'asc')->findAll();
      $max = $this->bobot->where('sub_kriteria', 'lcd_size')->orderBy('nilai', 'desc')->first();
      foreach($getBobot as $bbt){
        if((float)$sm['lcd_size'] < (float)$bbt['konversi']){
          $nilai = $bbt['nilai'];
          $this->kuantitatif->where('id_smartphone', $sm['id'])->set('lcd_size', $nilai)->update();
          break;
          }
          if((float)$sm['lcd_size'] > (float)$max['konversi']){
            $nilai = 100;
          $this->kuantitatif->where('id_smartphone', $sm['id'])->set('lcd_size', $nilai)->update();
          }
      }
    }
  }

  private function lcd_resolusi(){
      $smartphone = $this->smartphone->select('id, lcd_resolusi')->findAll();
    $dataKonversi = [];
    foreach ($smartphone as $item) {
      list($panjang, $lebar) = explode(" x ", strtolower($item['lcd_resolusi']));
      $perkalian = $panjang * $lebar;
      $dataKonversi[] = $perkalian;
      // get bobot konversi
      $getBobot = $this->bobot->where('sub_kriteria', 'lcd_resolusi')->orderBy('nilai', 'asc')->findAll();
      $max = $this->bobot->where('sub_kriteria', 'lcd_resolusi')->orderBy('nilai', 'desc')->first();
      foreach($getBobot as $bbt){
        if((float)$perkalian < (float)$bbt['konversi']){
          $nilai = $bbt['nilai'];
          $this->kuantitatif->where('id_smartphone', $item['id'])->set('lcd_resolusi', $nilai)->update();
          break;
          }
          if((float)$perkalian > (float)$max['konversi']){
            $nilai = 100;
          $this->kuantitatif->where('id_smartphone', $item['id'])->set('lcd_resolusi', $nilai)->update();
          }
      }
    }
  }

  private function video($sub){
    $dSm = $this->smartphone->select('id,'.$sub)->findAll();
    foreach($dSm as $sm){
      $data = strtolower($sm[$sub]);
      $pisah = explode(', ', $data);
      $nilai = 0;
      for ($i = 0; $i < count($pisah) ; $i++){
        $getNilai = $this->bobot->where('sub_kriteria', $sub)->where('konversi', $pisah[$i])->first();
        if (isset($getNilai) && $getNilai) {
          $nilai = $nilai + $getNilai['nilai'];
        }
      }
    $this->kuantitatif->where('id_smartphone', $sm['id'])->set($sub, $nilai)->update();
    }
  }

  private function capacity(){
    $dSm = $this->smartphone->select('id, battery_capacity')->findAll();
    // get bobot konversi
    $getBobot = $this->bobot->where('sub_kriteria', 'battery_capacity')->orderBy('nilai', 'asc')->findAll();
    $max = $this->bobot->where('sub_kriteria', 'battery_capacity')->orderBy('nilai', 'desc')->first();
    foreach($dSm as $sm){
      foreach($getBobot as $bbt){
        if((float)$sm['battery_capacity'] < (float)$bbt['konversi']){
          $nilai = $bbt['nilai'];
          $this->kuantitatif->where('id_smartphone', $sm['id'])->set('battery_capacity', $nilai)->update();
          break;
          }
          if((float)$sm['battery_capacity'] > (float)$max['konversi']){
            $nilai = 100;
          $this->kuantitatif->where('id_smartphone', $sm['id'])->set('battery_capacity', $nilai)->update();
        }
      }
    }
  }
  // jika bobot wajib sama
  private function umum($sub){
    $dSm = $this->smartphone->select('id, '.$sub)->findAll();
    foreach($dSm as $sm){
      $bobot = $this->bobot->where('sub_kriteria', $sub)->where('konversi', $sm[$sub])->first();
      $this->kuantitatif->where('id_smartphone', $sm['id'])->set($sub, $bobot['nilai'])->update();
    }
  }
}
  