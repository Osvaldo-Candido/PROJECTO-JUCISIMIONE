<?php 

namespace Src\Classes;

class RoutesViews{

    private $dados = [];
    private $report = [];
    private $view;
    private $aniversariantes = [];
    private $actividades = [];
    private $receitas = [];
    private $numeroAniversariantes = [];

    public function renderizarViews($view, $dados = null,$report = null,$aniversariantes = null, $actividades = null, $receitas = null, $numeroAnivers = null )
    {
        
        $this->actividades = $actividades;
        $this->dados = $dados;
        $this->report = $report;
        $this->aniversariantes = $aniversariantes;
        $this->receitas = $receitas;
        $this->view = $view;
        $this->numeroAniversariantes = $numeroAnivers;

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
    public function renderizarLogin($view,$dados = null )
    {
        $this->dados = $dados;
        $this->view = $view;

        $ficheiro = DIRREQ."app/views/".$this->view.".php";
        
        if(file_exists($ficheiro))
        {
            require_once DIRREQ."app/views/login/header.php";
            require_once $ficheiro;
            require_once DIRREQ."app/views/login/header.php";
        }else{
            echo "O ficheiro não existe AQUI";
        }
    }

}