<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SmartphoneModel;
use CodeIgniter\HTTP\ResponseInterface;
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
        ];
        return view('public/dashboard', $data);
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


    public function rating()
    {
        // Menyusun data untuk dikirim ke view
        $data = [
            'page' => "rating",
        ];
        return view('public/rating', $data);
    }



    public function insertRating(){
        
    }
    
}
