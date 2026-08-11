<?php

namespace App\Models;

class Bloqueio
{
    protected ?int $IdBloqueio;
    //aqui precisa do objeto trabalhador, pois o bloqueio é feito a algum trabalhador
    protected Trabalhador $Trabalhador;
    protected ?int $Data; //ver que tipagem colocar aqui, nao lembro

    public function __construct(Trabalhador $Trabalhador, ?int $Data)
    {
        $this->Trabalhador = $Trabalhador;
        $this->Data = $Data;
    }

    //Getters e Setters

    public function getIdBloqueio(): ?int
    {
        return $this->IdBloqueio;
    }

    public function setIdBloqueio(?int $IdBloqueio): self
    {
        $this->IdBloqueio = $IdBloqueio;

        return $this;
    }

    public function getData(): ?int
    {
        return $this->Data;
    }

    public function setData(?int $Data): self
    {
        $this->Data = $Data;

        return $this;
    }
}