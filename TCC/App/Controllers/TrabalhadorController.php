<?php

namespace App\Controllers;

use App\Core\Controller;
use App\services\TrabalhadorService;

class TrabalhadorController extends Controller
{
    //a funcionalidade de login e autenticacao virao da camada service mais tardar

    public function atualizarInteresseArea() //mais complexo que isso, talvez ja esteja no usuario
    {
        //Implementar
    }

    public function disponibilidade()
    {
        //Vai verificar se esta com um servico disponivel, ou se esta com acordo fechado com outra parte.
    }

    //ver se pode fazer assim, de separar os listar, porque posso puxar o listar usuario e especificar aqui

    public function listarServico()
    {
        //Implementar
    }

    public function listarClasse()
    {
        //Implementar
    }

    public function listarAvaliacao()
    {
        //Implementar
    }

    public function listarAreaInteresse()
    {
        //Implementar
    }

}