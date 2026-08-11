<?php

namespace App\Models;
//usar namespace e USE

//o nome da classe é diferente, porque Match é uma palavra reservada do PHP, dá erro de sintaxe
class MatchClass
{
    protected ?int $IdMatch;
    protected ?string $Data; //ver a tipagem 
    protected ?int $Status;
    //objeto trabalhador 1
    protected Trabalhador $Trabalhador1;
    //objeto trabalhador 2
    protected Trabalhador $Trabalhador2;
    //objeto acordo
    protected Acordo $Acordo;

    public function __construct(Trabalhador $Trabalhador1, Trabalhador $Trabalhador2, Acordo $Acordo, ?string $Data, ?int $Status)
    {
        $this->Trabalhador1 = $Trabalhador1;
        $this->Trabalhador2 = $Trabalhador2;
        $this->Acordo = $Acordo;
        $this->Data = $Data;
        $this->Status = $Status;  
    }

    //getters e setters

    public function getIdMatch(): ?int
    {
        return $this->IdMatch;
    }

    public function setIdMatch(?int $IdMatch): self
    {
        $this->IdMatch = $IdMatch;

        return $this;
    }

    public function getData(): ?string
    {
        return $this->Data;
    }

    public function setData(?string $Data): self
    {
        $this->Data = $Data;

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