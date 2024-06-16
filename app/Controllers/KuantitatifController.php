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
  public $date;
  function __construct()
  {
    $this->kuantitatif = new KuantitatifModel();
    $this->smartphone = new SmartphoneModel();
    $this->bobot = new KonversiModel();
    $this->date = date('Y-m-d H:i:s');
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

    public function delete(){
      $this->kuantitatif->query("TRUNCATE TABLE kuantitatif");
      session()->setFlashdata('success', 'Berhasil Menghapus data Konversi.');
      return redirect()->back();
    }

    public function body(){
      $this->dimensi();
      $this->angka('berat');
      $this->build();
    }
    public function lcd(){
      $this->umum('lcd_type');
      $this->angka('lcd_size');
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
            $this->kuantitatif->where('id_smartphone', $sm['id'])->set('harga', $nilai)->set('updated_at', $this->date)->update();
            break;
          }
          if((float)$sm['harga'] > (float)$max['konversi']){
              $nilai = 100;
              $this->kuantitatif->where('id_smartphone', $sm['id'])->set('harga', $nilai)->set('updated_at', $this->date)->set('updated_at', $this->date)->update();
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
          $this->kuantitatif->where('id_smartphone', $item['id'])->set('dimensi', $nilai)->set('updated_at', $this->date)->set('updated_at', $this->date)->update();
          break;
          }
          if((float)$perkalian > (float)$max['konversi']){
            $nilai = 100;
          $this->kuantitatif->where('id_smartphone', $item['id'])->set('dimensi', $nilai)->set('updated_at', $this->date)->set('updated_at', $this->date)->update();
          }
      }
    }
  }
  public function angka($sub){
    $smartphone = $this->smartphone->select('id,merek,'. $sub)->findAll();
    foreach($smartphone as $sm){
     // get bobot konversi
      $getBobot = $this->bobot->where('sub_kriteria',$sub)->orderBy('CAST(nilai AS UNSIGNED)', 'asc')->findAll();
      $max = $this->bobot->where('sub_kriteria',$sub)->orderBy('CAST(konversi AS UNSIGNED)', 'desc')->first();
      foreach($getBobot as $bbt){
        if((float)$sm[$sub] > (float)$max['konversi']){
          $nilai = 100;
          $this->kuantitatif->where('id_smartphone', $sm['id'])
          ->set($sub, $nilai)->set('updated_at', $this->date)
          ->set('updated_at', $this->date)->update();
          break;
          }
          if((float)$sm[$sub] < (float)$bbt['konversi']){
          $nilai = $bbt['nilai'];
          echo $bbt['nilai'].' <b>nilai-nya</b><br>';
            $this->kuantitatif->where('id_smartphone', $sm['id'])
            ->set($sub, $nilai)->set('updated_at', $this->date)
            ->set('updated_at', $this->date)->update();
          break;
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
      $this->kuantitatif->where('id_smartphone', $sm['id'])->set('build', $nilai)->set('updated_at', $this->date)->update();
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
          $this->kuantitatif->where('id_smartphone', $item['id'])->set('lcd_resolusi', $nilai)->set('updated_at', $this->date)->update();
          break;
          }
          if((float)$perkalian > (float)$max['konversi']){
            $nilai = 100;
          $this->kuantitatif->where('id_smartphone', $item['id'])->set('lcd_resolusi', $nilai)->set('updated_at', $this->date)->update();
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
        if (isset($getNilai['nilai'])) {
          $nilai += $getNilai['nilai'];
        }
      }
    $this->kuantitatif->where('id_smartphone', $sm['id'])->set($sub, $nilai)->set('updated_at', $this->date)->update();
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
          $this->kuantitatif->where('id_smartphone', $sm['id'])->set('battery_capacity', $nilai)->set('updated_at', $this->date)->update();
          break;
          }
          if((float)$sm['battery_capacity'] > (float)$max['konversi']){
            $nilai = 100;
          $this->kuantitatif->where('id_smartphone', $sm['id'])->set('battery_capacity', $nilai)->set('updated_at', $this->date)->update();
        }
      }
    }
  }
  // jika bobot wajib sama
  private function umum($sub){
    $dSm = $this->smartphone->select('id, '.$sub)->findAll();
    foreach($dSm as $sm){
      $bobot = $this->bobot->where('sub_kriteria', $sub)->where('konversi', $sm[$sub])->first();
      $this->kuantitatif->where('id_smartphone', $sm['id'])->set($sub, $bobot['nilai'])->set('updated_at', $this->date)->update();
    }
  }
}
  