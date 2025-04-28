<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::login');

$routes->post('prediction/predict', 'PredictController::predict');

// Authentication
$routes->get('/register', 'AuthController::register');
$routes->post('/auth/store', 'AuthController::store');
$routes->get('/login', 'AuthController::login');
$routes->post('/auth/loginAuth', 'AuthController::loginAuth');
$routes->get('/logout', 'AuthController::logout');
$routes->get('auth/getUserData', 'AuthController::getUserData');

//admin
$routes->get('/users', 'AdminController::users');
$routes->post('users/create','AdminController::create');
$routes->post('users/update/(:num)', 'AdminController::update/$1');
$routes->post('users/delete/(:num)', 'AdminController::delete/$1');

$routes->group('profile', ['filter' => 'auth'], function($routes) {
    $routes->get('edit', 'ProfileController::edit');
    $routes->post('update', 'ProfileController::update');
    $routes->get('show', 'ProfileController::index');
});

// Dashboard
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/dashboard/detail/(:any)', 'Dashboard::detail/$1');
$routes->get('/dashboard/upload/(:any)', 'Dashboard::upload/$1');

//PDF
$routes->get('/generate-pdf', 'PdfController::generate_pembangkit');
$routes->get('/generatepdf', 'PdfController::generate_proyek');
$routes->get('/generate_pdf', 'PdfController::generate_transmisi');

// MAPP
$routes->get('/mapp', 'Mapp::index');
$routes->get('/mapp/add', 'Mapp::add');
$routes->post('/mapp/store', 'Mapp::store');
$routes->get('mapp/view/(:any)', 'Mapp::view/$1');
$routes->get('mapp/download/(:any)', 'Mapp::download/$1');
$routes->get('/csv1', 'Mapp::downloadCSV');
//edit
$routes->get('mapp/edit/(:any)', 'Mapp::edit/$1');
$routes->post('mapp/update/(:any)', 'Mapp::update/$1');
$routes->get('mapp/delete/(:num)', 'Mapp::delete/$1');

// BBO
$routes->get('/bbo', 'Bbo::index');
$routes->get('/bbo/add', 'Bbo::add');
$routes->post('/bbo/store', 'Bbo::store');
$routes->get('bbo/view/(:any)', 'Bbo::view/$1');
$routes->get('bbo/download/(:any)', 'Bbo::download/$1');
$routes->get('/csv2', 'Bbo::downloadCSV');
//edit
$routes->get('bbo/edit/(:any)', 'Bbo::edit/$1');
$routes->post('bbo/update/(:any)', 'Bbo::update/$1');
$routes->get('bbo/delete/(:num)', 'Bbo::delete/$1');

// MAXIMO
$routes->get('/maximo', 'Maximo::index');
$routes->get('/maximo/add', 'Maximo::add');
$routes->post('/maximo/store', 'Maximo::store');
$routes->get('maximo/view/(:any)', 'Maximo::view/$1');
$routes->get('maximo/download/(:any)', 'Maximo::download/$1');
$routes->get('/csv3', 'Maximo::downloadCSV');
//edit
$routes->get('maximo/edit/(:any)', 'Maximo::edit/$1');
$routes->post('maximo/update/(:any)', 'Maximo::update/$1');
$routes->get('maximo/delete/(:num)', 'Maximo::delete/$1');

// BBM
$routes->get('/bbm', 'Bbm::index');
$routes->get('/bbm/add', 'Bbm::add');
$routes->post('/bbm/store', 'Bbm::store');
$routes->get('bbm/view/(:any)', 'Bbm::view/$1');
$routes->get('bbm/download/(:any)', 'Bbm::download/$1');
$routes->get('/csv4', 'Bbm::downloadCSV');
//edit
$routes->get('bbm/edit/(:any)', 'Bbm::edit/$1');
$routes->post('bbm/update/(:any)', 'Bbm::update/$1');
$routes->get('bbm/delete/(:num)', 'Bbm::delete/$1');

// GAS
$routes->get('/gas', 'Gas::index');
$routes->get('/gas/add', 'Gas::add');
$routes->post('/gas/store', 'Gas::store');
$routes->get('gas/view/(:any)', 'Gas::view/$1');
$routes->get('gas/download/(:any)', 'Gas::download/$1');
$routes->get('/csv5', 'Gas::downloadCSV');
//edit
$routes->get('gas/edit/(:any)', 'Gas::edit/$1');
$routes->post('gas/update/(:any)', 'Gas::update/$1');
$routes->get('gas/delete/(:num)', 'Gas::delete/$1');

// SIIPP
$routes->get('/siipp', 'Siipp::index');
$routes->get('/siipp/add', 'Siipp::add');
$routes->post('/siipp/store', 'Siipp::store');
$routes->get('siipp/view/(:any)', 'Siipp::view/$1');
$routes->get('siipp/download/(:any)', 'Siip::download/$1');
$routes->get('/csv6', 'Siipp::downloadCSV');
//edit
$routes->get('siipp/edit/(:any)', 'Siipp::edit/$1');
$routes->post('siipp/update/(:any)', 'Siipp::update/$1');
$routes->get('siipp/delete/(:num)', 'Siipp::delete/$1');

// ASET
$routes->get('/aset', 'Aset::index');
$routes->get('/aset/add', 'Aset::add');
$routes->post('/aset/store', 'Aset::store');
$routes->get('aset/view/(:any)', 'Aset::view/$1');
$routes->get('aset/download/(:any)', 'Aset::download/$1');
// $routes->get('/prediksi(:any)', 'PrediksiController::prediksi/$1');
$routes->get('/prediksi', 'PrediksiController::prediksiSatuBulan');
$routes->get('/csv7', 'Aset::downloadCSV');

//edit
$routes->get('aset/edit/(:any)', 'Aset::edit/$1');
$routes->post('aset/update/(:any)', 'Aset::update/$1');
$routes->get('aset/delete/(:num)', 'Aset::delete/$1');

// EAM Transmisi
$routes->get('/eamt', 'Eamt::index');
$routes->get('/eamt/add', 'Eamt::add');
$routes->post('/eamt/store', 'Eamt::store');
$routes->get('eamt/view/(:any)', 'Eamt::view/$1');
$routes->get('eamt/download/(:any)', 'Eamt::download/$1');
$routes->get('/csv8', 'Eamt::downloadCSV');
//edit
$routes->get('eamt/edit/(:any)', 'Eamt::edit/$1');
$routes->post('eamt/update/(:any)', 'Eamt::update/$1');
$routes->get('eamt/delete/(:num)', 'Eamt::delete/$1');

// PI
$routes->get('/pi', 'Pi::index');
$routes->get('/pi/add', 'Pi::add');
$routes->post('/pi/store', 'Pi::store');
$routes->get('pi/view/(:any)', 'Pi::view/$1');
$routes->get('pi/download/(:any)', 'Pi::download/$1');
$routes->get('/csv9', 'Pi::downloadCSV');
//edit
$routes->get('pi/edit/(:any)', 'Pi::edit/$1');
$routes->post('pi/update/(:any)', 'Pi::update/$1');
$routes->get('pi/delete/(:num)', 'Pi::delete/$1');

// Neon
$routes->get('/neon', 'Neon::index');
$routes->get('/neon/add', 'Neon::add');
$routes->post('/neon/store', 'Neon::store');
$routes->get('neon/view/(:any)', 'Neon::view/$1');
$routes->get('neon/download/(:any)', 'Neon::download/$1');
$routes->get('/csv10', 'Neon::downloadCSV');
//edit
$routes->get('neon/edit/(:any)', 'Neon::edit/$1');
$routes->post('neon/update/(:any)', 'Neon::update/$1');
$routes->get('neon/delete/(:num)', 'Neon::delete/$1');

// MM-NE
$routes->get('/mm', 'Mm::index');
$routes->get('/mm/add', 'Mm::add');
$routes->post('/mm/store', 'Mm::store');
$routes->get('mm/view/(:any)', 'Mm::view/$1');
$routes->get('mm/download/(:any)', 'Mm::download/$1');
$routes->get('/csv11', 'Mm::downloadCSV');
//edit
$routes->get('mm/edit/(:any)', 'Mm::edit/$1');
$routes->post('mm/update/(:any)', 'Mm::update/$1');
$routes->get('mm/delete/(:num)', 'Mm::delete/$1');

// EIC
$routes->get('/eic', 'Eic::index');
$routes->get('/eic/add', 'Eic::add');
$routes->post('/eic/store', 'Eic::store');
$routes->get('eic/view/(:any)', 'Eic::view/$1');
$routes->get('eic/download/(:any)', 'Eic::download/$1');
$routes->get('/csv12', 'Eic::downloadCSV');
//edit
$routes->get('eic/edit/(:any)', 'Eic::edit/$1');
$routes->post('eic/update/(:any)', 'Eic::update/$1');
$routes->get('eic/delete/(:num)', 'Eic::delete/$1');

// EC
$routes->get('/ec', 'Ec::index');
$routes->get('/ec/add', 'Ec::add');
$routes->post('/ec/store', 'Ec::store');
$routes->get('ec/view/(:any)', 'Ec::view/$1');
$routes->get('ec/download/(:any)', 'Ec::download/$1');
$routes->get('/csv13', 'Ec::downloadCSV');
//edit
$routes->get('ec/edit/(:any)', 'Ec::edit/$1');
$routes->post('ec/update/(:any)', 'Ec::update/$1');
$routes->get('ec/delete/(:num)', 'Ec::delete/$1');

// EIQC
$routes->get('/eiqc', 'Eiqc::index');
$routes->get('/eiqc/add', 'Eiqc::add');
$routes->post('/eiqc/store', 'Eiqc::store');
$routes->get('eiqc/view/(:any)', 'Eiqc::view/$1');
$routes->get('eiqc/download/(:any)', 'Eiqc::download/$1');
$routes->get('/csv14', 'Eiqc::downloadCSV');
//edit
$routes->get('eiqc/edit/(:any)', 'Eiqc::edit/$1');
$routes->post('eiqc/update/(:any)', 'Eiqc::update/$1');
$routes->get('eiqc/delete/(:num)', 'Eiqc::delete/$1');

// Mercusuar
$routes->get('/mercusuar', 'Mercusuar::index');
$routes->get('/mercusuar/add', 'Mercusuar::add');
$routes->post('/mercusuar/store', 'Mercusuar::store');
$routes->get('mercusuar/view/(:any)', 'Mercusuar::view/$1');
$routes->get('mercusuar/download/(:any)', 'Mercusuar::download/$1');
$routes->get('/csv15', 'Mercusuar::downloadCSV');
//edit
$routes->get('mercusuar/edit/(:any)', 'Mercusuar::edit/$1');
$routes->post('mercusuar/update/(:any)', 'Mercusuar::update/$1');
$routes->get('mercusuar/delete/(:num)', 'Mercusuar::delete/$1');

// PMO
$routes->get('/pmo', 'Pmo::index');
$routes->get('/pmo/add', 'Pmo::add');
$routes->post('/pmo/store', 'Pmo::store');
$routes->get('pmo/view/(:any)', 'Pmo::view/$1');
$routes->get('pmo/download/(:any)', 'Pmo::download/$1');
$routes->get('/csv16', 'Pmo::downloadCSV');
//edit
$routes->get('pmo/edit/(:any)', 'Pmo::edit/$1');
$routes->post('pmo/update/(:any)', 'Pmo::update/$1');
$routes->get('pmo/delete/(:num)', 'Pmo::delete/$1');

// SIDITA
$routes->get('/sidita', 'Sidita::index');
$routes->get('/sidita/add', 'Sidita::add');
$routes->post('/sidita/store', 'Sidita::store');
$routes->get('sidita/view/(:any)', 'Sidita::view/$1');
$routes->get('sidita/download/(:any)', 'Sidita::download/$1');
$routes->get('/csv17', 'Sidita::downloadCSV');
//edit
$routes->get('sidita/edit/(:any)', 'Sidita::edit/$1');
$routes->post('sidita/update/(:any)', 'Sidita::update/$1');
$routes->get('sidita/delete/(:num)', 'Sidita::delete/$1');

// PLN Cerdas
$routes->get('/plncerdas', 'PlnCerdas::index');
$routes->get('/plncerdas/add', 'PlnCerdas::add');
$routes->post('/plncerdas/store', 'PlnCerdas::store');
$routes->get('plncerdas/view/(:any)', 'PlnCerdas::view/$1');
$routes->get('plncerdas/download/(:any)', 'PlnCerdas::download/$1');
$routes->get('/csv18', 'Plncerdas::downloadCSV');
//edit
$routes->get('plncerdas/edit/(:any)', 'PlnCerdas::edit/$1');
$routes->post('plncerdas/update/(:any)', 'PlnCerdas::update/$1');
$routes->get('plncerdas/delete/(:num)', 'PlnCerdas::delete/$1');

// ETKDN
$routes->get('/etkdn', 'Etkdn::index');
$routes->get('/etkdn/add', 'Etkdn::add');
$routes->post('/etkdn/store', 'Etkdn::store');
$routes->get('etkdn/view/(:any)', 'Etkdn::view/$1');
$routes->get('etkdn/download/(:any)', 'Etkdn::download/$1');
$routes->get('/csv19', 'Etkdn::downloadCSV');
//edit
$routes->get('etkdn/edit/(:any)', 'Etkdn::edit/$1');
$routes->post('etkdn/update/(:any)', 'Etkdn::update/$1');
$routes->get('etkdn/delete/(:num)', 'Etkdn::delete/$1');

// LISDES
$routes->get('/lisdes', 'Lisdes::index');
$routes->get('/lisdes/add', 'Lisdes::add');
$routes->post('/lisdes/store', 'Lisdes::store');
$routes->get('lisdes/view/(:any)', 'Lisdes::view/$1');
$routes->get('lisdes/download/(:any)', 'Lisdes::download/$1');
$routes->get('/csv20', 'Lisdes::downloadCSV');
//edit
$routes->get('lisdes/edit/(:any)', 'Lisdes::edit/$1');
$routes->post('lisdes/update/(:any)', 'Lisdes::update/$1');
$routes->get('lisdes/delete/(:num)', 'Lisdes::delete/$1');