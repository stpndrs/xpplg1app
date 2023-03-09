<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
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
$routes->get('/jadwal', 'Jadwal::JadwalPelajaran');

$routes->get('/admin', 'Admin::index', ['filter' => 'role:1']);
$routes->get('/admin/JadwalPelajaran', 'Admin::JadwalPelajaran', ['filter' => 'role:1']);
$routes->get('/admin/JadwalPAS', 'Admin::JadwalPAS', ['filter' => 'role:1']);
$routes->get('/admin/JadwalPiket', 'Admin::JadwalPiket', ['filter' => 'role:1']);
$routes->get('/admin/berita', 'Admin::berita', ['filter' => 'role:1']);
$routes->get('/admin/galeri', 'Admin::galeri', ['filter' => 'role:1']);
$routes->get('/admin/siswa', 'Admin::siswa', ['filter' => 'role:1']);
$routes->get('/admin/setting', 'Admin::setting', ['filter' => 'role:1']);

// CRUD HOME
$routes->get('/admin/editHome/(:segment)', 'Admin::editHome/$1', ['filter' => 'role:1']);
$routes->get('/admin/updateHome/(:segment)', 'Admin::updateHome/$1', ['filter' => 'role:1']);
$routes->get('/admin/deleteHome/(:segment)', 'Admin::deleteHome/$1', ['filter' => 'role:1']);

// CRUD BERITA
$routes->get('/admin/addBerita', 'Admin::addBerita', ['filter' => 'role:1']);
$routes->get('/admin/editBerita/(:segment)', 'Admin::editBerita/$1', ['filter' => 'role:1']);
$routes->get('/admin/updateBerita/(:segment)', 'Admin::updateBerita/$1', ['filter' => 'role:1']);
$routes->get('/admin/deleteBerita/(:segment)', 'Admin::deleteBerita/$1', ['filter' => 'role:1']);

// CRUD GALERI
$routes->get('/admin/addGaleri', 'Admin::addGaleri', ['filter' => 'role:1']);
$routes->get('/admin/editGaleri/(:segment)', 'Admin::editGaleri/$1', ['filter' => 'role:1']);
$routes->get('/admin/updateGaleri/(:segment)', 'Admin::updateGaleri/$1', ['filter' => 'role:1']);
$routes->get('/admin/deleteGaleri/(:segment)', 'Admin::deleteGaleri/$1', ['filter' => 'role:1']);

// CRUD JGMEET
$routes->get('/admin/editJgmeet/(:segment)', 'Admin::editJgmeet/$1', ['filter' => 'role:1']);
$routes->get('/admin/updateJgmeet/(:segment)', 'Admin::updateJgmeet/$1', ['filter' => 'role:1']);
$routes->get('/admin/editJtugas/(:segment)', 'Admin::editJtugas/$1', ['filter' => 'role:1']);
$routes->get('/admin/updateJtugas/(:segment)', 'Admin::updateJtugas/$1', ['filter' => 'role:1']);

// CRUD JPIK
$routes->get('/admin/addJpik', 'Admin::addJpik', ['filter' => 'role:1']);
$routes->get('/admin/editJpik/(:segment)', 'Admin::editJpik/$1', ['filter' => 'role:1']);
$routes->get('/admin/updateJpik/(:segment)', 'Admin::updateJpik/$1', ['filter' => 'role:1']);
$routes->get('/admin/deleteJpik/(:segment)', 'Admin::deleteJpik/$1', ['filter' => 'role:1']);

// CRUD JPAS
$routes->get('/admin/addJpas', 'Admin::addJpas', ['filter' => 'role:1']);
$routes->get('/admin/editJpas/(:segment)', 'Admin::editJpas/$1', ['filter' => 'role:1']);
$routes->get('/admin/updateJpas/(:segment)', 'Admin::updateJpas/$1', ['filter' => 'role:1']);
$routes->get('/admin/deleteJpas/(:segment)', 'Admin::deleteJpas/$1', ['filter' => 'role:1']);

// CRUD SISWA
$routes->get('/admin/addSiswa', 'Admin::addSiswa', ['filter' => 'role:1']);
$routes->get('/admin/editSiswa/(:segment)', 'Admin::editSiswa/$1', ['filter' => 'role:1']);
$routes->get('/admin/updateSiswa/(:segment)', 'Admin::updateSiswa/$1', ['filter' => 'role:1']);
$routes->get('/admin/deleteSiswa/(:segment)', 'Admin::deleteSiswa/$1', ['filter' => 'role:1']);


// $routes->get('/bendahara', 'Bendahara::index', ['filter' => 'role:admin']);

$routes->get('/bendahara', 'Bendahara::index', ['filter' => 'role:1,2']);

$routes->get('/bendahara/transaksi', 'Bendahara::transaksi', ['filter' => 'role:1,2']);

$routes->get('/bendahara/datakas', 'Bendahara::datakas', ['filter' => 'role:1,2']);

$routes->get('/bendahara/laporan', 'Bendahara::laporan', ['filter' => 'role:1,2']);

// CRUD TRANSAKSI

$routes->get('/bendahara/addTrans', 'Bendahara::addTrans', ['filter' => 'role:1,2']);

$routes->get('/bendahara/editTransaksi/(:segment)', 'Bendahara::editTransaksi/$1', ['filter' => 'role:1,2']);
$routes->get('/bendahara/updateTransaksi/(:segment)', 'Bendahara::updateTransaksi/$1', ['filter' => 'role:1,2']);


$routes->get('/bendahara/deleteTransaksi/(:segment)', 'Bendahara::deleteTransaksi/$1', ['filter' => 'role:1,2']);

// CRUD KAS
$routes->get('/bendahara/addKas', 'Bendahara::addKas', ['filter' => 'role:1,2']);

$routes->get('/bendahara/editKas/(:segment)', 'Bendahara::editKas/$1', ['filter' => 'role:1,2']);
$routes->get('/bendahara/updateKas/(:segment)', 'Bendahara::updateKas/$1', ['filter' => 'role:1,2']);

$routes->get('/bendahara/deleteDatakas/(:segment)', 'Bendahara::deleteDatakas/$1', ['filter' => 'role:1,2']);

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
