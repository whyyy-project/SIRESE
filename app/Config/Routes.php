<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->group('', ['filter' => 'umum'], function ($routes) {
// Rute-rute untuk pengguna umum
$routes->get('/', 'PublicPagesController::index');
$routes->get('data-smartphone', 'PublicPagesController::smartphone');
$routes->get('search', 'PublicPagesController::hasilCari');
$routes->get('detail-smarthpone/(:segment)', 'PublicPagesController::detailSmartphone/$1');
$routes->get('toko', 'PublicPagesController::toko');
$routes->get('rekomendasi', 'RekomendasiController::index');
$routes->post('rekomendasi/smart', 'RekomendasiController::hitung');
$routes->get('login', 'PublicPagesController::login');
$routes->post('login', 'LoginController::index');
});
// Grup rute untuk admin
$routes->group('', ['filter' => 'admin'], function ($routes) {
  // view
    $routes->get('/', 'AdminPagesController::index');
    $routes->get('/dashboard', 'AdminPagesController::index');
    $routes->get('master-data/tambah', 'AdminPagesController::tambahSmartphone');
    $routes->get('master-data', 'AdminPagesController::master');
    $routes->get('atur-konversi/body', 'KonversiController::body');
    $routes->get('atur-konversi', 'BobotController::bobot');
    $routes->get('data-toko', 'AdminPagesController::toko');
    $routes->get('profil', 'AdminPagesController::profil');
    $routes->get('logout', 'LoginController::logout');
    $routes->get('harga', 'BobotController::harga');

});
