<?php

namespace App\Models;

class Administrador extends Usuario
{
    /*os atributos da classe usuario sao os mesmos da classe usuario, 
    foi feito dessa forma porque tem funcoes que sao restritas ao ADM*/


    //essas funcoes tem que ficar no controller
    private function AcessarPaineldeControle()
    {
        //implementar
    }

    private function ModerarConteudo(?int $IdTrabalhador)
    {
        //implementar e ver esse Id, se tem que pegar o objeto na classe
    }

    private function AvaliarDenuncia(?int $IdDenuncia)
    {
        //implementar e rt na funcao de cima
    }

    private function AplicarPenalidade(?int $IdTrabalhador, ?string $Tipo)
    {
        //implementar e rt
    }
}