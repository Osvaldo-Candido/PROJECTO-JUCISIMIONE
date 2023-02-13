<?php 

namespace App\Controllers;

use Src\Classes\RoutesViews;

class UserController extends RoutesViews {

    public function index ()
    {
            $this->renderizarViews('dashboard/membros/Mostrar');
    }

    public function viewCadastrarMembro()
    {
        $this->renderizarViews('dashboard/membros/Adicionar');
    }

    public function viewPerfilMembro()
    {
        $this->renderizarViews('dashboard/membros/perfil');
    }
}