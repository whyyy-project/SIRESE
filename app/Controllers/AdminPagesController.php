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
    public function master()
    {
    $data = [
      'title' => 'SIRESE | Welcome Admin',
      'page' => 'dashboard',
    ];
    return view('admin/dashboard', $data);
    
    }
    public function bobot()
    {
    $data = [
      'title' => 'SIRESE | Welcome Admin',
      'page' => 'dashboard',
    ];
    return view('admin/dashboard', $data);
    
    }
    public function toko()
    {
    $data = [
      'title' => 'Welcome Admin',
      'page' => 'dashboard',
    ];
    return view('admin/dashboard', $data);
    
    }
    public function profil()
    {
    $data = [
      'title' => 'Welcome Admin',
      'page' => 'dashboard',
    ];
    return view('admin/dashboard', $data);
    
    }
    public function logout()
    {
      $session = session();
      $session->destroy();
      
     return redirect()->to(site_url(''));
    
    }
}
