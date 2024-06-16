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

    public function index($data = null)
    {
        $kriteria = $this->bobot->select('kriteria')->where('kriteria', $data)->countAllResults();

        if ($kriteria <= 1) {
            session()->setFlashdata('eror', 'Kriteria <strong>' . $data . '</strong> Tidak Ditemukan!');
            return redirect()->to('atur-konversi');
        } else {
              return $this->pages($data);
            }
        }

    public function pages($sub) 
    {
    $nilai = $this->request->getPost('nilai');
    $konversi = $this->request->getPost('konversi');
      if($nilai){
      $this->bobot->where('konversi', $konversi)->set('nilai', $nilai)->update();
      session()->setFlashdata('bobot', 'Berhasil mengubah data ' . $konversi);
      }
    $kriteria = $this->bobot->select('sub_kriteria')->where('kriteria', $sub)->distinct()->findAll();
    $build = $this->bobot->where('kriteria', $sub)->orderBy('CAST(konversi AS UNSIGNED)', 'asc')->findAll();
        $data = [
            'title' => 'Konversi '.ucfirst($sub),
            'text' => $sub,
            'kriteria' => $kriteria,
            'build' => $build,
            'page' => 'bobot',
        ];
        return view('admin/konversi/konversi', $data);
    }
  }

