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
            '' => 'HomeController',
            'home' => 'HomeController',
            'user' => 'UserController',
            'sobre' => 'SobreController',
            'planos' => 'PlanosController',
            'actividades' => 'ActividadesController',
            'estatistica' => 'EstaticaController',
            'album' => 'AlbumController'
        ];

        if(array_key_exists($controller, $routes))
        {
            if(file_exists(DIRREQ.'app/controllers/'.$routes[$controller].'.php'))
            {
                    return $routes[$controller];
            }else{
                    echo "O ficheiro não existe";
            }
        }else{
            echo "A controller não existe";
        }
    }
}