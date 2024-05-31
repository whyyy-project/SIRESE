<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
  $routes->get('/', 'AdminPagesController::index');
  $routes->get('/master-data', 'AdminPagesController::index');
  $routes->get('/atur-bobot', 'AdminPagesController::index');
  $routes->get('/data-toko', 'AdminPagesController::index');
  $routes->get('/profil', 'AdminPagesController::index');
  $routes->get('/logout', 'AdminPagesController::logout');
}
else{
$routes->get('/', 'PublicPagesController::index');
$routes->get('/data-smartphone', 'PublicPagesController::smartphone');
$routes->get('/search', 'PublicPagesController::hasilCari');
$routes->get('/detail-smarthpone/(:segment)', 'PublicPagesController::detailSmartphone/$1');
$routes->get('/toko', 'PublicPagesController::toko');
$routes->get('/rekomendasi', 'RekomendasiController::index');
$routes->post('/rekomendasi/smart', 'RekomendasiController::hitung');
$routes->get('/login', 'PublicPagesController::login');
$routes->post('/login', 'PublicPagesController::auth');
}