<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'PublicPagesController::index');
$routes->get('/data-smartphone', 'PublicPagesController::smartphone');
$routes->get('/search', 'PublicPagesController::hasilCari');
$routes->get('/detail-smarthpone/(:segment)', 'PublicPagesController::detailSmartphone/$1');
$routes->get('/toko', 'PublicPagesController::toko');
$routes->get('/rekomendasi', 'RekomendasiController::index');
$routes->post('/rekomendasi/smart', 'MetodeSMARTController::index');
$routes->get('/login', 'PublicPagesController::login');

