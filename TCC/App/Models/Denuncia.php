<?php

namespace App\Models;


class Denuncia
{
    protected ?int $IdDenuncia;
    protected Penalidade $Penalidade; //objeto penalidade
    protected Trabalhador $Trabalhador; //objeto trabalhador
    protected ?string $Motivo;
    protected ?string $Status; //ver se é string ou int, precisamos definir
    protected ?string $Data; //ver a tipagem 

    public function __construct(Penalidade $Penalidade, Trabalhador $Trabalhador, ?string $Motivo, ?string $Status, ?string $Data)
    {
        $this->Penalidade = $Penalidade;
        $this->Trabalhador = $Trabalhador;
        $this->Motivo = $Motivo;
        $this->Status = $Status;
        $this->Data = $Data;
    }

    //getters e setters

    public function getIdDenuncia(): ?int
    {
        return $this->IdDenuncia;
    }

    public function setIdDenuncia(?int $IdDenuncia): self
    {
        $this->IdDenuncia = $IdDenuncia;

        return $this;
    }

    public function getMotivo(): ?string
    {
        return $this->Motivo;
    }

    public function setMotivo(?string $Motivo): self
    {
        $this->Motivo = $Motivo;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->Status;
    }

    public function setStatus(?string $Status): self
    {
        $this->Status = $Status;

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
}