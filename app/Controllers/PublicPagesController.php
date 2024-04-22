<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SmartphoneModel;
// use App\Models\BrandModel;
class PublicPagesController extends BaseController
{
    // protected $brandModel;
    protected $smartphone;
    function __construct(){
        // $this->brandModel = new  BrandModel();
        $this->smartphone = new SmartphoneModel();
    }

    public function index()
    {
        $data = [
        'page' => "dashboard",
        'title' => "SIRESE | Sistem Rekomendasi Smartphone"
        ];
        return view('public/dashboard', $data);
    }
    public function hasilCari()
    {
        $search = $this->request->getGet('search');
        // data per page
        $perPage = 6;
        // hitung total data
        $totalData = count($this->smartphone->findAll());
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
        ];
        return view('public/hasil-cari', $data);
    }
    public function smartphone()
    {
        // data per page
        $perPage = 6;
        // hitung total data
        $totalData = count($this->smartphone->findAll());
        // hitung berapa page
        $totalPages = ceil($totalData / $perPage);
        // Mendapatkan nomor halaman saat ini
        $currentPage = $this->request->getVar('page') ?? 1;
        // Mendapatkan data kesenian dengan paging
        $dataSmartphone = $this->smartphone->allDataSmartphonePaging($perPage, ($currentPage - 1) * $perPage);
        $data = [
            'title' => 'Smartphone',
            'page' => 'smartphone',
            'smartphone' => $dataSmartphone,
            'totalPages' => $totalPages,
            'currentPage' => $currentPage,
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

    public function rating()
    {
        // Menyusun data untuk dikirim ke view
        $data = [
            'title' => "Rating System",
            'page' => "rating",
        ];
        return view('public/rating', $data);
    }



    public function insertRating(){
        
    }
    
}
