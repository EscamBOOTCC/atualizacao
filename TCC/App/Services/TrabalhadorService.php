<?php

namespace app\services;

use \App\Repositories\UsuarioRepository;

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

    public function salvar($usuario)
    {
        return $this->repository->salvar($usuario);
    }
}