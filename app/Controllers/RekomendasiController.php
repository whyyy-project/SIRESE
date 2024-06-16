<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BobotUserModel;
use App\Models\KuantitatifModel;
use App\Models\NormalisasiModel;
use App\Models\SmartphoneModel;
use CodeIgniter\HTTP\ResponseInterface;

class RekomendasiController extends BaseController
{

    protected $smartphone;
    protected $norm;
    protected $bobotUser;
    protected $dataHitung;
    function __construct(){
        $this->bobotUser = new  BobotUserModel();
        $this->smartphone = new SmartphoneModel();
        $this->norm = new NormalisasiModel();
    }



    public function index()
    {
    session()->destroy();
        $data =[
        'page' => 'rekomendasi',
        ];
        return view('public/rekomendasi.php', $data);
    }
    public function saveBobot(){
      $body = $this->request->getPost('body');
      $display = $this->request->getPost('display');
      $system = $this->request->getPost('system');
      $memory = $this->request->getPost('memory');
      $mainCamera = $this->request->getPost('mainCamera');
      $frontCamera = $this->request->getPost('frontCamera');
      $battery = $this->request->getPost('battery');
      $price = $this->request->getPost('price');
      $min = $this->request->getPost('min');
      $max = $this->request->getPost('max');
      if($min == null && $max != null){
        $hMin = 0;
        $hMax = preg_replace('/\D/', '', $max);
        session()->set('filter', true);
      }
      else if($min != null && $max != null){
        $hMin = preg_replace('/\D/', '', $min);
        $hMax = preg_replace('/\D/', '', $max);
        session()->set('filter', true);
        }
      else if($min != null && $max == null){
        $hargaMax = $this->smartphone->select('harga')->orderBy('harga', 'desc')->first();
        $hMin = preg_replace('/\D/', '', $min);
        $hMax = $hargaMax['harga'];
        session()->set('filter', true);
        }
      else if($min == null && $max != null){
        $hargaMin = $this->smartphone->select('harga')->orderBy('harga', 'asc')->first();
        $hMax = preg_replace('/\D/', '', $min);
        $hMin = $hargaMin['harga'];
        session()->set('filter', true);
        }
        else{
          $hargaMax = $this->smartphone->select('harga')->orderBy('harga', 'desc')->first();
          $hMin = 0;
          $hMax = $hargaMax['harga'];
        }

    $total = $body + $display + $system + $memory + $mainCamera + $frontCamera + $battery + $price;
      session()->set('body', $body/$total);
      session()->set('display', $display/$total);
      session()->set('system', $system/$total);
      session()->set('memory', $memory/$total);
      session()->set('mainCamera', $mainCamera/$total);
      session()->set('frontCamera', $frontCamera/$total);
      session()->set('battery', $battery/$total);
      session()->set('price', $price/$total);
      session()->set('hMin', $hMin);
      session()->set('hMax', $hMax);

        $dataBobot = [
          'body' => $body,
          'layar' => $display,
          'system' =>$system,
          'memory' => $memory,
          'main_camera' => $mainCamera,
          'front_camera' => $frontCamera,
          'battery' => $battery,
          'harga' => $price,
          'harga_min' => $hMin,
          'harga_max' => $hMax,
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
        ];
        $this->bobotUser->insert($dataBobot);
        session()->set('bobotAwal', $dataBobot);
      return redirect()->to(base_url('algoritma-rekomendasi'));
    }
    public function viewRekomendasi(){
      // validasi
      if(!session()->get('bobotAwal')){
        return redirect()->to(base_url('rekomendasi'));
      }
      $hasil = $this->hitung(3);
      // Fungsi untuk melakukan pengurutan
      usort($hasil, function($a, $b) {
        // Urutkan berdasarkan 'total' dari besar ke kecil
        if ($b['total'] != $a['total']) {
          return bccomp($b['total'], $a['total'], 10);
        } else {
          // Jika nilai sama, urutkan berdasarkan nama dari A ke Z
          return strcmp($a['sMerek'], $b['sMerek']);
        }
      });
      $maxTotal = $hasil[0]['total'];
  
          $data = [
              'title' => 'Hasil Perhitungan',
              'page' => 'rekomendasi',
              'smartphone' => $hasil,
              'max' => $maxTotal,
          ];
      return view('public/hasil-perhitungan', $data);
    }

public function viewPerhitungan(){
  // validasi
  if(!session()->get('bobotAwal')){
    return redirect()->to(base_url('rekomendasi'));
  }
  $dataNormalisasi = $this->norm->getWithRange(session()->get('hMin'), session()->get('hMax'));
  foreach($dataNormalisasi as $n){
    if(session()->get('filter')){
      $n['harga'] = $this->filter($n['sHarga']);
      $n['harga'] = $this->normalisasiHarga($n['harga']);
    }
  }
    $dataKuanti = $this->hitung(1);
    $dataHasil = $this->hitung(3);
          usort($dataHasil, function($a, $b) {
        // Urutkan berdasarkan 'total' dari besar ke kecil
        if ($b['total'] != $a['total']) {
          return bccomp($b['total'], $a['total'], 10);
        } else {
          // Jika nilai sama, urutkan berdasarkan nama dari A ke Z
          return strcmp($a['sMerek'], $b['sMerek']);
        }
      });
      $maxTotal = $dataHasil[0]['total'];
    $data = [
      'kuanti' => $dataKuanti,
      'normal' => $dataNormalisasi,
      'hasil' => $dataHasil,
      'max' => $maxTotal,
    ];
    return view('public/perhitungan', $data);
}


    public function hitung($perhitungan){
      $dNorm = $this->norm->getWithRange(session()->get('hMin'), session()->get('hMax'));
        foreach ($dNorm as &$data) {
        $data['dimensi'] = $data['dimensi'] * session()->get('body');
        $data['berat'] = $data['berat'] * session()->get('body');
        $data['build'] = $data['build'] * session()->get('body');
        $data['lcd_type'] = $data['lcd_type'] * session()->get('display');
        $data['lcd_size'] = $data['lcd_size'] * session()->get('display');
        $data['lcd_resolusi'] = $data['lcd_resolusi'] * session()->get('display');
        $data['os'] = $data['os'] * session()->get('system');
        $data['chipset'] = $data['chipset'] * session()->get('system');
        $data['cpu'] = $data['cpu'] * session()->get('system');
        $data['ram'] = $data['ram'] * session()->get('memory');
        $data['rom'] = $data['rom'] * session()->get('memory');
        $data['main_camera'] = $data['main_camera'] * session()->get('mainCamera');
        $data['main_type'] = $data['main_type'] * session()->get('mainCamera');
        $data['main_video'] = $data['main_video'] * session()->get('mainVideo');
        $data['front_camera'] = $data['front_camera'] * session()->get('frontCamera');
        $data['front_video'] = $data['front_video'] * session()->get('frontCamera');
        $data['usb'] = $data['usb'] * session()->get('battery');
        $data['battery_capacity'] = $data['battery_capacity'] * session()->get('battery');
        if(session()->get('filter')){
          if($perhitungan >= 1){
            $data['harga'] = $this->filter($data['sHarga']);
          }
          if($perhitungan >= 2){
            $data['harga'] = $this->normalisasiHarga($data['harga']);
          }
          if($perhitungan >= 3){
            $data['harga'] = $this->filterBobotHarga($data['harga']);
          }
        }else{
          $data['harga'] = $data['harga'] * session()->get('price');
        }
        $data['total'] = (($data['dimensi'] + $data['berat'] + $data['build'])/3) + (($data['lcd_type'] + $data['lcd_size'] + $data['lcd_resolusi'])/3) + (($data['os'] + $data['chipset'] + $data['cpu'])/3) + (($data['ram'] + $data['rom'])/2) + (($data['main_camera'] + $data['main_type'] + $data['main_video'])/3) + (($data['front_camera'] + $data['front_video'])/2) + (($data['usb'] + $data['battery_capacity'])/2) + $data['harga'];
      }
      return $dNorm;
    }
    private function filter($harga){
      // membuat konversi harga
      $hargaMin = session()->get('hMin');
      $hargaMax = session()->get('hMax');
      $hargaMinResult = $this->smartphone->select('harga')->where('harga >=', $hargaMin)->where('harga <=', $hargaMax)->orderBy('harga', 'asc')->first();
      $hargaMaxResult = $this->smartphone->select('harga')->where('harga >=', $hargaMin)->where('harga <=', $hargaMax)->orderBy('harga', 'desc')->first();
      $jarak = $hargaMaxResult['harga'] - $hargaMinResult['harga'];
      $step = $jarak / 10;
      $hargaPertama = $hargaMinResult['harga'] + $step;
      $konversi = 0;
      // inisialisasi nilai konversi
      $nilai = 0;
      for ($i = 0; $i < 9; $i++) {
        $konversi = 10 * $i;
        if($harga <= $hargaPertama + ($step * $i)){
          $nilai = $konversi;
          break;
        }else{
          $nilai = 100;
        }
      }
      // normalisasi data
      return $nilai;
  }
  private function normalisasiHarga($data){
    $normalisasi = (100 - $data) / (100 - 0);
    return $normalisasi;
  }
  private function filterBobotharga($data){
    $hasil = $data * session()->get('price');
    return $hasil;
  }
}
