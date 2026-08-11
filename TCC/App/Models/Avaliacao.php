<?php

namespace App\Models;

class Avaliacao
{
    protected ?int $IdAvaliacao;
    //aqui precisa do objeto servico, pois a avaliacao é feita a algum servico
    protected Servico $Servico;
    protected ?float $Nota;  
    protected ?int $Data; //ver que tipagem colocar aqui, nao lembro
    protected ?string $Comentario;

    public function __construct(Servico $Servico, ?float $Nota, ?int $Data, ?string $Comentario)
    {
        $this->Servico = $Servico; //ver se isso aqui é assim, ou se o construct precisa de algo a mais por ser um objeto
        $this->Nota = $Nota;
        $this->Data = $Data;
        $this->Comentario = $Comentario;
    }

    //Getters e Setters 

    public function getIdAvaliacao(): ?int
    {
        return $this->IdAvaliacao;
    }

    public function setIdAvaliacao(?int $IdAvaliacao): self
    {
        $this->IdAvaliacao = $IdAvaliacao;

        return $this;
    }

    public function getNota(): ?float
    {
        return $this->Nota;
    }

    public function setNota(?float $Nota): self
    {
        $this->Nota = $Nota;

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

    public function getComentario(): ?string
    {
        return $this->Comentario;
    }

    public function setComentario(?string $Comentario): self
    {
        $this->Comentario = $Comentario;

        return $this;
    }
}