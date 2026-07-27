<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Public Routes
$routes->get('/', 'Home::index');
$routes->get('/direktori', 'Direktori::index');
$routes->get('/statistik', 'Statistik::index');
$routes->get('/mitra', 'Mitra::index');
$routes->get('/cerita', 'Cerita::index');

// Auth Routes
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::login');
$routes->get('/register', 'Auth::register');
$routes->post('/register/check-nik', 'Auth::checkNik');
$routes->post('/register/process', 'Auth::processRegister');
$routes->get('/logout', 'Auth::logout');
$routes->get('/api/statistik', 'Home::apiStatistik');

// Alumni Routes
$routes->group('alumni', ['filter' => 'auth'], function ($routes) {
    $routes->get('dashboard', 'Alumni\Dashboard::index');
    $routes->get('profil', 'Alumni\Profil::index');
    $routes->post('profil/update', 'Alumni\Profil::update');
    $routes->post('profil/password', 'Alumni\Profil::updatePassword');
    $routes->get('status', 'Alumni\Status::index');
    $routes->post('status/update', 'Alumni\Status::update');
});

// Admin Routes
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('dashboard', 'Admin\Dashboard::index');
    
    // Alumni management
    $routes->get('alumni', 'Admin\Alumni::index');
    $routes->get('alumni/detail/(:any)', 'Admin\Alumni::detail/$1');

    // Mitra management
    $routes->get('mitra', 'Admin\Mitra::index');
    $routes->post('mitra/save', 'Admin\Mitra::save');
    $routes->get('mitra/delete/(:num)', 'Admin\Mitra::delete/$1');

    // Cerita management
    $routes->get('cerita', 'Admin\Cerita::index');
    $routes->post('cerita/save', 'Admin\Cerita::save');
    $routes->get('cerita/delete/(:num)', 'Admin\Cerita::delete/$1');

    // Banner management
    $routes->get('banner', 'Admin\Banner::index');
    $routes->post('banner/save', 'Admin\Banner::save');
    $routes->get('banner/delete/(:num)', 'Admin\Banner::delete/$1');

    // Audit Log
    $routes->get('auditlog', 'Admin\AuditLog::index');
});

// Super Admin Routes
$routes->group('superadmin', ['filter' => 'auth'], function ($routes) {
    $routes->get('dashboard', 'Superadmin\User::index');
    $routes->get('users', 'Superadmin\User::index');
    $routes->post('users/create', 'Superadmin\User::create');
    $routes->post('users/update-role/(:num)', 'Superadmin\User::updateRole/$1');
});
