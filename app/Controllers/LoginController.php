<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class LoginController extends BaseController
{
  public $user;
  function __construct(){
    $this->user = new UserModel();
  }
    public function index()
    { 
      $login = $this->request->getPost('login');
      $uname = $this->request->getPost('username');
      $pass = $this->request->getPost('password');
      if(isset($login)){
        if($uname == '' or $pass == ''){
          session()->setFlashdata('uname', $uname);
          session()->setFlashdata('error', 'Harap masukan username atau password!');
          return redirect()->to('login');
        }
        else{
          $dataUser = $this->user->where('username', $uname)->first();
          if ($dataUser && password_verify($pass, $dataUser['password'])) {
            // return "berhasil";
            $sessionData = [
              'nama' => $dataUser['nama'],
              'username' => $dataUser['username'],
              'password' => $dataUser['password'],
              'LoggedIn' => true,
            ];
            session()->set($sessionData);
            session()->setFlashdata('login', 'Selamat datang ' . $dataUser['nama']);
            return redirect()->to('/');
          }
          else {
              session()->setFlashdata('uname', $uname);
              return redirect()->back()->with('error', 'Password salah!');
          }
        }
      }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
