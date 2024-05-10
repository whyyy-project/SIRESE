<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class RekomendasiController extends BaseController
{
    public function index()
    {
        $data =[
        'page' => 'rekomendasi',
        ];
        return view('public/rekomendasi.php', $data);
    }
}
