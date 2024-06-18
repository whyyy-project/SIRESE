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
          return redirect()->to(base_url('login'));
        }
        else{
          $dataUser = $this->user->where('username', $uname)->first();
          if ($dataUser && password_verify($pass, $dataUser['password'])) {
            // return "berhasil";
            $sessionData = [
              'id' => $dataUser['id'],
              'nama' => $dataUser['nama'],
              'username' => $dataUser['username'],
              'password' => $dataUser['password'],
              'LoggedIn' => true,
            ];
            session()->set($sessionData);
            session()->setFlashdata('login', 'Selamat datang ' . $dataUser['nama']);
            return redirect()->to(base_url('/'));
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
        return redirect()->to(base_url('/login'));
    }

    public function profilNama(){
      $nama = $this->request->getPost('nama');
      if(strlen($nama) < 5){
        return redirect()->back()->with('error', 'Panjang nama minimal 5 digit!');
      }
      $namaUser = [
        'nama' => $nama,
      ];
      $update = $this->user->update(session()->get('id'), $namaUser);
      session()->set('nama', $nama);
      if($update){
        return redirect()->back()->with('success', 'Berhasil Mengubah Nama.');
      }else{
        return redirect()->back()->with('error', 'Gagal Mengubah Nama!');
      }
    }
    public function profilUsername(){
      $username = $this->request->getPost('username');
      $pass = $this->request->getPost('password');
      if(strlen($username) < 7){
        return redirect()->back()->with('error', 'Panjang username minimal 8 digit!');
      }
      $usernameUser = [
        'username' => $username,
      ];
      $cek = $this->user->where('id',session()->get('id'))->first();
      if ($cek && password_verify($pass, $cek['password'])) {
        $update = $this->user->update(session()->get('id'), $usernameUser);
        session()->set('username', $username);
        if($update){
          return redirect()->back()->with('success', 'Berhasil Mengubah Username.');
        }else{
          return redirect()->back()->with('error', 'Gagal Mengubah Username!');
        }
      }else{
        return redirect()->back()->with('error', 'Gagal Mengubah Username!');
      }
    }
    public function profilPassword(){
      $pwNew1 = $this->request->getPost('pwNew1');
      $pwNew2 = $this->request->getPost('pwNew2');
      $pass = $this->request->getPost('confirmPw');
    if($pwNew1 != $pwNew2){
      // echo "beda";
      return redirect()->back()->with('error', 'Password baru yang dimasukan tidak sama!');
    }
      if(strlen($pass) < 7){
        return redirect()->back()->with('error', 'Panjang Password minimal 8 digit!');
      }
      $paswordUser = [
        'password' => password_hash($pwNew1, PASSWORD_DEFAULT),
      ];
      $cek = $this->user->where('id',session()->get('id'))->first();
      if ($cek && password_verify($pass, $cek['password'])) {
        $update = $this->user->update(session()->get('id'), $paswordUser);
        if($update){
          return redirect()->back()->with('success', 'Berhasil Mengubah Password.');
        }else{
          return redirect()->back()->with('error', 'Gagal Mengubah Password!');
        }
      }
      else{
        return redirect()->back()->with('error', 'Konfirmasi Password Lama Salah!');
      }
    }
}
