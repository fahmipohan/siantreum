<?php

use CodeIgniter\Router\RouteCollection;


/**
 * @var RouteCollection $routes
 */
$routes->setDefaultMethod('index');
$routes->get('/', 'Home::index');

$routes->group('', ['filter' => 'role:admin'], function ($routes) {
    $routes->get('/dashboard', 'AdminController::index');
    $routes->get('/profil', 'AdminController::indexProfil');
    $routes->get('/kelola_dosen', 'AdminController::indexDosen');
    $routes->get('/kelola_antrean', 'AdminController::indexAntrean');
    $routes->get('/kelola_dosen/edit', 'AdminController::editDosen');
    $routes->get('/delete_dosen/(:num)', 'AdminController::deleteDosen/$1');
    $routes->post('/tambah_dosen', 'AdminController::addDosen');
    $routes->post('/kelola_dosen/update/(:num)', 'AdminController::updateDosen/$1');
    $routes->post('/tambah_antrean', 'AdminController::addAntrean');
    $routes->get('/delete_antrean/(:num)', 'AdminController::deleteAntrean/$1');
    $routes->get('/kelola_antrean/edit', 'AdminController::editAntrean');
    $routes->post('/kelola_antrean/update/(:num)', 'AdminController::updateAntrean/$1');
});

$routes->group('dosen', ['filter' => 'role:mahasiswa'], function($routes){
    $routes->get('dashboard', 'MahasiswaController::index');
    $routes->get('kelola_antrean', 'MahasiswaController::indexAntrean');
    $routes->get('kelola_antrean/edit', 'MahasiswaController::editAntrean');
    $routes->post('kelola_antrean/update/(:num)', 'MahasiswaController::updateAntrean/$1');
    $routes->get('next_queue', 'MahasiswaController::nextAntrean');
    $routes->get('reset_queue', 'MahasiswaController::resetAntrean');
});

$routes->group('', function ($routes) {
    $routes->get('/login', 'AuthController::index');
    $routes->get('/logout', 'AuthController::logout');
    $routes->get('/registrasi', 'AuthController::registrasi');
    $routes->post('/authRegistrasi', 'AuthController::authRegistrasi');
    $routes->post('/authLogin', 'AuthController::authLogin');
});

$routes->get('ambil_antrean', 'MahasiswaController::indexData');
$routes->get('monitor_antrean', 'Home::monitorAntrean');
$routes->get('getqueue', 'MahasiswaController::getQueueData');
$routes->post('ambil_antrean/save', 'MahasiswaController::storeDataAntrean');


// errors
$routes->set404Override(function () {
    $data['title'] = 'Not Found';
    return view('errors/custom_404', $data);
});