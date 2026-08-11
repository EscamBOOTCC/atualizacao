<?php
namespace app\repositories;

use App\Database\ConnectionFactory;
use App\Models\Usuario;

class UsuarioRepository
{

    private $conn;

    public function __construct()
    {
        $this->conn = ConnectionFactory::getConnection();
    }
    public function findById(): array
    {
         $sql = "SELECT u.IdUsuario, u.Nome, u.Email, u.Genero, u.FotoPerfil,
                       CASE WHEN a.IdAdm IS NOT NULL THEN 'adm' ELSE 'trabalhador' END AS Tipo
                FROM Usuario u
                LEFT JOIN ADM a ON a.IdAdm = u.IdUsuario";
 
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
 
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function findAll(): array
    {
        $sql = "SELECT u.IdUsuario, u.Nome, u.Email, u.Genero, u.FotoPerfil,
                       CASE WHEN a.IdAdm IS NOT NULL THEN 'adm' ELSE 'trabalhador' END AS Tipo
                FROM Usuario u
                LEFT JOIN ADM a ON a.IdAdm = u.IdUsuario";
 
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
 
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function findByEmail(string $email): ?array
    {
        $sql = "SELECT u.IdUsuario, u.Nome, u.CPF, u.Genero, u.Email, u.Senha, u.FotoPerfil,
                       CASE WHEN a.IdAdm IS NOT NULL THEN 'adm' ELSE 'trabalhador' END AS Tipo
                FROM Usuario u
                LEFT JOIN ADM a ON a.IdAdm = u.IdUsuario
                WHERE u.Email = :email";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':email' => $email]);

        $usuario = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $usuario ?: null;
    }

   public function salvar($usuario)
{
    $sql = "INSERT INTO Usuario
            (Nome, CPF, Genero, Email, Senha, DataNascimento, FotoPerfil, Endereco)
            VALUES
            (:nome, :cpf, :genero, :email, :senha, :dataNascimento, :fotoPerfil, :endereco)";

    $stmt = $this->conn->prepare($sql);

    return $stmt->execute([
        ':nome' => $usuario['Nome'],
        ':cpf' => $usuario['CPF'],
        ':genero' => $usuario['Genero'],
        ':email' => $usuario['Email'],
        ':senha' => password_hash($usuario['Senha'], PASSWORD_DEFAULT),
        ':dataNascimento' => $usuario['DataNascimento'],
        ':fotoPerfil' => $usuario['FotoPerfil'],
        ':endereco' => $usuario['Endereco']
    ]);
}
 
}