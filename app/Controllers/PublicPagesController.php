<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SmartphoneModel;
use App\Models\TokoModel;
// use App\Models\BrandModel;
class PublicPagesController extends BaseController
{
    // protected $brandModel;
    protected $smartphone;
    protected $toko;
    function __construct(){
        // $this->brandModel = new  BrandModel();
        $this->smartphone = new SmartphoneModel();
        $this->toko = new TokoModel();
    }

    public function index()
    {

        $sampleData = $this->smartphone->randomData();
        $data = [
        'page' => "dashboard",
        'title' => "Sistem Rekomendasi Smartphone",
        'data' => $sampleData,
        // 'alert' => $alertSmartphone,
        ];
        return view('public/dashboard', $data);
    }
    public function hasilCari()
    {
        $search = $this->request->getGet('search');
        // data per page
        $perPage = 6;
        // hitung total data
        $totalData = count($this->smartphone->hasilCari($search));
        // hitung berapa page
        $totalPages = ceil($totalData / $perPage);
        // Mendapatkan nomor halaman saat ini
        $currentPage = $this->request->getVar('page') ?? 1;
        // Mendapatkan data kesenian dengan paging
        $dataSmartphone = $this->smartphone->findDataSmartphonePaging($perPage, ($currentPage - 1) * $perPage, $search);
        $data = [
            'title' => 'Hasil Pencarian',
            'page' => 'smartphone',
            'smartphone' => $dataSmartphone,
            'totalPages' => $totalPages,
            'currentPage' => $currentPage,
            'search' => $search,
            'total' => $totalData,
        ];
        return view('public/hasil-cari', $data);
    }
    public function smartphone()
    {
        $perPage = 6;
        // hitung total data
        $totalData = count($this->smartphone->findAll());
        // hitung berapa page
        $totalPages = ceil($totalData / $perPage);
        // Mendapatkan nomor halaman saat ini
        $currentPage = $this->request->getVar('page') ?? 1;
        // Mendapatkan data dengan paging
        // mendapatkan data sort 
        $sortName = $this->request->getVar('name');
        $sortPrice = $this->request->getVar('price');
        $filterMin = $this->request->getVar('min');
        $filterMax = $this->request->getVar('max');
        if(isset($sortName)){
            $dataSort = '&name='.$sortName;
            $dataSmartphone = $this->smartphone->allDataSmartphonePaging($perPage, ($currentPage - 1) * $perPage, 'merek', $sortName, null);
        }else if(isset($sortPrice)){
            $dataSort = '&price='.$sortPrice;
            $dataSmartphone = $this->smartphone->allDataSmartphonePaging($perPage, ($currentPage - 1) * $perPage, 'harga', $sortPrice, null);
        }else if(isset($filterMin) && isset($filterMax) && $filterMin <= $filterMax){
            $dataSort = '&min='.$filterMin.'&max='. $filterMax;
            $dataSmartphone = $this->smartphone->allDataSmartphonePaging($perPage, ($currentPage - 1) * $perPage, 'filter', $filterMin, $filterMax);
            $hitung = $this->smartphone->allDataSmartphonePaging(null, null, 'filter', $filterMin, $filterMax);
            $totalData = count($hitung);
            $totalPages = ceil($totalData / $perPage);
            // dd($hitung);
        }else{
            $dataSort = '';
            $dataSmartphone = $this->smartphone->allDataSmartphonePaging($perPage, ($currentPage - 1) * $perPage, null, null, null);
        }
        
        $data = [
            'title' => 'Smartphone',
            'page' => 'smartphone',
            'smartphone' => $dataSmartphone,
            'totalPages' => $totalPages,
            'currentPage' => $currentPage,
            'sort' => $dataSort,
        ];
        return view('public/data-smartphone', $data);
    }

    public function detailSmartphone($slug = ''){
        $getSlug = str_replace("_", " ", $slug);
        $title = str_replace("-", " ", $getSlug);
        $findData = $this->smartphone->findBySlug($slug);
        if(!$findData){
            $data = [
                'message' => 'Halaman Detail Smartphone untuk ' . $getSlug . ' Tidak Ditemukan!'
            ];
            return view('errors/html/error_404', $data);
        }

        $data=[
            'title' => 'Detail '.$title,
            'page' => 'smartphone',
            'hasil' => $findData,

        ];
        return view('public/detail-smartphone', $data);
    }

    public function toko()
    {
        $perPage = 6;
        // hitung total data
        $totalData = count($this->toko->findAll());
        // hitung berapa page
        $totalPages = ceil($totalData / $perPage);
        // Mendapatkan nomor halaman saat ini
        $currentPage = $this->request->getVar('page') ?? 1;
        // Mendapatkan data dengan paging
        $dataToko = $this->toko->allDataTokoPaging($perPage, ($currentPage - 1) * $perPage);
        // Menyusun data untuk dikirim ke view
        $data = [
            'title' => "Toko",
            'page' => "toko",
            'toko' => $dataToko,
            'totalPages' => $totalPages,
            'currentPage' => $currentPage,
        ];
        return view('public/toko', $data);
    }
    
public function detailToko($slug = null){
    if(empty($slug)){
        session()->setFlashdata('error', 'Slug tidak boleh kosong!');
        return redirect()->to(base_url('toko')); // Sesuaikan dengan URL aplikasi Anda
    }
    
    // Memisahkan bagian pertama (nama toko) dan kedua (kecamatan-kota)
    $parts = explode('-', $slug, 2);
    
    if(count($parts) < 2){
        session()->setFlashdata('error', 'Format slug tidak valid!');
        return redirect()->to(base_url('toko')); // Sesuaikan dengan URL aplikasi Anda
    }
    
    $toko = str_replace('+', ' ', $parts[0]);
    $temp = $parts[1];
    
    // Memisahkan bagian kedua (kecamatan dan kota)
    $partsTemp = explode('-', $temp, 2);
    
    if(count($partsTemp) < 2){
        session()->setFlashdata('error', 'Format slug tidak valid!');
        return redirect()->to(base_url('toko'));
    }

    $kecamatan = str_replace('+', ' ', $partsTemp[0]);
    $kota = str_replace('+', ' ', $partsTemp[1]);
    
    // Query untuk mencari data toko berdasarkan nama_toko, kecamatan, dan kota
    $dataToko = $this->toko->where('nama_toko', $toko)
                            ->where('kecamatan', $kecamatan)
                            ->where('kota', $kota)
                            ->first();
    
    if(!$dataToko){
        session()->setFlashdata('error', 'Toko tidak ditemukan!');
        return redirect()->to(base_url('toko'));
    }
    $data = [
      'title' => "Detail Toko " . $dataToko['nama_toko'],
      'page' => "toko",
      'toko' => $dataToko,
    ];
    return view('public/detail-toko',$data);
}

    
    public function login(){
        $data = [
            'title' => 'Login',
        ];
        return view('public/login', $data);
    }
}
