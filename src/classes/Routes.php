<?php

namespace Src\Classes;
use Src\Traits\TraitsParseUrl;

class Routes {

    use TraitsParseUrl;

    public function getUrl()
    { 
        $url = $this->parseUrl();       
        $controller = $url[0];

        $routes = [
            '' => 'LoginController',
            'home' => 'HomeController',
            'user' => 'UserController',
            'sobre' => 'SobreController',
            'planos' => 'PlanosController',
            'actividades' => 'ActividadesController',
            'estatistica' => 'EstaticaController',
            'financas' => 'FinancasController',
            'login' => 'LoginController',
            'album' => 'AlbumController'
        ];

        if(array_key_exists($controller, $routes))
        {
        
            if(file_exists(DIRREQ.'app/controllers/'.$routes[$controller].'.php'))
            { 
              if(isset($_SESSION['nome']) && isset($_SESSION['cargo']) && isset($_SESSION['id_unico'])){
                    return $routes[$controller];
                 }else{
                 return $routes['login'];
               }
            }else{
                    echo "O ficheiro não existe";
            }
        }else{
             return $routes['login'];
        }
    }
}