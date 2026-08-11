<?php

namespace App\Models;

class GrandesAreas
{
    protected ?int $IdGrandesAreas;
    protected ?string $Nome;

    //nao faremos __construct nessa, pois as grandes áreas serão pré-settadas no banco, cabe ao ADM inserir diretamente lá, se houver a necessidade.

    //Getters (nao havera setters)
    
    public function getIdGrandesAreas(): ?int
    {
        return $this->IdGrandesAreas;
    }

    public function getNome(): ?string
    {
        return $this->Nome;
    }
}