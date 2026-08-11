<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Services\UsuarioService;

class UsuarioController extends Controller
{
    //autenticar tambem, vai vir da service de autenticacao, que vai ser criada depois

    private $service;

    public function __construct()
    {
        $this->service = new UsuarioService();
    }

    public function cadastrarUsuarios()
    {

        $this->view('Usuarios/cadastrarUsuario');
    }
    public function salvar()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return $this->redirect('/usuarios');
        }

        $usuario = [
            'Nome' => trim($_POST['nome'] ?? ''),
            'CPF' => trim($_POST['cpf'] ?? ''),
            'Genero' => $_POST['genero'] ?? null,
            'Email' => trim($_POST['email'] ?? ''),
            'Senha' => $_POST['senha'] ?? '',
            'DataNascimento' => $_POST['dataNascimento'] ?? null,
            'FotoPerfil' => trim($_POST['fotoPerfil'] ?? ''),
            'Endereco' => trim($_POST['endereco'] ?? '')
        ];

        //

        $usuario['Senha'] = password_hash(
            $usuario['Senha'],
            PASSWORD_DEFAULT
        );

        $this->service->salvar($usuario);

        return $this->redirect('/usuarios');
    }

    public function editarUsuario() {}

    public function listarTodosUsuarios()
    {
        $usuarios = $this->service->listarTodos();

        return $this->view('Usuarios/listarTodos', ['usuarios' => $usuarios]);
    }

    public function listarUsuario()
    {
        if (!isset($_GET['idUsuario'])) {
            return $this->redirect('/');
        }

        $usuario = $this->service->buscarPorId($_GET['id']);

        if (!$usuario) {
            return $this->redirect('/');
        }

        return $this->view('/listar', ['usuario' => $usuario]);
    }

    public function deletarUsuario()
    {
        //Implementar
    }
}
