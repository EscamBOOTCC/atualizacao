<?php

namespace app\repositories;

use App\Database\ConnectionFactory;

class UsuarioRepository
{
    private $conn;

    public function __construct()
    {
        $this->conn = ConnectionFactory::getConnection();
    }

    public function findById(int $id): ?array
    {
        $sql = "SELECT 
                    u.IdUsuario,
                    u.Nome,
                    u.CPF,
                    u.Genero,
                    u.Email,
                    u.FotoPerfil,
                    CASE 
                        WHEN a.IdAdm IS NOT NULL THEN 'adm'
                        ELSE 'trabalhador'
                    END AS Tipo
                FROM Usuario u
                LEFT JOIN ADM a ON a.IdAdm = u.IdUsuario
                WHERE u.IdUsuario = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);

        $usuario = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $usuario ?: null;
    }

    public function findAll(): array
    {
        $sql = "SELECT 
                    u.IdUsuario,
                    u.Nome,
                    u.Email,
                    u.Genero,
                    u.FotoPerfil,
                    CASE 
                        WHEN a.IdAdm IS NOT NULL THEN 'adm'
                        ELSE 'trabalhador'
                    END AS Tipo
                FROM Usuario u
                LEFT JOIN ADM a ON a.IdAdm = u.IdUsuario";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function findByEmail(string $email): ?array
    {
        $sql = "SELECT 
                    u.IdUsuario,
                    u.Nome,
                    u.CPF,
                    u.Genero,
                    u.Email,
                    u.Senha,
                    u.FotoPerfil,
                    CASE 
                        WHEN a.IdAdm IS NOT NULL THEN 'adm'
                        ELSE 'trabalhador'
                    END AS Tipo
                FROM Usuario u
                LEFT JOIN ADM a ON a.IdAdm = u.IdUsuario
                WHERE u.Email = :email";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':email' => $email
        ]);

        $usuario = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $usuario ?: null;
    }

    public function salvar(array $usuario)
    {
        $sql = "INSERT INTO Usuario
                    (Nome, CPF, Genero, Email, Senha, DataNascimento, FotoPerfil, Endereco)
                VALUES
                    (:nome, :cpf, :genero, :email, :senha, :dataNascimento, :fotoPerfil, :endereco)";

        $stmt = $this->conn->prepare($sql);

        $sucesso = $stmt->execute([
            ':nome' => $usuario['Nome'],
            ':cpf' => $usuario['CPF'],
            ':genero' => $usuario['Genero'],
            ':email' => $usuario['Email'],
            ':senha' => password_hash($usuario['Senha'], PASSWORD_DEFAULT),
            ':dataNascimento' => $usuario['DataNascimento'],
            ':fotoPerfil' => $usuario['FotoPerfil'],
            ':endereco' => $usuario['Endereco']
        ]);

        if ($sucesso) {
            return $this->conn->lastInsertId();
        }

        return false;
    }

    public function salvarTrabalhador(array $trabalhador)
    {
        try {
            $this->conn->beginTransaction();

            // Primeiro cria o usuário
            $idUsuario = $this->salvar($trabalhador);

            if (!$idUsuario) {
                throw new \Exception("Erro ao cadastrar usuário.");
            }

            // Depois cria o trabalhador usando o mesmo ID
            $sql = "INSERT INTO Trabalhador
                        (IdTrabalhador, Classe, `Status`)
                    VALUES
                        (:idTrabalhador, :classe, :status)";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':idTrabalhador' => $idUsuario,
                ':classe' => $trabalhador['Classe'],
                ':status' => 'off'
            ]);

            $this->conn->commit();

            return $idUsuario;

        } catch (\Exception $e) {

            $this->conn->rollBack();

            throw $e;
        }
    }

    public function salvarAdm(array $adm)
    {
        try {
            $this->conn->beginTransaction();

            // Primeiro cria o usuário
            $idUsuario = $this->salvar($adm);

            if (!$idUsuario) {
                throw new \Exception("Erro ao cadastrar usuário.");
            }

            // Depois cria o administrador usando o mesmo ID
            $sql = "INSERT INTO ADM
                        (IdAdm)
                    VALUES
                        (:idAdm)";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':idAdm' => $idUsuario
            ]);

            $this->conn->commit();

            return $idUsuario;

        } catch (\Exception $e) {

            $this->conn->rollBack();

            throw $e;
        }
    }
}