<?php

namespace App\Models;

class ExperienciaProfissional
{
    protected ?int $IdExperienciaProfissional;
    //objeto trabalhador aqui
    protected Trabalhador $Trabalhador;
    protected ?string $Empresa;
    protected ?string $Cargo;
    protected ?string $Descricao;

    public function __construct(Trabalhador $Trabalhador, ?string $Empresa, ?string $Cargo, ?string $Descricao)
    {
        $this->Trabalhador = $Trabalhador;
        $this->Empresa = $Empresa;
        $this->Cargo = $Cargo;
        $this->Descricao = $Descricao;
    }

    //Getters e Setters

    public function getIdExperienciaProfissional(): ?int
    {
        return $this->IdExperienciaProfissional;
    }

    public function setIdExperienciaProfissional(?int $IdExperienciaProfissional): self
    {
        $this->IdExperienciaProfissional = $IdExperienciaProfissional;

        return $this;
    }

    public function getEmpresa(): ?string
    {
        return $this->Empresa;
    }

    public function setEmpresa(?string $Empresa): self
    {
        $this->Empresa = $Empresa;

        return $this;
    }

    public function getCargo(): ?string
    {
        return $this->Cargo;
    }

    public function setCargo(?string $Cargo): self
    {
        $this->Cargo = $Cargo;

        return $this;
    }

    public function getDescricao(): ?string
    {
        return $this->Descricao;
    }

    public function setDescricao(?string $Descricao): self
    {
        $this->Descricao = $Descricao;

        return $this;
    }
}