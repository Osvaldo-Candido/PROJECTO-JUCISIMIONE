<?php

namespace App\Controllers;

use Src\Classes\RoutesViews;

class PlanosController extends RoutesViews {

    public function index ()
    {
        $this->renderizarViews('dashboard/plano/Planificacao');
    }
    
    public function viewCadastrarPlano()
    {
        $this->renderizarViews('dashboard/plano/AdicionarPlano');
    }
}