<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

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
$routes->get('mapel_kategori', 'mapel_kategori::index');
$routes->add('mapel_kategori/add', 'mapel_kategori::add');
$routes->add('mapel_kategori/update', 'mapel_kategori::update');

//mapel_kelas
$routes->get('mapel_kelas', 'mapel_kelas::index');
$routes->add('mapel_kelas/add', 'mapel_kelas::add');
$routes->add('mapel_kelas/update', 'mapel_kelas::update');

//mapel_tipe
$routes->get('mapel_tipe', 'mapel_tipe::index');
$routes->add('mapel_tipe/add', 'mapel_tipe::add');
$routes->add('mapel_tipe/update', 'mapel_tipe::update');

//mapel
$routes->get('mapel', 'mapel::index');
$routes->add('mapel/add', 'mapel::add');
$routes->add('mapel/update', 'mapel::update');

//nilai_akhlaq_santri
$routes->get('nilai_akhlaq_santri', 'nilai_akhlaq_santri::index');
$routes->add('nilai_akhlaq_santri/add', 'nilai_akhlaq_santri::add');
$routes->add('nilai_akhlaq_santri/update', 'nilai_akhlaq_santri::update');

//nilai_santri
$routes->get('nilai_santri', 'nilai_santri::index');
$routes->add('nilai_santri/add', 'nilai_santri::add');
$routes->add('nilai_santri/update', 'nilai_santri::update');

//siswa_kelas
$routes->get('siswa_kelas', 'siswa_kelas::index');
$routes->add('siswa_kelas/add', 'Siswa_kelas::add');
$routes->add('siswa_kelas/update', 'Siswa_kelas::update');

//tahun_ajaran
$routes->get('tahun_ajaran', 'tahun_ajaran::index');
$routes->add('tahun_ajaran/add', 'tahun_ajaran::add');
$routes->add('tahun_ajaran/update', 'tahun_ajaran::update');

//semester
$routes->get('semester', 'semester::index');
$routes->add('semester/add', 'semester::add');
$routes->add('semester/update', 'semester::update');

//tbl01
$routes->get('tingkat', 'tingkat::index');
$routes->add('tingkat/add', 'tbl01::add'); 
$routes->add('tingkat/update', 'tbl01::update');

//menu
$routes->get('menu', 'menu::index');
$routes->add('menu/add', 'menu::add');
$routes->add('menu/update', 'menu::update');

//menu_kategori
$routes->get('menu_kategori', 'menu_kategori::index');
$routes->add('menu_kategori/add', 'menu_kategori::add');
$routes->add('menu_kategori/update', 'menu_kategori::update');

// Tagihan
$routes->get('tagihan', 'tagihan::index');
$routes->add('terimaPembayaran', 'TagihanDetail::terimaLunas');
$routes->add('terimaCicilan', 'TagihanDetail::terimaCicilan');
$routes->add('editJumlahTagihan', 'TagihanDetail::editJumlahTagihan');
$routes->add('tagihanDetail/generate', 'TagihanDetail::generate');
$routes->add('add1Tagihan', 'TagihanDetail::add1Tagihan');


$routes->get('tagihanDetail/index2', 'tagihanDetail::index2');
$routes->get('tagihanPeriode', 'tagihanPeriode::index');
$routes->get('tagihanPeriode/add', 'TagihanPeriode::add');
$routes->get('tagihan/rekapsantri', 'tagihan::rekapsantri');
$routes->get('tagihan/rekapbulan/(:any)', 'tagihan::rekapbulan');


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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
