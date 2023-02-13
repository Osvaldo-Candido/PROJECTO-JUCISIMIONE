<?php 

namespace App\Controllers;

use Src\Classes\RoutesViews;

class ActividadesController extends RoutesViews {

    public function index()
    {
        $this->renderizarViews('dashboard/planosActividades/ActividadesGerais');   
    }

    public function viewCadastrarActividade()
    {
        $this->renderizarViews('dashboard/planosActividades/AdicionarActividade');   
    }
}