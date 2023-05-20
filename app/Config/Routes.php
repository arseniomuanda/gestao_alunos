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
    $routes->post('login', 'Login::login');
    $routes->post('logout', 'Login::logout', ['filter' => 'authFilter']);

    $routes->group('funcionario', static function ($routes) {
        $routes->post('new', 'Funcionarios::add', ['filter' => 'authFilter']);
        $routes->post('update/(:num)', 'Funcionarios::actualizar/$1', ['filter' => 'authFilter']);
        $routes->post('newpassword/(:num)', 'Funcionarios::newPassword/$1', ['filter' => 'authFilter']);
        $routes->post('resetpassword/(:num)', 'Funcionarios::resetPass/$1', ['filter' => 'authFilter']);
        $routes->post('remove/(:num)', 'Funcionarios::remove/$1', ['filter' => 'authFilter']);
    });

    $routes->group('cursos', static function ($routes) {
        $routes->post('new', 'Cursos::add', ['filter' => 'authFilter']);
        $routes->post('update/(:num)', 'Cursos::actualizar/$1', ['filter' => 'authFilter']);
        $routes->post('remove/(:num)', 'Cursos::remove/$1', ['filter' => 'authFilter']);
        $routes->get('disciplina/(:num)', 'Cursos::getDisciplina/$1', ['filter' => 'authFilter']);
    });

    $routes->group('disciplinas', static function ($routes) {
        $routes->post('new', 'Disciplinas::add', ['filter' => 'authFilter']);
        $routes->post('update/(:num)', 'Disciplinas::actualizar/$1', ['filter' => 'authFilter']);
        $routes->post('remove/(:num)', 'Disciplinas::remove/$1', ['filter' => 'authFilter']);
    });

    $routes->group('alunos', static function ($routes) {
        $routes->post('new', 'Alunos::add', ['filter' => 'authFilter']);
        $routes->post('update/(:num)', 'Alunos::actualizar/$1', ['filter' => 'authFilter']);
        $routes->post('updateImagens/(:num)', 'Alunos::updateImagens/$1', ['filter' => 'authFilter']);
        $routes->post('remove/(:num)', 'Alunos::remove/$1', ['filter' => 'authFilter']);
    });

    $routes->group('turmas', static function ($routes) {
        $routes->post('new', 'Turmas::add', ['filter' => 'authFilter']);
        $routes->post('update/(:num)', 'Turmas::actualizar/$1', ['filter' => 'authFilter']);
        $routes->get('curso/(:num)', 'Turmas::getTurmas/$1', ['filter' => 'authFilter']);
        $routes->post('remove/(:num)', 'Turmas::remove/$1', ['filter' => 'authFilter']);
    });

    $routes->group('provas', static function ($routes) {
        $routes->post('new', 'Provas::add', ['filter' => 'authFilter']);
        $routes->post('update/(:num)', 'Provas::actualizar/$1', ['filter' => 'authFilter']);
        $routes->post('remove/(:num)', 'Provas::remove/$1', ['filter' => 'authFilter']);
        $routes->post('setnota', 'Provas::setNota', ['filter' => 'authFilter']);
    });

    $routes->group('vagas', static function ($routes) {
        $routes->post('new', 'Vagas::add', ['filter' => 'authFilter']);
        $routes->post('update/(:num)', 'Vagas::actualizar/$1', ['filter' => 'authFilter']);
        $routes->post('remove/(:num)', 'Vagas::remove/$1', ['filter' => 'authFilter']);
        $routes->get('listar', 'Vagas::mostrar');
        $routes->get('listar/(:num)', 'Vagas::mostrar/$1');
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

    $routes->get('alunos/', 'Alunos::index');
    $routes->get('alunos/(:num)', 'Alunos::perfil/$1');
    $routes->get('alunos/novo', 'Alunos::adicionar');

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
