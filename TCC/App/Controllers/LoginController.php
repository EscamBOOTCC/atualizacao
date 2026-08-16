<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Services\LoginService;
use App\Helpers\Validador;

class LoginController extends Controller
{
    private LoginService $loginService;

    public function __construct()
    {
        $this->loginService = new LoginService();
    }

    public function login()
    {
        return $this->view('Login/Login');
    }

    public function autenticar()
    {
        $email = trim($_POST['email'] ?? '');
        $senha = $_POST['senha'] ?? '';

        $validador = new Validador();

        $validador
            ->obrigatorio('email', $email)
            ->obrigatorio('senha', $senha);

        if ($validador->temErros()) {
            return $this->view('Login/Login', [
                'erros' => $validador->getErros(),
                'email' => $email
            ]);
        }

        $usuario = $this->loginService->autenticar($email, $senha);

        if (!$usuario) {
            return $this->view('Login/Login', [
                'erros' => [
                    'login' => 'E-mail ou senha inválidos.'
                ],
                'email' => $email
            ]);
        }

        $this->loginService->salvarUsuarioSessao($usuario);

        if ($usuario['Tipo'] === 'adm') {
            return $this->redirect(URL_BASE . '/adm');
        }

        return $this->redirect(URL_BASE . '/trabalhador');
    }

    public function logout()
    {
        $this->loginService->apagarDadosSessao();

        return $this->redirect(URL_BASE . '/login');
    }

    public function getNomeUsuarioLogado()
    {
        return $this->loginService->getNomeUsuarioLogado();
    }

    public function getUsuarioLogado(): ?array
    {
        return $this->loginService->getUsuarioLogado();
    }

    public function usuarioEstaLogado(): bool
    {
        return $this->loginService->usuarioEstaLogado();
    }
}
