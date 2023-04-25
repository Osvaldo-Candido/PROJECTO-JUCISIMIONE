<?php
namespace App\Controllers;

use App\Models\ModelEscala;
use App\Models\ModelActividade;
use Src\Classes\RoutesViews;

class MembroController extends RoutesViews {

    public function index()
    {
        $this->renderizarUsuario('dashboard/CadastroLivre/PerfilMembro');
    }
    public function escala()
    {
        $class = new ModelEscala();
        $dados = $class->buscarEscalas();
        $this->renderizarUsuario('dashboard/CadastroLivre/Escala',$dados);
    }
    public function actividade()
    {
        $classe = new ModelActividade();
        $dados = $classe->buscarActividades();
        $this->renderizarUsuario('dashboard/CadastroLivre/Actividades',$dados);

    }
    public function terminarSessao()
    {
        if(isset($_SESSION['nome']) && isset($_SESSION['categoria']) && isset($_SESSION['id_unico'])){
            unset($_SESSION['nome']);
            unset($_SESSION['categoria']);
            unset($_SESSION['id_unico']);
            header('Location:'.DIRPAGE.'login\index');
        }
    }
}