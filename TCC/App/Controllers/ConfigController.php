<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Database\ConnectionFactory;


class ConfigController extends Controller
{

    private $conn;

    public function __construct()
    {
        $this->conn = ConnectionFactory::getConnection();

        if (!DEV_ENVIRONMENT) {
            $this->redirect(URL_BASE . "/login");
        }
    }


    public function criarADMs()
    {


        $usuarios = [
            [
                'nome' => 'admin',
                'cpf' => '000000000009',
                'email' => 'admin@admin',
                'ativo' => true,
                'senha' => password_hash("admin", PASSWORD_BCRYPT)
            ],
            [
                'nome' => 'Luiza',
                'cpf' => '00000000001',
                'email' => 'Luiza@admin',
                'ativo' => true,
                'senha' => password_hash("Luiza", PASSWORD_BCRYPT)
            ],
            [
                'nome' => 'Rafa',
                'cpf' => '00000000002',
                'email' => 'Rafa@admin',
                'ativo' => true,
                'senha' => password_hash("Rafa", PASSWORD_BCRYPT)

            ],
            [
                'nome' => 'Evillyn',
                'cpf' => '00000000003',
                'email' => 'Evillyn@admin',
                'ativo' => true,
                'senha' => password_hash("Evillyn", PASSWORD_BCRYPT)

            ],
            [
                'nome' => 'Sarah',
                'cpf' => '00000000004',
                'email' => 'Sarah@admin',
                'ativo' => true,
                'senha' => password_hash("Sarah", PASSWORD_BCRYPT)

            ]
        ];

        $sqlUsuario = "INSERT INTO Usuario (Nome, CPF, Genero, Email, Senha, DataNascimento, FotoPerfil, Endereco, Ativo) 
        VALUES (:nome, :cpf, NULL, :email, :senha, NULL, NULL, NULL, true)";

        $sqlAdm = "INSERT INTO ADM (IdAdm) VALUES (:idAdm)";

        $stmtUsuario = $this->conn->prepare($sqlUsuario);

        $stmtAdm = $this->conn->prepare($sqlAdm);

        foreach ($usuarios as $usuario) {


            // Insere o usuário
            $stmtUsuario->execute([
                ':nome'  => $usuario['nome'],
                ':cpf'   => $usuario['cpf'],
                ':email' => $usuario['email'],
                ':senha' => $usuario['senha']
            ]);

            // Recupera o ID gerado pelo MySQL
            $idUsuario = $this->conn->lastInsertId();

            // Define o usuário como administrador
            $stmtAdm->execute([
                ':idAdm' => $idUsuario
            ]);
        }

        $this->redirect(URL_BASE . "/login");
    }
}
