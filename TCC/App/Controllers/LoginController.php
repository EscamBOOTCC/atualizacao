<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Services\LoginService;

class LoginController extends Controller
{
    private LoginService $loginService;

    public function __construct()
    {
        $this->loginService = new LoginService();
    }

    public function login()
    {
        return $this->view('Login/Login'); //define rota
    }

    public function autenticar()
    {
        $email = trim($_POST['email'] ?? ''); //recebe os valores que o usuario digitar
        $senha = $_POST['senha'] ?? '';

        $erros = $this->loginService->validarLogin($email, $senha); // encaminha a validação pra camada service, se ela nao retornar nenhum erro continua

        if (!$erros) {
            $usuario = $this->loginService->autenticar($email, $senha); //verifica no banco

            if ($usuario) {
                $this->loginService->salvarUsuarioSessao($usuario); 

                if ($usuario['Tipo'] === 'adm') {
                    return $this->redirect(URL_BASE . '/adm'); //se for adm ele usa a view de adm na router
                }

                return $this->redirect(URL_BASE . '/trabalhador'); // se nao ele usa a trabalhador, proavelmente deveria alterar a letra maiuscula mas isso é dor de cabeça pra depois
            }

            $erros[] = "E-mail ou senha inválidos."; ///se nao tiver na base de dados e/ou a senha e email estiver errada ele retorna isso
        }

        return $this->view('Login/Login', ['erros' => $erros, 'email' => $email]);
    }

    public function logout()
    {
        $this->loginService->apagarDadosSessao();

        return $this->redirect(URL_BASE . '/login'); ///para ele poder sair do perfil adm/trabahador
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