<?php

//Configuração do ambiente
define('DEV_ENVIRONMENT', true);

if (DEV_ENVIRONMENT == true) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

//Configuração do Sistema
define('APP_NAME', 'EscamBOO');
define('URL_BASE', 'http://localhost:8080');

//Configurações do Banco de dados
define('DB_HOST', 'localhost');
define('DB_NAME', 'EscamBOO');

//arruma quem for mexer
define('DB_USER', 'euaquitlgd?');
define('DB_PASS', 'bancodedados');
    