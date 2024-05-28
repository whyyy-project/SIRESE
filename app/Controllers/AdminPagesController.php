<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AdminPagesController extends BaseController
{
    public function index()
    {
    $data = [
      'title' => 'SIRESE | Welcome Admin',
      'page' => 'dashboard',
    ];
    return view('admin/dashboard', $data);
    
    }
}
