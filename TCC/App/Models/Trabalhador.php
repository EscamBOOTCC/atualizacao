<?php

namespace App\Models;

class Trabalhador extends Usuario
{
    protected ?int $Classe;
    protected ?int $Status;

    //o construct faz depois
    public function __construct(?string $Nome,string $CPF, ?string $Genero, ?string $Email, ?int $DataNascimento, ?string $FotoPerfil, ?string $Endereco, ?int $Classe, ?int $Status)
    {
        //instancia a do parent (ver como vai funcionar no caso do ID)
        parent::__construct($Nome, $CPF, $Genero, $Email, $DataNascimento, $FotoPerfil, $Endereco);
        
        //atributos que sao somente da classe Trabalhador
        $this->Classe = $Classe;
        $this->Status = $Status;

    }

    //getters e setters
    
    public function getClasse(): ?int
    {
        return $this->Classe;
    }

    public function setClasse(?int $Classe): self
    {
        $this->Classe = $Classe;

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