<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Services\LoginService;
use App\Helpers\Validador;
use App\Services\UsuarioService;

class LoginController extends Controller
{
    private LoginService $loginService;
    private UsuarioService $usuarioService;

    public function __construct()
    {
        $this->loginService = new LoginService();
        $this->usuarioService = new UsuarioService();
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

        $usuario = $this->usuarioService->buscarPorEmail($email);

        //email não encontrado
        if (!$usuario) {
            return $this->view('Login/Login', [
                'erros' => [
                    'login' => 'E-mail ou senha inválidos.'
                ],
                'email' => $email
            ]);
        }

        // xonta desativada
        if ((int) $usuario['Ativo'] !== 1) {
            return $this->view('Login/Login', [
                'erros' => [
                    'login' => 'Esta conta está desativada. Entre em contato com um administrador.'
                ],
                'email' => $email
            ]);
        }

        //erifica e-mail e senha
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
