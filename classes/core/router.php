<?php

class Router
{
    public $controller;
    public $method;
    public $viewPath ='views/pages';
    public $viewPathControllerName ='page';
    public $viewPathMethodName ='method';
         
    public function loadController(): void{                       
        $this->controller = $this->viewPath.'/'.$this->getController().'/controller.php';
       
        if(file_exists($this->controller)){
            include $this->controller;
        }else{
            echo "<br>no controller found.<br>";
        }                    
    }

    public function executeMethod():void{
        if(!empty($_REQUEST[$this->viewPathMethodName]) && !empty($_REQUEST[$this->viewPathControllerName]) && method_exists("Controller", $_REQUEST[$this->viewPathMethodName])){

            $method = $_REQUEST[$this->viewPathMethodName];
            $controller = new Controller();
            $controller->$method();
        }else{
            echo "<br>no method found<br>";
        }      
    }

    public function getController()
    {
        return $_REQUEST[$this->viewPathControllerName];     
    }

}