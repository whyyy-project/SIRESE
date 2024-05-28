<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SmartphoneModel;
use CodeIgniter\HTTP\ResponseInterface;

class RekomendasiController extends BaseController
{

    protected $smartphone;
    function __construct(){
        // $this->brandModel = new  BrandModel();
        $this->smartphone = new SmartphoneModel;
    }



    public function index()
    {
        $data =[
        'page' => 'rekomendasi',
        ];
        return view('public/rekomendasi.php', $data);
    }
    public function hitung(){
        
        // Mendapatkan data kesenian dengan paging
        $dataSmartphone = $this->smartphone->findAll();
        $data = [
            'title' => 'Hasil Pencarian',
            'page' => 'rekomendasi',
            'smartphone' => $dataSmartphone,
        ];
        return view('public/hasil-perhitungan.php', $data);
    }
}
