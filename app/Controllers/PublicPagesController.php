<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\BrandModel;
class PublicPagesController extends BaseController
{
    protected $brandModel;
    function __construct(){
        $this->brandModel = new  BrandModel();

    }

    public function index()
    {
        $data = [
        'page' => "dashboard",
        ];
        return view('public/dashboard', $data);
    }
    public function rating()
    {


        // Menyusun data untuk dikirim ke view
        $data = [
            'page' => "rating",
            'brands' => $this->brandModel->findAll(),
        ];
        return view('public/rating', $data);
    }
    public function insertRating(){
        
    }
    
}
