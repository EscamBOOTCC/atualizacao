<?php

namespace App\Models;

class Trabalhador extends Usuario
{
    protected ?int $Classe;
    protected ?int $StatusAcordo;

    //o construct faz depois
    public function __construct(?string $Nome, string $CPF, ?string $Genero, ?string $Email, ?int $DataNascimento, ?string $FotoPerfil, ?string $Endereco, ?int $Classe, ?int $StatusAcordo)
    {
        //instancia a do parent (ver como vai funcionar no caso do ID)
        parent::__construct($Nome, $CPF, $Genero, $Email, $DataNascimento, $FotoPerfil, $Endereco);

        //atributos que sao somente da classe Trabalhador
        $this->Classe = $Classe;
        $this->StatusAcordo = $StatusAcordo;
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

    public function getStatusAcordo(): ?int
    {
        return $this->StatusAcordo;
    }

    public function setStatusAcordo(?int $StatusAcordo): self
    {
        $this->StatusAcordo = $StatusAcordo;

        return $this;
    }
}
