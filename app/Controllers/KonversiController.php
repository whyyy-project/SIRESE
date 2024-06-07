<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class KonversiController extends BaseController
{
    public function index()
    {
        //
    }
    public function body(){
    $data = [
      'title' => 'Konversi Body',
      'page' => 'bobot',
    ];
    return view('admin/konversi/body', $data);
    }
}
