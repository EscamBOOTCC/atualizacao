<?php

namespace App\Core;

class Controller
{
    public function view(string $view, ?array $data = null)
    {
        if ($data) {
            extract($data);
        }

        $path = __DIR__ . "/../Views/$view.php";

        if (file_exists($path)) {
            require_once $path;
        } else {
            print 'A view solicitada não foi encontrada: ' . $view;
        }
    }

    public function redirect(string $url)
    {
        header('Location: ' . $url);
        exit();
    }

   public function autenticacaoRequired()
{
    if (!isset($_SESSION['usuario_logado'])) {
        $_SESSION['erro'] = 'Você precisa estar logado para acessar esta página.';
        $this->redirect(URL_BASE . '/login');
    }

    return true;
}

    public function adminRequired()
    {
        if (
            !isset($_SESSION['usuario_logado']) ||
            $_SESSION['usuario_logado']['Tipo'] !== 'adm'
        ) {
            $this->redirect(URL_BASE . '/login');
        }

        return true;
    }
}