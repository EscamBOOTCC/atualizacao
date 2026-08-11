<?php
namespace app\services;
use \App\Models\Usuario;
use \App\Repositories\UsuarioRepository;

class UsuarioService{

private $repository;

    public function __construct()
    {
        $this->repository = new UsuarioRepository();
    }
     public function buscarPorId($id)
    {
        return $this->repository->findById($id);
    }
     public function listarTodos(): array
    {
        return $this->repository->findAll();
    }
    public function buscarPorEmail(string $email): ?array
    {
        return $this->repository->findByEmail($email);
    }
    public function salvar($usuario)
    {
        return $this->repository->salvar($usuario);
    }

}