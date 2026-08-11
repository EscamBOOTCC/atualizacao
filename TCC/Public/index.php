<?php

require_once __DIR__ . '/../App/Core/Autoload.php';
require_once __DIR__ . '/../App/Config/Config.php';

use App\Core\Router;

$router = new Router();

//rotitas

$router->get('/', 'LoginController@login'); //define o login/cadastro como primeira coisa que a pessoa faz ao abrir o escamboo
$router->get('/acordo', 'AcordoController@formalizarAcordo');
$router->get('/usuarios', 'UsuarioController@listarTodosUsuarios');
$router->get('/usuarios/cadastrar', 'UsuarioController@CadastrarUsuarios');


$router->post('/usuarios/salvar', 'UsuarioController@salvar');

//FINALMENREAJIDHUHYBABCYBUSY
$router->get('/login', 'LoginController@login');
$router->post('/login', 'LoginController@autenticar');
$router->get('/logout', 'LoginController@logout');


$router->run();