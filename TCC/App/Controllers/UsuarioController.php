<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Services\UsuarioService;
use App\Helpers\Validador;

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
        // fiz encadeado pra nao ter que repetir validador a cada coisa que eu tenho que validar aqui
        $validador
            ->obrigatorio('nome', $trabalhador['Nome'])
            ->obrigatorio('cpf', $trabalhador['CPF'])
            ->cpf('cpf', $trabalhador['CPF'])
            ->obrigatorio('email', $trabalhador['Email'])
            ->email('email', $trabalhador['Email'])
            ->obrigatorio('senha', $trabalhador['Senha'])
            ->minLength('senha', $trabalhador['Senha'], 6)
            ->obrigatorio('dataNascimento', $trabalhador['DataNascimento'])
            ->idadeMinima('dataNascimento', $trabalhador['DataNascimento'], 18, 'Não aceitamos menores de 18 anos')
            ->maxLength('endereco', $trabalhador['Endereco'], 255);

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
            ->idadeMinima('dataNascimento', $adm['DataNascimento'], 18, 'Não aceitamos menores de 18 anos')
            ->maxLength('endereco', $adm['Endereco'], 255);

        if ($validador->temErros()) {
            return $this->view('Trabalhador/cadastrarTrabalhador', [
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

        if (!isset($_GET['idUsuario'])) {
            return $this->redirect('/usuarios');
        }

        $usuario = $this->service->buscarPorId($_GET['idUsuario']);

        if (!$usuario) {
            return $this->redirect('/usuarios');
        }

        return $this->view('Usuarios/editarUsuario', ['usuario' => $usuario]);
    }
    public function atualizar()
    {
        $this->autenticacaoRequired();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return $this->redirect('/usuarios');
        }

        $usuario = [
            'IdUsuario' => $_POST['idUsuario'] ?? null,
            'Nome' => trim($_POST['nome'] ?? ''),
            'CPF' => trim($_POST['cpf'] ?? ''),
            'Genero' => $_POST['genero'] ?? null,
            'Email' => trim($_POST['email'] ?? ''),
            'DataNascimento' => $_POST['dataNascimento'] ?? null,
            'FotoPerfil' => trim($_POST['fotoPerfil'] ?? ''),
            'Endereco' => trim($_POST['endereco'] ?? '')
        ];

        $validador = new validador();
        $validador
            ->obrigatorio('nome', $usuario['Nome'])
            ->obrigatorio('cpf', $usuario['CPF'])
            ->cpf('cpf', $usuario['CPF'])
            ->obrigatorio('email', $usuario['Email'])
            ->email('email', $usuario['Email'])
            ->obrigatorio('senha', $usuario['Senha'])
            ->minLength('senha', $usuario['Senha'], 6)
            ->obrigatorio('dataNascimento', $usuario['DataNascimento'])
            ->idadeMinima('dataNascimento', $usuario['DataNascimento'], 18, 'Não aceitamos menores de 18 anos')
            ->maxLength('endereco', $usuario['Endereco'], 255);

      
         if ($validador->temErros()) {
            return $this->view('usuario/editarUsuario', [
                'erros'   => $validador->getErros(),
                'usuario' => $usuario,
            ]);
        }
///pq caralhos a validacao de editar nao ta funcionando unhe 

        $this->service->atualizar($usuario);

        return $this->redirect('/usuarios');
    }

    public function cadastrarAdm()
    {
        return $this->view('ADM/cadastrarADM');
    }
    public function cadastrarTrabalhador()
    {
        return $this->view('Trabalhador/cadastrarTrabalhador');
    }
    public function listarTodosUsuarios()
    {
        $usuario = $this->service->listarTodos();

        return $this->view('Usuarios/listarTodos', ['usuarios' => $usuario]);
    }

    public function listarUsuario()
    {
        if (! isset($_GET['idUsuario'])) {
            return $this->redirect('/');
        }

        $usuario = $this->service->buscarPorId($_GET['id']);

        if (! $usuario) {
            return $this->redirect('/');
        }

        return $this->view('/listar', ['usuario' => $usuario]);
    }

    public function deletarUsuario()
    {
        //Implementar
    }
}
