<?php

namespace App\Services;

use App\Services\UsuarioService;

class LoginService
{
    private UsuarioService $usuarioService;

    public function __construct()
    {
        $this->usuarioService = new UsuarioService();
    }

    public function autenticar(string $email, string $senha): ?array
    {
        $usuario = $this->usuarioService->buscarPorEmail($email);

        if (!$usuario) {
            return null;
        }

        // Usuário desativado não pode fazer login
        if ((int) $usuario['Ativo'] !== 1) {
            return null;
        }

        // Senha incorreta
        if (!password_verify($senha, $usuario['Senha'])) {
            return null;
        }

        unset($usuario['Senha']);

        return $usuario;
    }

    public function salvarUsuarioSessao(array $usuario): void
    {
        $_SESSION['usuario_logado'] = $usuario;
    }

    public function apagarDadosSessao(): void
    {
        unset($_SESSION['usuario_logado']);
    }

    public function getNomeUsuarioLogado(): ?string
    {
        return $_SESSION['usuario_logado']['Nome'] ?? null;
    }

    public function getUsuarioLogado(): ?array
    {
        return $_SESSION['usuario_logado'] ?? null;
    }

    public function usuarioEstaLogado(): bool
    {
        return isset($_SESSION['usuario_logado']);
    }
}
