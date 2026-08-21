<?php

require_once __DIR__ . '/../App/Core/Autoload.php';
require_once __DIR__ . '/../App/Config/Config.php';

use App\Core\Router;

$router = new Router();

\App\Database\ConnectionFactory::getConnection();


// ======================================================
// LOGIN
// ======================================================

$router->get('/', 'LoginController@login');

$router->get('/login', 'LoginController@login');

$router->post('/login', 'LoginController@autenticar');

$router->get('/logout', 'LoginController@logout');


// ======================================================
// USUÁRIOS
// ======================================================

// Listar usuários
$router->get(
    '/usuarios',
    'UsuarioController@listarTodosUsuarios'
);

// Abrir tela de edição
$router->get(
    '/usuarios/editar',
    'UsuarioController@editar'
);

// Salvar edição
$router->post(
    '/usuarios/editar',
    'UsuarioController@atualizar'
);


// ======================================================
// TRABALHADOR
// ======================================================

// Abrir cadastro de trabalhador
$router->get(
    '/trabalhador/cadastrar',
    'UsuarioController@cadastrarTrabalhador'
);

// Salvar trabalhador
$router->post(
    '/trabalhador/cadastrar',
    'UsuarioController@salvarTrabalhador'
);


// ======================================================
// ADMINISTRADOR
// ======================================================

// Abrir cadastro de ADM
$router->get(
    '/adm/cadastrar',
    'UsuarioController@cadastrarAdm'
);

// Salvar ADM
$router->post(
    '/adm/cadastrar',
    'UsuarioController@salvarAdm'
);


// ======================================================
// GRANDES ÁREAS
// ======================================================

$router->get(
    '/grandes-areas',
    'GrandesAreasController@gerenciarEstrutura'
);

$router->post(
    '/grandes-areas/salvar',
    'GrandesAreasController@salvar'
);

$router->post(
    '/grandes-areas/atualizar',
    'GrandesAreasController@atualizar'
);

$router->post(
    '/grandes-areas/excluir',
    'GrandesAreasController@excluir'
);


// ======================================================
// OUTRAS ROTAS
// ======================================================

$router->get(
    '/acordo',
    'AcordoController@formalizarAcordo'
);

$router->get(
    '/adm',
    'AdministradorController@dashboard'
);

$router->post(
    '/usuarios/alterar-status',
    'UsuarioController@alterarStatus'
);
// ======================================================
// EXECUTAR ROUTER
// ======================================================

$router->run();
