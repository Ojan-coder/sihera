<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/about', 'Home::abouts');
$routes->get('/treatment', 'Home::treatments');
$routes->get('/doktor', 'Home::dokters');
$routes->get('/testimonial', 'Home::testimonials');
$routes->get('/contact', 'Home::contacts');
$routes->get('/register', 'Home::registers');


$routes->get('/Home', 'HomeController::index', ['filter' => 'auth']);
$routes->post('/update-profile', 'HomeController::updateprofile');
$routes->post('/change-password', 'HomeController::changepassword');

// Login
$routes->get('/login', 'LoginController::index');
$routes->get('/login/profil', 'LoginController::profil');
$routes->get('/login', 'LoginController::index');
$routes->post('/login/ceklogin', 'LoginController::ceklogin');
$routes->get('/logout', 'LoginController::logout', ['filter' => 'auth']);


// Dokter
$routes->get('/docter', 'DokterController::index', ['filter' => 'auth']);
$routes->get('/docter/add', 'DokterController::add', ['filter' => 'auth']);
$routes->get('/docter/update/(:segment)', 'DokterController::update/$1', ['filter' => 'auth']);
$routes->post('/docter/save', 'DokterController::save', ['filter' => 'auth']);
$routes->post('/docter/edit', 'DokterController::edit', ['filter' => 'auth']);
$routes->post('/docter/delete', 'DokterController::delete', ['filter' => 'auth']);
// $routes->get('image/deleteImage/(:any)', 'ImageController::deleteImage/$1');
$routes->get('/docter/report', 'DokterController::report', ['filter' => 'auth']);

// Jadwal
$routes->get('/jadwal', 'JadwalController::index', ['filter' => 'auth']);
$routes->get('/jadwal/add', 'JadwalController::add', ['filter' => 'auth']);
$routes->get('/jadwal/update/(:segment)', 'JadwalController::update/$1', ['filter' => 'auth']);
$routes->post('/jadwal/save', 'JadwalController::save', ['filter' => 'auth']);
$routes->post('/jadwal/edit', 'JadwalController::edit', ['filter' => 'auth']);
$routes->post('/jadwal/delete', 'JadwalController::delete', ['filter' => 'auth']);
// $routes->get('image/deleteImage/(:any)', 'ImageController::deleteImage/$1');
$routes->get('/jadwal/report', 'JadwalController::report', ['filter' => 'auth']);


// Patient
$routes->get('/patient', 'PasienController::index', ['filter' => 'auth']);
$routes->get('/patient/add', 'PasienController::add', ['filter' => 'auth']);
$routes->get('/patient/update/(:segment)', 'PasienController::update/$1', ['filter' => 'auth']);
$routes->post('/pasien/regis', 'PasienController::register');
$routes->post('/patient/save', 'PasienController::save', ['filter' => 'auth']);
$routes->post('/patient/edit', 'PasienController::edit', ['filter' => 'auth']);
$routes->post('/patient/delete', 'PasienController::delete', ['filter' => 'auth']);
// $routes->get('image/deleteImage/(:any)', 'ImageController::deleteImage/$1');
$routes->get('/patient/report', 'PasienController::report', ['filter' => 'auth']);

// Edukasi
$routes->get('/education', 'EdukasiController::index', ['filter' => 'auth']);
$routes->get('/education/add', 'EdukasiController::add', ['filter' => 'auth']);
$routes->get('/education/update/(:segment)', 'EdukasiController::update/$1', ['filter' => 'auth']);
$routes->post('/education/save', 'EdukasiController::save', ['filter' => 'auth']);
$routes->post('/education/edit', 'EdukasiController::edit', ['filter' => 'auth']);
$routes->post('/education/delete', 'EdukasiController::delete', ['filter' => 'auth']);
// $routes->get('image/deleteImage/(:any)', 'ImageController::deleteImage/$1');
$routes->get('/education/report', 'EdukasiController::report', ['filter' => 'auth']);

// Aktifitas
$routes->get('/aktifitas', 'AktifitasController::index', ['filter' => 'auth']);
$routes->get('/aktifitas/add', 'AktifitasController::add', ['filter' => 'auth']);
$routes->get('/aktifitas/update/(:segment)', 'AktifitasController::update/$1', ['filter' => 'auth']);
$routes->post('/aktifitas/save', 'AktifitasController::save', ['filter' => 'auth']);
$routes->post('/aktifitas/edit', 'AktifitasController::edit', ['filter' => 'auth']);
$routes->post('/aktifitas/delete', 'AktifitasController::delete', ['filter' => 'auth']);
// $routes->get('image/deleteImage/(:any)', 'ImageController::deleteImage/$1');
$routes->get('/aktifitas/report', 'AktifitasController::report', ['filter' => 'auth']);

// Konsultasi
$routes->get('/konsultasi', 'KonsultasiController::index', ['filter' => 'auth']);
$routes->get('/konsultasi/add', 'KonsultasiController::add', ['filter' => 'auth']);
$routes->get('/konsultasi/update/(:segment)', 'KonsultasiController::update/$1', ['filter' => 'auth']);
$routes->post('/konsultasi/save', 'KonsultasiController::save', ['filter' => 'auth']);
$routes->post('/konsultasi/edit', 'KonsultasiController::edit', ['filter' => 'auth']);
$routes->post('/konsultasi/delete', 'KonsultasiController::delete', ['filter' => 'auth']);
// $routes->get('image/deleteImage/(:any)', 'ImageController::deleteImage/$1');
$routes->get('/konsultasi/report', 'KonsultasiController::report', ['filter' => 'auth']);

// Berat Badan
$routes->get('/bb', 'CatatanBBController::index', ['filter' => 'auth']);
$routes->get('/bb/add', 'CatatanBBController::add', ['filter' => 'auth']);
$routes->get('/bb/update/(:segment)', 'CatatanBBController::update/$1', ['filter' => 'auth']);
$routes->post('/bb/save', 'CatatanBBController::save', ['filter' => 'auth']);
$routes->post('/bb/edit', 'CatatanBBController::edit', ['filter' => 'auth']);
$routes->post('/bb/delete', 'CatatanBBController::delete', ['filter' => 'auth']);
// $routes->get('image/deleteImage/(:any)', 'ImageController::deleteImage/$1');
$routes->get('/bb/report', 'CatatanBBController::report', ['filter' => 'auth']);

// Catatan Diet
$routes->get('/diet', 'CatatanDietController::index', ['filter' => 'auth']);
$routes->get('/diet/add', 'CatatanDietController::add', ['filter' => 'auth']);
$routes->get('/diet/update/(:segment)', 'CatatanDietController::update/$1', ['filter' => 'auth']);
$routes->post('/diet/save', 'CatatanDietController::save', ['filter' => 'auth']);
$routes->post('/diet/savedetail', 'CatatanDietController::savep', ['filter' => 'auth']);
$routes->post('/diet/editdetail', 'CatatanDietController::editp', ['filter' => 'auth']);
$routes->post('/diet/edit', 'CatatanDietController::edit', ['filter' => 'auth']);
$routes->post('/diet/delete', 'CatatanDietController::delete', ['filter' => 'auth']);
// $routes->get('image/deleteImage/(:any)', 'ImageController::deleteImage/$1');
$routes->get('/diet/report', 'CatatanDietController::report', ['filter' => 'auth']);

// Catatan Urine
$routes->get('/urine', 'CatatanUrineController::index', ['filter' => 'auth']);
$routes->get('/urine/add', 'CatatanUrineController::add', ['filter' => 'auth']);
$routes->get('/urine/update/(:segment)', 'CatatanUrineController::update/$1', ['filter' => 'auth']);
$routes->post('/urine/save', 'CatatanUrineController::save', ['filter' => 'auth']);
$routes->post('/urine/savepasien', 'CatatanUrineController::savep', ['filter' => 'auth']);
$routes->post('/urine/edit', 'CatatanUrineController::edit', ['filter' => 'auth']);
$routes->post('/urine/editdetail', 'CatatanUrineController::editp', ['filter' => 'auth']);
$routes->post('/urine/delete', 'CatatanUrineController::delete', ['filter' => 'auth']);
// $routes->get('image/deleteImage/(:any)', 'ImageController::deleteImage/$1');
$routes->get('/urine/report', 'CatatanUrineController::report', ['filter' => 'auth']);


// Catatan Urine
$routes->get('/cairan', 'PembatasanCairanController::index', ['filter' => 'auth']);
$routes->get('/cairan/add', 'PembatasanCairanController::add', ['filter' => 'auth']);
$routes->get('/cairan/update/(:segment)', 'PembatasanCairanController::update/$1', ['filter' => 'auth']);
$routes->post('/cairan/save', 'PembatasanCairanController::save', ['filter' => 'auth']);
$routes->post('/cairan/detailsave', 'PembatasanCairanController::savedetail', ['filter' => 'auth']);
$routes->post('/cairan/edit', 'PembatasanCairanController::edit', ['filter' => 'auth']);
$routes->post('/cairan/delete', 'PembatasanCairanController::delete', ['filter' => 'auth']);
// $routes->get('image/deleteImage/(:any)', 'ImageController::deleteImage/$1');
$routes->get('/cairan/report', 'PembatasanCairanController::report', ['filter' => 'auth']);
