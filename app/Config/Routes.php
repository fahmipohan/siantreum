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

$routes->group('dosen', ['filter' => 'role:dosen'], function($routes){
    $routes->get('dashboard', 'DosenController::index');
    $routes->get('kelola_antrean', 'DosenController::indexAntrean');
    $routes->get('kelola_antrean/edit', 'DosenController::editAntrean');
    $routes->post('kelola_antrean/update/(:num)', 'DosenController::updateAntrean/$1');
    $routes->get('next_queue', 'DosenController::nextAntrean');
    $routes->get('reset_queue', 'DosenController::resetAntrean');
});

$routes->group('', function ($routes) {
    $routes->get('/login', 'AuthController::index');
    $routes->get('/logout', 'AuthController::logout');
    $routes->get('/register', 'AuthController::registrasi');
    $routes->post('/auth', 'AuthController::auth');
});

$routes->get('ambil_antrean', 'DosenController::indexData');
$routes->get('monitor_antrean', 'Home::monitorAntrean');
$routes->get('getqueue', 'DosenController::getQueueData');
$routes->post('ambil_antrean/save', 'DosenController::storeDataAntrean');


// errors
$routes->set404Override(function () {
    $data['title'] = 'Not Found';
    return view('errors/custom_404', $data);
});