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

$routes->group('api', static function ($routes) {
    $routes->get('/', 'Home::api');
    //$routes->get('/', 'Home::api', ['filter' => 'authFilter']);
    $routes->post('login', 'Login::login');

    $routes->group('funcionario', static function ($routes) {
        $routes->post('new', 'Funcionarios::add', ['filter' => 'authFilter']);
        $routes->post('update/(:num)', 'Funcionarios::actualizar/$1', ['filter' => 'authFilter']);
        $routes->post('newpassword/(:num)', 'Funcionarios::newPassword/$1', ['filter' => 'authFilter']);
        $routes->post('resetpassword/(:num)', 'Funcionarios::resetPass/$1', ['filter' => 'authFilter']);
    });
});

$routes->group('utilizadores', static function ($routes) {
    $routes->get('/', 'Utilizadores::index');
    $routes->get('(:num)', 'Utilizadores::perfil/$1');
    $routes->get('resgatar', 'Utilizadores::resgatarpass');
    $routes->get('resgatar', 'Utilizadores::resgatarpass');
});

$routes->group('login', static function ($routes) {
    $routes->get('/', 'Login::index');
    $routes->get('resgatar', 'Login::resgatarpass');
});

$routes->group('candidaturas', static function ($routes) {

    $routes->get('vagas', 'Vagas::index');
    $routes->get('vagas/(:num)', 'Vagas::perfil/$1');
    $routes->get('vagas/novo', 'Vagas::adicionar');
    $routes->get('vagas/(:num)', 'Vagas::perfil/$1');

    $routes->get('candidatos', 'Candidaturas::index');
    $routes->get('candidatos/(:num)', 'Candidaturas::perfil/$1');
    $routes->post('novo', 'Candidaturas::adicionar');
});

$routes->group('escolar', static function ($routes) {
    $routes->get('cursos', 'Cursos::index');
    $routes->get('cursos/(:num)', 'Cursos::perfil/$1');
    $routes->get('cursos/novo', 'Cursos::adicionar');

    $routes->get('disciplinas', 'Disciplinas::index');
    $routes->get('disciplinas/(:num)', 'Disciplinas::perfil/$1');
    $routes->get('disciplinas/novo', 'Disciplinas::adicionar');

    $routes->get('estudantes/', 'Estudantes::index');
    $routes->get('estudantes/(:num)', 'Estudantes::perfil/$1');
    $routes->get('estudantes/novo', 'Estudantes::index');

    $routes->get('provas/', 'Provas::index');
    $routes->get('provas/(:num)', 'Provas::perfil/$1');
    $routes->get('provas/novo', 'Provas::adicionar');
});

$routes->group('rh', static function ($routes) {
    $routes->get('funcionarios', 'Funcionarios::index');
    $routes->get('funcionarios/(:num)', 'Funcionarios::perfil/$1');
    $routes->get('funcionarios/novo', 'Funcionarios::adicionar');
});


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
