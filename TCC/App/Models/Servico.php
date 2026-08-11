<?php

namespace App\Models;

class Servico
{
    protected ?int $IdServico;
    protected ?string $Nome;
    protected ?int $Nivel;
    protected Trabalhador $Trabalhador; //objeto Trabalhador
    protected Avaliacao $Avaliacao; //objeto Avaliacao
    protected Profissao $Profissao; //objeto Profissao

    public function __construct(?string $Nome, ?int $Nivel)
    {
        $this->Nome = $Nome;
        $this->Nivel = $Nivel;
    }

    //getters e setters

    public function getIdServico(): ?int
    {
        return $this->IdServico;
    }

    public function setIdServico(?int $IdServico): self
    {
        $this->IdServico = $IdServico;

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

    public function getNivel(): ?int
    {
        return $this->Nivel;
    }

    public function setNivel(?int $Nivel): self
    {
        $this->Nivel = $Nivel;

        return $this;
    }
}