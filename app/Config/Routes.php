<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index',['filter' => 'login']);
$routes->get('/', 'Pegawai::index');
$routes->get('/dashboard', 'Pegawai::dashboard');
$routes->get('export/pdf', 'Pegawai::pdf');
$routes->get('export/excel', 'Pegawai::excel');
$routes->get('/pegawai', 'Pegawai::index');
$routes->get('/pegawai/create', 'Pegawai::create');
$routes->post('/pegawai/store', 'Pegawai::store');
$routes->get('pegawai/edit/(:num)', 'Pegawai::edit/$1');
$routes->post('pegawai/update/(:num)', 'Pegawai::update/$1');
$routes->get('pegawai/delete/(:num)', 'Pegawai::delete/$1');

$routes->get('/buku', 'Buku::index');
$routes->get('/buku/create', 'Buku::create');
$routes->post('/buku/store', 'Buku::store');
$routes->get('/buku/edit/(:segment)', 'Buku::edit/$1');
$routes->post('/buku/update/(:segment)', 'Buku::update/$1');
$routes->post('/buku/delete/(:segment)', 'Buku::delete/$1');

$routes->get('/kelompok', 'Kelompok::index');
