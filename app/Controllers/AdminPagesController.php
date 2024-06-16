<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BobotModel;
use App\Models\KuantitatifModel;
use App\Models\NormalisasiModel;
use App\Models\SmartphoneModel;

class AdminPagesController extends BaseController
{
    public $smartphone;
    public $bobot;
    public $bobotController;
  public $path;
  public $konversi;
  public $normalisasi;
    public function __construct() {
        // Inisialisasi model
        $this->smartphone = new SmartphoneModel();
        $this->bobot = new BobotModel();
        $this->bobotController = new BobotController();
        $this->konversi = new KuantitatifModel();
        $this->normalisasi = new NormalisasiModel();

        // Panggil fungsi yang ingin dieksekusi sebelum fungsi lainnya
        $this->alertBobot();
        $this->alertData();
        helper(['form']);
        $this->path = "public/img/smartphone";
    }

    public function alertBobot() {
        $totalNull = 0;
        $data = $this->bobot->select('nilai')->findAll();

        foreach ($data as $row) {
            foreach ($row as $key => $value) {
                if ($value == 0) {
                    $totalNull++;
                }
            }
        }

        if ($totalNull >= 1) {
            session()->setFlashdata('bobot', 'alert');
        }
    }
    public function alertData() {
        $totalNull = 0;
        $norm = $this->normalisasi->findAll();
        $sm = $this->normalisasi->findAll();

        foreach ($norm as $row) {
            foreach ($row as $key => $value) {
                if (is_null($value) || $value === '') {
                    $totalNull++;
                }
            }
        }
        foreach ($sm as $row) {
            foreach ($row as $key => $value) {
                if (is_null($value) || $value === '') {
                    $totalNull++;
                }
            }
        }

        if ($totalNull >= 1) {
            session()->setFlashdata('normalisasi', 'alert');
        }
    }
  public function index()
  {
    $smartphone = $this->smartphone->orderBy('brand', 'asc')->findAll();
    $data = [
      'title' => 'Admin Page',
      'page' => 'dashboard',
      'smartphone' => $smartphone,
    ];
    return view('admin/dashboard', $data);
  }

  public function master()
  {
    $smartphone = $this->smartphone->orderBy('brand', 'asc')->findAll();
    $normalisasi = $this->normalisasi->getData();
    $konversi = $this->konversi->getData();
    $data = [
      'title' => 'Data Smartphone',
      'page' => 'master',
      'normalisasi' => $normalisasi,
      'konversi' => $konversi,
      'smartphone' => $smartphone,
    ];
    return view('admin/master-data', $data);

  }
  public function tambahSmartphone()
  {
    $brand = $this->smartphone->getBy('brand');
    $merek = $this->smartphone->getBy('merek');
    $dimensi = $this->smartphone->getBy('dimensi');
    $berat = $this->smartphone->getBy('berat');
    $build = $this->smartphone->getBy('build');
    $lcd_type = $this->smartphone->getBy('lcd_type');
    $lcd_size = $this->smartphone->getBy('lcd_size');
    $lcd_resolusi = $this->smartphone->getBy('lcd_resolusi');
    $os = $this->smartphone->getBy('os');
    $chipset = $this->smartphone->getBy('chipset');
    $cpu = $this->smartphone->getBy('cpu');
    $ram = $this->smartphone->getBy('ram');
    $rom = $this->smartphone->getBy('rom');
    $main_camera = $this->smartphone->getBy('main_camera');
    $main_type = $this->smartphone->getBy('main_type');
    $main_video = $this->smartphone->getBy('main_video');
    $front_camera = $this->smartphone->getBy('front_camera');
    $front_video = $this->smartphone->getBy('front_video');
    $usb = $this->smartphone->getBy('usb');
    $battery_capacity = $this->smartphone->getBy('battery_capacity');
    $harga = $this->smartphone->getBy('harga');

    $data = [
      'title' => 'Tambah Smartphone',
      'page' => 'master',
      'brand' => $brand,
      'merek' => $merek,
      'dimensi' => $dimensi,
      'berat' => $berat,
      'build' => $build,
      'lcd_type' => $lcd_type,
      'lcd_size' => $lcd_size,
      'lcd_resolusi' => $lcd_resolusi,
      'os' => $os,
      'chipset' => $chipset,
      'cpu' => $cpu,
      'ram' => $ram,
      'rom' => $rom,
      'main_camera' => $main_camera,
      'main_type' => $main_type,
      'main_video' => $main_video,
      'front_camera' => $front_camera,
      'front_video' => $front_video,
      'usb' => $usb,
      'battery_capacity' => $battery_capacity,
      'harga' => $harga,
    ];
    return view('admin/tambah-smartphone', $data);

  }
  public function insertSmartphone(){
    $brand = $this->request->getPost('brand');
    $merek = $this->request->getPost('merek');
    $dimensi = $this->request->getPost('dimensi');
    $berat = $this->request->getPost('berat');
    $build = $this->request->getPost('build');
    $lcd_type = $this->request->getPost('lcd_type');
    $lcd_size = $this->request->getPost('lcd_size');
    $lcd_resolusi = $this->request->getPost('lcd_resolusi');
    $os = $this->request->getPost('os');
    $chipset = $this->request->getPost('chipset');
    $cpu = $this->request->getPost('cpu');
    $ram = $this->request->getPost('ram');
    $rom = $this->request->getPost('rom');
    $main_camera = $this->request->getPost('main_camera');
    $main_type = $this->request->getPost('main_type');
    $main_video = $this->request->getPost('main_video');
    $front_camera = $this->request->getPost('front_camera');
    $front_video = $this->request->getPost('front_video');
    $usb = $this->request->getPost('usb');
    $battery_capacity = $this->request->getPost('battery_capacity');
    $harga = $this->request->getPost('harga');
    $slug = str_replace(' ', '_', $merek)."-".$ram."-".$rom."-".date("Y_m_d_H:i:s");

    // foto
    $foto = $this->request->getFile('gambar');
            if ($foto->isValid() && !$foto->hasMoved()) {
            // Beri nama file baru
            $newName = str_replace(' ', '_', $merek)."-$ram-$rom-".$foto->getRandomName();
            
            // Pindahkan file ke direktori yang diinginkan
            $foto->move(ROOTPATH . $this->path . '/', $newName);


          } else {
            session()->setFlashdata('eror', 'Gagal melakukan upload gambar!');
          return redirect()->back()->withInput();
        }
        
    $data = [
          'brand' => $brand,
          'merek' => $merek,
          'slug' => $slug,
          'gambar' => $newName,
          'dimensi' => $dimensi,
          'berat' => $berat,
          'build' => $build,
          'lcd_type' => $lcd_type,
          'lcd_size' => $lcd_size,
          'lcd_resolusi' => $lcd_resolusi,
          'os' => $os,
          'chipset' => $chipset,
          'cpu' => $cpu,
          'ram' => $ram,
          'rom' => $rom,
          'main_camera' => $main_camera,
          'main_type' => $main_type,
          'main_video' => $main_video,
          'front_camera' => $front_camera,
          'front_video' => $front_video,
          'usb' => $usb,
          'battery_capacity' => $battery_capacity,
          'harga' => $harga,
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
    ];
    $input = $this->smartphone->insert($data);
    if($input){
      session()->setFlashdata('success', 'Berhasil menambahkan data Smartphone.');
      return redirect()->back();
    }else{
      session()->setFlashdata('eror', 'Gagal menambahkan data Smartphone!');
      return redirect()->back()->withInput();
    }
  }
public function deleteSmartphone($slug = null) {
    if ($slug == null) {
      session()->setFlashdata('error', 'Data Smartphone tidak ditemukan!');
        return redirect()->back();
    }

    $getData = $this->smartphone->where('slug', $slug)->first();
    $hitung = $this->smartphone->where('slug', $slug)->countAllResults();
    if ($hitung != 1) {
      session()->setFlashdata('error', 'Data Smartphone tidak ditemukan!');
        return redirect()->back();
    }
    
    $filepath = ROOTPATH . $this->path .'/'. $getData['gambar'];
    if (file_exists($filepath)) {
      // Hapus file
      $hapus = unlink($filepath);
      if (!$hapus) {
        session()->setFlashdata('error', 'Gagal menghapus file.');
      }
    } else {
        session()->setFlashdata('error', 'File Foto Tidak ditemukan.');
    }
    
    // Hapus data dari database
    $this->smartphone->delete($getData['id']);

    return redirect()->back()->with('success', 'Berhasil menghapus data Smartphone.');
}

public function updateSmartphone($slug = null){
    if ($slug == null) {
      session()->setFlashdata('error', 'Data Smartphone tidak ditemukan!');
        return redirect()->back();
    }

    $getData = $this->smartphone->where('slug', $slug)->first();
    $hitung = $this->smartphone->where('slug', $slug)->countAllResults();
    if ($hitung != 1) {
      session()->setFlashdata('error', 'Data Smartphone tidak ditemukan!');
        return redirect()->back();
    }

    $brand = $this->smartphone->getBy('brand');
    $merek = $this->smartphone->getBy('merek');
    $dimensi = $this->smartphone->getBy('dimensi');
    $berat = $this->smartphone->getBy('berat');
    $build = $this->smartphone->getBy('build');
    $lcd_type = $this->smartphone->getBy('lcd_type');
    $lcd_size = $this->smartphone->getBy('lcd_size');
    $lcd_resolusi = $this->smartphone->getBy('lcd_resolusi');
    $os = $this->smartphone->getBy('os');
    $chipset = $this->smartphone->getBy('chipset');
    $cpu = $this->smartphone->getBy('cpu');
    $ram = $this->smartphone->getBy('ram');
    $rom = $this->smartphone->getBy('rom');
    $main_camera = $this->smartphone->getBy('main_camera');
    $main_type = $this->smartphone->getBy('main_type');
    $main_video = $this->smartphone->getBy('main_video');
    $front_camera = $this->smartphone->getBy('front_camera');
    $front_video = $this->smartphone->getBy('front_video');
    $usb = $this->smartphone->getBy('usb');
    $battery_capacity = $this->smartphone->getBy('battery_capacity');
    $harga = $this->smartphone->getBy('harga');

    $data = [
      'title' => 'Update Smartphone',
      'page' => 'master',
      'brand' => $brand,
      'merek' => $merek,
      'dimensi' => $dimensi,
      'berat' => $berat,
      'build' => $build,
      'lcd_type' => $lcd_type,
      'lcd_size' => $lcd_size,
      'lcd_resolusi' => $lcd_resolusi,
      'os' => $os,
      'chipset' => $chipset,
      'cpu' => $cpu,
      'ram' => $ram,
      'rom' => $rom,
      'main_camera' => $main_camera,
      'main_type' => $main_type,
      'main_video' => $main_video,
      'front_camera' => $front_camera,
      'front_video' => $front_video,
      'usb' => $usb,
      'battery_capacity' => $battery_capacity,
      'harga' => $harga,
      'sm' => $getData,
    ];
    return view('admin/update-smartphone', $data);

}

public function updatePost(){
    $brand = $this->request->getPost('brand');
    $merek = $this->request->getPost('merek');
    $dimensi = $this->request->getPost('dimensi');
    $berat = $this->request->getPost('berat');
    $build = $this->request->getPost('build');
    $lcd_type = $this->request->getPost('lcd_type');
    $lcd_size = $this->request->getPost('lcd_size');
    $lcd_resolusi = $this->request->getPost('lcd_resolusi');
    $os = $this->request->getPost('os');
    $chipset = $this->request->getPost('chipset');
    $cpu = $this->request->getPost('cpu');
    $ram = $this->request->getPost('ram');
    $rom = $this->request->getPost('rom');
    $main_camera = $this->request->getPost('main_camera');
    $main_type = $this->request->getPost('main_type');
    $main_video = $this->request->getPost('main_video');
    $front_camera = $this->request->getPost('front_camera');
    $front_video = $this->request->getPost('front_video');
    $usb = $this->request->getPost('usb');
    $battery_capacity = $this->request->getPost('battery_capacity');
    $harga = $this->request->getPost('harga');
    $slug = $this->request->getPost('slug');

    // foto
    $foto = $this->request->getFile('gambar');
    $dataSm = $this->smartphone->where('slug', $slug)->first();
    if(!$dataSm){
      return redirect()->to(base_url('master-data'))->with('eror', 'Harap ulangi pilih data yang di update');
    }

    $id = $dataSm['id'];
    $slug = str_replace(' ', '_', $merek)."-".$ram."-".$rom."-".date("Y_m_d_H:i:s");
    if(!$foto){
      $newname = $dataSm['gambar'];
    } else {
      if ($foto->isValid() && !$foto->hasMoved()) {
        // Beri nama file baru
        $newName = str_replace(' ', '_', $merek) . "-$ram-$rom-" . $foto->getRandomName();

        // Pindahkan file ke direktori yang diinginkan
        $foto->move(ROOTPATH . $this->path . '/', $newName);
        $fotoLama = ROOTPATH . $this->path . '/' . $dataSm['gambar'];
        if (file_exists($fotoLama)) {
          // Hapus file
          unlink($fotoLama);
        }
      }
    }
        
    $data = [
          'brand' => $brand,
          'merek' => $merek,
          'slug' => $slug,
          'gambar' => $newName,
          'dimensi' => $dimensi,
          'berat' => $berat,
          'build' => $build,
          'lcd_type' => $lcd_type,
          'lcd_size' => $lcd_size,
          'lcd_resolusi' => $lcd_resolusi,
          'os' => $os,
          'chipset' => $chipset,
          'cpu' => $cpu,
          'ram' => $ram,
          'rom' => $rom,
          'main_camera' => $main_camera,
          'main_type' => $main_type,
          'main_video' => $main_video,
          'front_camera' => $front_camera,
          'front_video' => $front_video,
          'usb' => $usb,
          'battery_capacity' => $battery_capacity,
          'harga' => $harga,
          'updated_at' => date('Y-m-d H:i:s'),
    ];
    $input = $this->smartphone->update($id,$data);

    if($input){
      session()->setFlashdata('success', 'Berhasil menguba data Smartphone.');
      return redirect()->to(base_url('master-data'));
    }else{
      session()->setFlashdata('eror', 'Gagal mengubah data Smartphone!');
      return redirect()->back()->withInput();
    }
}

  public function toko()
  {
    $data = [
      'title' => 'Welcome Admin',
      'page' => 'toko',
    ];
    return view('admin/dashboard', $data);

  }
  public function profil()
  {
    $data = [
      'title' => 'Welcome Admin',
      'page' => 'profil',
    ];
    // return view('admin/dashboard', $data);
    return "aku";

  }



}
