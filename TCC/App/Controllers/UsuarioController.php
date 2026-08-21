<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Services\UsuarioService;
use App\Helpers\Validador;

class UsuarioController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new UsuarioService();
    }

    public function cadastrarUsuarios()
    {
        $this->view('Usuarios/cadastrarUsuario');
    }

    public function salvarTrabalhador()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return $this->redirect('/usuarios');
        }

        $trabalhador = [
            'Nome'           => trim($_POST['nome'] ?? ''),
            'CPF'            => trim($_POST['cpf'] ?? ''),
            'Genero'         => $_POST['genero'] ?? null,
            'Email'          => trim($_POST['email'] ?? ''),
            'Senha'          => $_POST['senha'] ?? '',
            'DataNascimento' => $_POST['dataNascimento'] ?? null,
            'FotoPerfil'     => trim($_POST['fotoPerfil'] ?? ''),
            'Endereco'       => trim($_POST['endereco'] ?? ''),
        ];

        $validador = new Validador();

        $validador
            ->obrigatorio('nome', $trabalhador['Nome'])
            ->obrigatorio('cpf', $trabalhador['CPF'])
            ->cpf('cpf', $trabalhador['CPF'])
            ->obrigatorio('email', $trabalhador['Email'])
            ->email('email', $trabalhador['Email'])
            ->obrigatorio('senha', $trabalhador['Senha'])
            ->minLength('senha', $trabalhador['Senha'], 6)
            ->obrigatorio('dataNascimento', $trabalhador['DataNascimento'])
            ->idadeMinima(
                'dataNascimento',
                $trabalhador['DataNascimento'],
                18,
                'Não aceitamos menores de 18 anos'
            )
            ->maxLength('endereco', $trabalhador['Endereco'], 255)
            ->obrigatorio('endereco', $trabalhador['Endereco'])
            ->obrigatorio('genero', $trabalhador['Genero'])
            ->imagem('fotoPerfil', $trabalhador['FotoPerfil']);

        if ($validador->temErros()) {
            return $this->view('Trabalhador/cadastrarTrabalhador', [
                'erros'   => $validador->getErros(),
                'usuario' => $trabalhador,
            ]);
        }

        $this->service->salvarTrabalhador($trabalhador);

        return $this->redirect('/usuarios');
    }

    public function salvarAdm()
    {
        $this->autenticacaoRequired();
        $this->adminRequired();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return $this->redirect('/usuarios');
        }

        $adm = [
            'Nome'           => trim($_POST['nome'] ?? ''),
            'CPF'            => trim($_POST['cpf'] ?? ''),
            'Genero'         => $_POST['genero'] ?? null,
            'Email'          => trim($_POST['email'] ?? ''),
            'Senha'          => $_POST['senha'] ?? '',
            'DataNascimento' => $_POST['dataNascimento'] ?? null,
            'FotoPerfil'     => trim($_POST['fotoPerfil'] ?? ''),
            'Endereco'       => trim($_POST['endereco'] ?? ''),
        ];

        $validador = new Validador();

        $validador
            ->obrigatorio('nome', $adm['Nome'])
            ->obrigatorio('cpf', $adm['CPF'])
            ->cpf('cpf', $adm['CPF'])
            ->obrigatorio('email', $adm['Email'])
            ->email('email', $adm['Email'])
            ->obrigatorio('senha', $adm['Senha'])
            ->minLength('senha', $adm['Senha'], 6)
            ->obrigatorio('dataNascimento', $adm['DataNascimento'])
            ->idadeMinima(
                'dataNascimento',
                $adm['DataNascimento'],
                18,
                'Não aceitamos menores de 18 anos'
            )
            ->maxLength('endereco', $adm['Endereco'], 255)
            ->obrigatorio('endereco', $adm['Endereco'])
            ->obrigatorio('genero', $adm['Genero'])
            ->imagem('fotoPerfil', $adm['FotoPerfil']);

        if ($validador->temErros()) {
            return $this->view('ADM/cadastrarADM', [
                'erros'   => $validador->getErros(),
                'usuario' => $adm,
            ]);
        }

        $this->service->salvarAdm($adm);

        return $this->redirect('/usuarios');
    }

    public function editar()
    {
        $this->autenticacaoRequired();
        $this->adminRequired();

        if (!isset($_GET['idUsuario'])) {
            return $this->redirect('/usuarios');
        }

        $usuario = $this->service->buscarPorId($_GET['idUsuario']);

        if (!$usuario) {
            return $this->redirect('/usuarios');
        }

        return $this->view('Usuarios/editarUsuario', [
            'usuario' => $usuario
        ]);
    }

    public function atualizar()
    {
        $this->autenticacaoRequired();
        $this->adminRequired();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return $this->redirect('/usuarios');
        }

        $usuario = [
            'IdUsuario'      => $_POST['idUsuario'] ?? null,
            'Nome'           => trim($_POST['nome'] ?? ''),
            'CPF'            => trim($_POST['cpf'] ?? ''),
            'Genero'         => $_POST['genero'] ?? null,
            'Email'          => trim($_POST['email'] ?? ''),
            'DataNascimento' => $_POST['dataNascimento'] ?? null,
            'FotoPerfil'     => trim($_POST['fotoPerfil'] ?? ''),
            'Endereco'       => trim($_POST['endereco'] ?? '')
        ];

        $validador = new Validador();

        $validador
            ->obrigatorio('nome', $usuario['Nome'])
            ->obrigatorio('cpf', $usuario['CPF'])
            ->cpf('cpf', $usuario['CPF'])
            ->obrigatorio('email', $usuario['Email'])
            ->email('email', $usuario['Email'])
            ->obrigatorio('dataNascimento', $usuario['DataNascimento'])
            ->idadeMinima(
                'dataNascimento',
                $usuario['DataNascimento'],
                18,
                'Não aceitamos menores de 18 anos'
            )
            ->maxLength('endereco', $usuario['Endereco'], 255)
            ->obrigatorio('endereco', $usuario['Endereco'])
            ->obrigatorio('genero', $usuario['Genero'])
            ->imagem('fotoPerfil', $usuario['FotoPerfil']);

        if ($validador->temErros()) {
            return $this->view('Usuarios/editarUsuario', [
                'erros'   => $validador->getErros(),
                'usuario' => $usuario,
            ]);
        }

        $this->service->atualizar($usuario);

        return $this->redirect('/usuarios');
    }

    public function cadastrarAdm()
    {
        $this->autenticacaoRequired();
        $this->adminRequired();

        return $this->view('ADM/cadastrarADM');
    }

    public function cadastrarTrabalhador()
    {

        return $this->view('Trabalhador/cadastrarTrabalhador');
    }

    public function listarTodosUsuarios()
    {
        $this->autenticacaoRequired();
        $this->adminRequired();

        $usuarios = $this->service->listarTodos();

        return $this->view('Usuarios/listarTodos', [
            'usuarios' => $usuarios
        ]);
    }

    public function alterarStatus()
    {
        $this->autenticacaoRequired();
        $this->adminRequired();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return $this->redirect('/usuarios');
        }

        $idUsuario = $_POST['idUsuario'] ?? null;
        $ativo = $_POST['ativo'] ?? null;

        if (!$idUsuario || $ativo === null) {
            return $this->redirect('/usuarios');
        }

        $this->service->alterarStatus(
            (int) $idUsuario,
            (bool) $ativo
        );

        return $this->redirect('/usuarios');
    }
}
