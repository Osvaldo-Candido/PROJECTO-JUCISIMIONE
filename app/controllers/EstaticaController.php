<?php
namespace App\Controllers;
use Src\Classes\RoutesViews;

class EstaticaController extends RoutesViews {

    public function index()
    {
        $this->renderizarViews('dashboard/relatorios/Relatorios');   
    }
}