<?php

use CodeIgniter\Router\RouteCollection;


/**
 * @var RouteCollection $routes
 */
$routes->setDefaultMethod('index');
$routes->get('/', 'Home::index');

$routes->group('', ['filter' => 'role:admin'], function ($routes) {
    $routes->get('/antrean_berjalan', 'AdminController::index');
    $routes->get('/approval_antrean', 'AdminController::indexMahasiswa');
    $routes->get('/approval_antrean/approve', 'AdminController::approve');
    $routes->get('/approval_antrean/reject', 'AdminController::reject');
    $routes->get('/approval_antrean/detail', 'AdminController::detailMahasiswa');
    $routes->get('/approval_antrean/edit', 'AdminController::editMahasiswa');
    $routes->post('/approval_antrean/update/(:num)', 'AdminController::updateMahasiswa/$1');
    $routes->get('/delete_mahasiswa/(:num)', 'AdminController::deleteMahasiswa/$1');
    $routes->get('/profil', 'AdminController::indexProfil');
    $routes->post('/updateProfil/(:num)', 'AdminController::updateProfil/$1');
    $routes->get('/kelola_antrean', 'AdminController::indexAntrean');
    $routes->post('/tambah_mahasiswa', 'AdminController::addMahasiswa');
    $routes->post('/tambah_antrean', 'AdminController::addAntrean');
    $routes->get('/delete_antrean/(:num)', 'AdminController::deleteAntrean/$1');
    $routes->get('/kelola_antrean/edit', 'AdminController::editAntrean');
    $routes->post('/kelola_antrean/update/(:num)', 'AdminController::updateAntrean/$1');
    $routes->get('next_queue', 'AdminController::nextAntrean');
    $routes->get('reset_queue', 'AdminController::resetAntrean');
});

$routes->group('mahasiswa', ['filter' => 'role:mahasiswa'], function($routes){
    $routes->get('profil', 'MahasiswaController::index');
    $routes->get('copy_lay', 'MahasiswaController::indexCopy');
    $routes->get('progres_approval', 'MahasiswaController::indexApproval');
    $routes->get('kelola_antreann', 'MahasiswaController::indexAntrean');
    $routes->get('kelola_antrean/edit', 'MahasiswaController::editAntrean');
    $routes->post('kelola_antrean/update/(:num)', 'MahasiswaController::updateAntrean/$1');
    $routes->get('antrean_sekarang', 'MahasiswaController::indexAntreanSekarang');
    $routes->get('next_queue', 'MahasiswaController::nextAntrean');
    $routes->get('reset_queue', 'MahasiswaController::resetAntrean');
});

$routes->group('', function ($routes) {
    $routes->get('/login', 'AuthController::login');
    $routes->post('/authLogin', 'AuthController::authLogin');
    $routes->get('/logout', 'AuthController::logout');
    $routes->get('/registrasi', 'AuthController::registrasi');
    $routes->post('/authRegistrasi', 'AuthController::authRegistrasi');
});

$routes->get('ambil_antrean', 'MahasiswaController::indexData');
$routes->get('monitor_antrean', 'Home::monitorAntrean');
$routes->get('getqueue', 'MahasiswaController::getQueueData');
$routes->post('ambil_antrean/save', 'MahasiswaController::storeDataAntrean');

$routes->put('approval_antrian/aktifasi/(:num)', 'AdminController::aktifasi/$1');


// errors
$routes->set404Override(function () {
    $data['title'] = 'Not Found';
    return view('errors/custom_404', $data);
});