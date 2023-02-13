<?php 

namespace App\Controllers;
use Src\Classes\RoutesViews;

class HomeController extends RoutesViews {

    public function index()
    {
        $this->renderizarViews("dashboard\\DashboardView");
    }

}