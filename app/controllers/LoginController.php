<?php
namespace App\Controllers;
use Src\Classes\RoutesViews;

class LoginController extends RoutesViews {

    public function index()
    {
        $this->renderizarLogin('Login/Home');
    }

}