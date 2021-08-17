<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/edit-buku/(:segment)', 'Buku::editBuku/$1');
$routes->get('/list-buku', 'Buku::index');
$routes->get('/tambah-buku', 'Buku::TambahBuku');
$routes->delete('/buku/(:num)', 'Buku::delete/$1');
$routes->get('/list-angota', 'Anggota::index');
$routes->get('/daftar-anggota', 'Anggota::daftarAnggota');
$routes->delete('/hapus-anggota/(:num)', 'Anggota::delete/$1');
$routes->get('/edit-anggota/(:segment)', 'Anggota::editAnggota/$1');
$routes->get('/pinjaman', 'Pinjaman::pengembalian');
$routes->get('/proses-pinjam/(:segment)', 'Pinjaman::prosespinjam/$1');
$routes->get('/proses-pengembalian', 'Pinjaman::pengembalian');
$routes->get('/list-pengembalian', 'Pengembalian::index');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
