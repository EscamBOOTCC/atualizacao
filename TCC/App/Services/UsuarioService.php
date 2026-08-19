<?php

namespace App\Services;

use App\Repositories\UsuarioRepository;

class UsuarioService
{
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

    public function salvarTrabalhador($trabalhador)
    {
        return $this->repository->salvarTrabalhador($trabalhador);
    }

    public function salvarAdm($adm)
    {
        return $this->repository->salvarAdm($adm);
    }

    //generelizado pq o listar atual, lista TODOS os usuarios, e o editar, é chamado pelo view do listar usuario, por um botao
    public function atualizar($usuario)
    {
        return $this->repository->atualizar($usuario);
    }
}
