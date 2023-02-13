<?php

namespace App;
use Src\Classes\Routes;

class Dispatch extends Routes{

    private $objecto;
    private $metodo = 'index';
    private $parametros = [];

    public function getMetodos(){ return $this->metodo; }
    public function setMetodos($metodo){ $this->metodo = $metodo; }
    public function getParametros(){ return $this->parametros; }
    public function setParametros($parametros){ $this->parametros = $parametros; }

    public function __construct()
    {
        self::addController();

    }

    private function addController()
    {
        $controller = $this->getUrl();
        $localController = "App\\Controllers\\".$controller; 
        $this->objecto = $localController;

        $this->objecto = new  $this->objecto;
     
        if(isset($this->parseUrl()[1]))
        {
          if(method_exists($this->objecto,$this->parseUrl()[1]))
          { 
            $this->setMetodos($this->parseUrl()[1]);
            self::addParametros();
            call_user_func_array([$this->objecto, $this->getMetodos()],$this->getParametros());
          }
           
        }else{
            call_user_func_array([$this->objecto, $this->metodo],$this->parametros);
        }
    }

    private function addParametros()
    {
        $parametrosUrl = count($this->parseUrl());

        if($parametrosUrl > 2)
        {
            foreach ($this->parseUrl() as $key => $value) {
                if($key > 1)
                {
                    $this->setParametros($this->parametros += [$key => $value]);
                }
            }
        }
    }

}