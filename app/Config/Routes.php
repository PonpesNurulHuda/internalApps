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

//santri
$routes->get('/santri', 'Santri::index');
$routes->add('santri/add', 'santri::add');
$routes->add('santri/update', 'santri::update');

//kelas
$routes->get('/kelas', 'Kelas::index');
$routes->add('kelas/add', 'kelas::add');
$routes->add('kelas/update', 'kelas::update');

//mapel_kategori
$routes->add('mapel_kategori/add', 'mapel_kategori::add');
$routes->add('mapel_kategori/update', 'mapel_kategori::update');


//mapel_kelas
$routes->add('mapel_kelas/add', 'mapel_kelas::add');
$routes->add('mapel_kelas/update', 'mapel_kelas::update');

//mapel_tipe
$routes->add('mapel_tipe/add', 'mapel_tipe::add');
$routes->add('mapel_tipe/update', 'mapel_tipe::update');

//mapel
$routes->add('mapel/add', 'mapel::add');
$routes->add('mapel/update', 'mapel::update');

//nilai_akhlaq_santri
$routes->add('nilai_akhlaq_santri/add', 'nilai_akhlaq_santri::add');
$routes->add('nilai_akhlaq_santri/update', 'nilai_akhlaq_santri::update');

//nilai_santri
$routes->add('nilai_santri/add', 'nilai_santri::add');
$routes->add('nilai_santri/update', 'nilai_santri::update');

//siswa_kelas
$routes->add('siswa_kelas/add', 'Siswa_kelas::add');
$routes->add('siswa_kelas/update', 'Siswa_kelas::update');

//tahun_ajaran
$routes->add('tahun_ajaran/add', 'tahun_ajaran::add');
$routes->add('tahun_ajaran/update', 'tahun_ajaran::update');

//semester
$routes->add('semester/add', 'semester::add');
$routes->add('semester/update', 'semester::update');

//tbl01
$routes->add('tbl01/add', 'tbl01::add'); 
$routes->add('tbl01/update', 'tbl01::update');

//menu
$routes->add('menu/add', 'menu::add');
$routes->add('menu/update', 'menu::update');

//menu_kategori
$routes->add('menu_kategori/add', 'menu_kategori::add');
$routes->add('menu_kategori/update', 'menu_kategori::update');

// Tagihan
$routes->add('terimaPembayaran', 'TagihanDetail::terimaLunas');
$routes->add('terimaCicilan', 'TagihanDetail::terimaCicilan');
$routes->add('editJumlahTagihan', 'TagihanDetail::editJumlahTagihan');
$routes->add('tagihanDetail/generate', 'TagihanDetail::generate');
$routes->add('add1Tagihan', 'TagihanDetail::add1Tagihan');

// Login
$routes->get('/login', 'Auth::index');
$routes->add('/login', 'Auth::auth');

//
$routes->get('/dashboard', 'Home::index',['filter' => 'auth']);
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
