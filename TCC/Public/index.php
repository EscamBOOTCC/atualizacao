<?php

require_once __DIR__ . '/../App/Core/Autoload.php';
require_once __DIR__ . '/../App/Config/Config.php';

use App\Core\Router;

$router = new Router();

//rotitas

$router->get('/acordo', 'AcordoController@formalizarAcordo');

$router->get('/usuarios', 'UsuarioController@listarTodosUsuarios');

$router->get('/usuarios/cadastrar', 'UsuarioController@cadastrarUsuarios');

$router->get('/usuarios/cadastrarTrabalhador', 'UsuarioController@cadastrarTrabalhador');

$router->get('/usuarios/cadastrarAdm', 'UsuarioController@cadastrarAdm');


$router->post('/usuarios/salvar', 'UsuarioController@salvar');

$router->post('/usuarios/salvarTrabalhador', 'UsuarioController@salvarTrabalhador');

$router->post('/usuarios/salvarAdm', 'UsuarioController@salvarAdm');


$router->run();