<?php

class Router
{
    public $controller;
    public $method;
         
    public function loadController(): void{                       
        $this->controller = 'classes/views/'.$this->getController().'/'.$this->getController().'.php';
        if(file_exists($this->controller)){
            include $this->controller;
        }else{
            echo "<br>no controller found.<br>";
        }                    
    }

    public function executeMethod():void{
        if(!empty($_REQUEST["method"]) && !empty($_REQUEST["controller"]) && method_exists($_REQUEST["controller"], $_REQUEST["method"])){

            $method = $_REQUEST["method"];
            $controller = new $_REQUEST["controller"];
            $controller->$method();
        }else{
            echo "<br>no method found<br>";
        }      
    }

    public function getController()
    {
        return $_REQUEST["controller"];     
    }

}