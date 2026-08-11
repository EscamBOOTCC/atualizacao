<?php

namespace App\Models;
//E USE

class Penalidade
{
    protected ?int $IdPenalidade;
    protected ADM $ADM; //objeto ADM
    protected Denuncia $Denuncia; //objeto denuncia
    protected ?string $Motivo;
    protected ?int $Tipo;
    protected ?int $Status; 
    protected ?string $Data; //ver a tipagem 

    public function __construct(ADM $ADM, Denuncia $Denuncia, ?string $Motivo, ?int $Tipo, ?int $Status, ?string $Data)
    {
        $this->ADM = $ADM;
        $this->Denuncia = $Denuncia;
        $this->Motivo = $Motivo;
        $this->Tipo = $Tipo;
        $this->Status = $Status;
        $this->Data = $Data;
    }

    //getters e setters
    
    public function getIdPenalidade(): ?int
    {
        return $this->IdPenalidade;
    }

    public function setIdPenalidade(?int $IdPenalidade): self
    {
        $this->IdPenalidade = $IdPenalidade;

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

    public function getTipo(): ?int
    {
        return $this->Tipo;
    }

    public function setTipo(?int $Tipo): self
    {
        $this->Tipo = $Tipo;

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