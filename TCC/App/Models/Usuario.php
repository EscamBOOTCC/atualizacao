<?php

namespace App\Models;

class Usuario
{
    protected ?int $IdUsuario;
    protected ?string $Nome;
    protected ?string $CPF;
    protected ?string $Genero;
    protected ?string $Email;
    protected ?int $DataNascimento; //ver tipagem aqui
    protected ?string $FotoPerfil; //ver tipagem aqui tambem
    protected ?string $Endereco;

    public function __construct(?string $Nome,string $CPF, ?string $Genero, ?string $Email, ?int $DataNascimento, ?string $FotoPerfil, ?string $Endereco)
    {
        //o IdUsuario tem tratamento diferente, ver como tratar mais tarde
        $this->Nome = $Nome;
        $this->CPF = $CPF;
        $this->Genero = $Genero;
        $this->Email = $Email;
        $this->DataNascimento = $DataNascimento;
        $this->FotoPerfil = $FotoPerfil;
        $this->Endereco = $Endereco;
    }

    //getters e setters

    public function getIdUsuario(): ?int
    {
        return $this->IdUsuario;
    }

    public function setIdUsuario(?int $IdUsuario): self
    {
        $this->IdUsuario = $IdUsuario;

        return $this;
    }

    public function getNome(): ?string
    {
        return $this->Nome;
    }

    public function setNome(?string $Nome): self
    {
        $this->Nome = $Nome;

        return $this;
    }

    public function getCPF(): ?string
    {
        return $this->CPF;
    }

    public function setCPF(?string $CPF): self
    {
        $this->CPF = $CPF;

        return $this;
    }

    public function getGenero(): ?string
    {
        return $this->Genero;
    }

    public function setGenero(?string $Genero): self
    {
        $this->Genero = $Genero;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(?string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getDataNascimento(): ?int
    {
        return $this->DataNascimento;
    }

    public function setDataNascimento(?int $DataNascimento): self
    {
        $this->DataNascimento = $DataNascimento;

        return $this;
    }

    public function getFotoPerfil(): ?string
    {
        return $this->FotoPerfil;
    }

    public function setFotoPerfil(?string $FotoPerfil): self
    {
        $this->FotoPerfil = $FotoPerfil;

        return $this;
    }

    public function getEndereco(): ?string
    {
        return $this->Endereco;
    }

    public function setEndereco(?string $Endereco): self
    {
        $this->Endereco = $Endereco;

        return $this;
    }
}