<?php

namespace App\Models;

class Acordo
{
    protected ?int $IdAcordo;
    //aqui precisa do objeto match, pois o acordo é feito a partir de um match
    protected MatchClass $Match; 
    protected ?int $Status; //ver que tipagem colocar aqui, nao lembro

    public function __construct(MatchClass $Match, ?int $Status)
    {
        $this->Match = $Match;
        $this->Status = $Status;
    }

    //Getters e Setters

    public function getIdAcordo(): ?int
    {
        return $this->IdAcordo;
    }

    public function setIdAcordo(?int $IdAcordo): self
    {
        $this->IdAcordo = $IdAcordo;

        return $this;
    }

    public function getMatch(): MatchClass
    {
        return $this->Match;
    }

    public function setMatch(MatchClass $Match): self
    {
        $this->Match = $Match;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->Status;
    }

    public function setStatus(?int $Status): self
    {
        $this->Status = $Status;

        return $this;
    }
}