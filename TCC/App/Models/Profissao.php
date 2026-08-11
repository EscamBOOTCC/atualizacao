<?php

namespace App\Models;

class Profissao
{
    protected ?int $IdProfissao;
    protected ?string $Nome;
    protected GrandesAreas $GrandesAreas; //objeto grandes areas

    public function __construct(GrandesAreas $GrandesAreas, ?string $Nome)
    {
        $this->GrandesAreas = $GrandesAreas;
        $this->Nome = $Nome;
    }

    //Getters e Setters
    
    public function getIdProfissao(): ?int
    {
        return $this->IdProfissao;
    }

    public function setIdProfissao(?int $IdProfissao): self
    {
        $this->IdProfissao = $IdProfissao;

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
}