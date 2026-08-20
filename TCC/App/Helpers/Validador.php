<?php

namespace app\helpers;

class Validador
{

    private array $erros = [];

    public function obrigatorio(string $campo, mixed $valor, ?string $mensagem = null)
    {
        if (empty($valor) && $valor !== '0') {
            $this->erros[$campo] = $mensagem ?? "O campo {$campo} é obrigatório";
        }

        return $this;
    }


    public function email(string $campo, string $email, ?string $mensagem = null)
    {
        if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->erros[$campo] = $mensagem ?? "O campo {$campo} deve ser um e-mail válido";
        }

        return $this;
    }

    public function cpf(string $campo, string $cpf, ?string $mensagem = null)
    {
        $cpf = preg_replace('/[^0-9]/', '', $cpf);

        if (!empty($cpf)) {
            if (strlen($cpf) != 11 || str_repeat($cpf[0], 11) === $cpf) {
                $this->erros[$campo] = $mensagem ?? "O campo {$campo} deve ser um CPF válido";
            }
        }

        return $this;
    }

    public function minLength(string $campo, string $valor, int $minimo, ?string $mensagem = null)
    {
        if (!empty($valor) && strlen($valor) < $minimo) {
            $this->erros[$campo] = $mensagem ?? "O campo {$campo} deve ter no mínimo {$minimo} caracteres";
        }

        return $this;
    }

    public function maxLength(string $campo, string $valor, int $maximo, ?string $mensagem = null)
    {
        if (!empty($valor) && strlen($valor) > $maximo) {
            $this->erros[$campo] = $mensagem ?? "O campo {$campo} deve ter no máximo {$maximo} caracteres";
        }

        return $this;
    }

    public function idadeMinima(string $campo, ?string $dataNascimento, int $idadeMinima = 18, ?string $mensagem = null)
    {
        if (empty($dataNascimento)) {
            return $this;
        }

        $nascimento = \DateTime::createFromFormat('Y-m-d', $dataNascimento);

        if (!$nascimento) {
            $this->erros[$campo] = $mensagem ?? "Data de nascimento inválida";
            return $this;
        }

        $idade = $nascimento->diff(new \DateTime())->y;

        if ($idade < $idadeMinima) {
            $this->erros[$campo] = $mensagem ?? "Não aceitamos menores de {$idadeMinima} anos";
        }

        return $this;
    }
    public function imagem($campo, $valor)
    {
        if (empty($valor)) {
            $this->erros[$campo] = "O link da imagem é obrigatório.";
            return false;
        }

        if (!filter_var($valor, FILTER_VALIDATE_URL)) {
            $this->erros[$campo] = "Informe um link válido.";
            return false;
        }

        return true;
    }
    public function temErros(): bool
    {
        return !empty($this->erros);
    }

    public function getErros()
    {
        return $this->erros;
    }
}
