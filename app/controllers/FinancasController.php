<?php

namespace App\Controllers;
use Src\Classes\RoutesViews;

class FinancasController extends RoutesViews {

    public function index()
    {
        $this->renderizarViews('dashboard/financas/Financas');
    }
}