<?php

namespace App\Controllers;

use App\Core\Controller;
//use App\Services\AutenticacaoService;

class AdministradorController extends Controller
{
    public function dashboard()
    {
        $this->autenticacaoRequired();
        $this->adminRequired();

        return $this->view('ADM/DashboardAdm');
    }

    public function moderarConteudo()
    {
        //implementar
    }

    public function avaliarDenuncia() //justificativa de cancelamento aqui
    {
        //implementar
    }

    public function aplicarPenalidade()
    {
        //implementar
    }
}
