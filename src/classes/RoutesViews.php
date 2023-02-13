<?php 

namespace Src\Classes;

class RoutesViews{

    private $dados;
    private $view;

    public function renderizarViews($view, $dados = null )
    {
        $this->$dados = $dados;
        $this->view = $view;

        $ficheiro = DIRREQ."app/views/".$this->view.".php";
        
        if(file_exists($ficheiro))
        {
            require_once DIRREQ."app/views/layout/Head.php";
            require_once $ficheiro;
            require_once DIRREQ."app/views/layout/Footer.php";
        }else{
            echo "O ficheiro não existe AQUI";
        }
    }

}