<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BobotModel;
use CodeIgniter\HTTP\ResponseInterface;

class KonversiController extends BaseController
{
  public $bobot;
  function __construct()
  {
    $this->bobot = new BobotModel();
  }
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
    public function bobot($data = null){
    $kriteria = $this->bobot->distinct()->select('kriteria')->where('kriteria', $data)->first();

      if($kriteria != 1){
      session()->setFlashdata('eror', 'Kriteria Tidak Ditemukan!');
          return redirect()->to('atur-konversi');
      }else{
        switch($data){
        case 'body':
          $this->body();
          break;
        case 'lcd':
          $this->lcd();
          break;
        case 'memori':
          $this->memori();
          break;
        default:
          $this->body();
          break;
        }
      }
    }
    public function lcd(){
    echo "LCD";
    }
    public function memori(){
    echo "LCD";
    }
}
