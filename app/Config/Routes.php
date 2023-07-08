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

$routes->get('/berita/(:num)', 'Berita::index/$1');
$routes->get('/berita/view/(:any)/(:num)', 'Berita::view_berita/$1/$2');
$routes->get('/galeri/(:num)', 'Galeri::index/$1');
$routes->get('/tentang', 'Tentang::index');
$routes->get('/tim/(:num)', 'Tim::index/$1');
$routes->get('/kontak', 'Kontak::index');

$routes->get('/admin', 'Admin::index');
$routes->post('/admin/login', 'Admin::login');
$routes->get('/admin/logout', 'Admin::logout');
$routes->get('/admin/dashboard', 'Admin::dashboard');

$routes->get('/admin/berita/(:num)', 'Berita::admin_berita/$1');
$routes->get('/admin/berita/tambah', 'Berita::tambah_berita');
$routes->post('/admin/berita/add', 'Berita::add_berita');
$routes->get('/admin/berita/edit/(:num)', 'Berita::edit_berita/$1');
$routes->post('/admin/berita/save/(:num)', 'Berita::save_berita/$1');
$routes->get('/admin/berita/hapus/(:num)', 'Berita::hapus_berita/$1');
$routes->get('/admin/berita/hapus_semua', 'Berita::hapus_semua_berita');

$routes->get('/admin/komentar/(:num)', 'Komentar::index/$1');
$routes->post('komentar/add', 'Komentar::add_komentar');
$routes->post('subkomentar/add', 'Komentar::add_subkomentar');
$routes->get('admin/pesan/view/(:num)', 'Pesan::view_pesan/$1');
$routes->get('/admin/pesan/hapus/(:num)', 'Pesan::hapus_pesan/$1');
$routes->get('/admin/pesan/hapus_semua', 'Pesan::hapus_semua_pesan');

$routes->get('/admin/galeri/(:num)', 'Galeri::admin_galeri/$1');
$routes->get('/admin/galeri/tambah', 'Galeri::tambah_galeri');
$routes->get('/admin/galeri/edit/(:num)', 'Galeri::edit_galeri/$1');
$routes->post('/admin/galeri/add', 'Galeri::add_galeri');
$routes->post('/admin/galeri/save/(:num)', 'Galeri::save_galeri/$1');
$routes->get('/admin/galeri/hapus/(:num)', 'Galeri::hapus_galeri/$1');
$routes->get('/admin/galeri/hapus_semua', 'Galeri::hapus_semua_galeri');

$routes->get('/admin/pesan/(:num)', 'Pesan::index/$1');
$routes->post('pesan/add', 'Pesan::add_pesan');
$routes->get('admin/pesan/view/(:num)', 'Pesan::view_pesan/$1');
$routes->get('/admin/pesan/hapus/(:num)', 'Pesan::hapus_pesan/$1');
$routes->get('/admin/pesan/hapus_semua', 'Pesan::hapus_semua_pesan');

$routes->get('/admin/tim/(:num)', 'Tim::admin_tim/$1');
$routes->get('/admin/tim/tambah', 'Tim::tambah_tim');
$routes->get('/admin/tim/edit/(:num)', 'Tim::edit_tim/$1');
$routes->get('/admin/tim/edit_semat', 'Tim::edit_semat');
$routes->post('/admin/tim/save_semat', 'Tim::save_semat');
$routes->post('/admin/tim/add', 'Tim::add_tim');
$routes->post('/admin/tim/save/(:num)', 'Tim::save_tim/$1');
$routes->get('/admin/tim/hapus/(:num)', 'Tim::hapus_tim/$1');
$routes->get('/admin/tim/hapus_semua', 'Tim::hapus_semua_tim');

$routes->get('/admin/kontak', 'Kontak::admin_kontak');
$routes->get('/admin/kontak/edit', 'Kontak::edit_kontak');
$routes->post('/admin/kontak/save', 'Kontak::save_kontak');
$routes->get('/admin/kontak/hapus', 'Kontak::hapus_kontak');

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
