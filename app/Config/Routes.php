<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'PublicPagesController::index');
$routes->get('/data-smartphone', 'PublicPagesController::smartphone');
$routes->get('/rating', 'PublicPagesController::rating');
