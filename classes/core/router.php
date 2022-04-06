<?php

class Router
{
    public $controller;
    public $method;
    public $viewPath ='views/pages';
    public $viewPathControllerName ='page';
    public $viewPathMethodName ='method';
         
    public function loadController($controller = ""): void{       
      
        if($controller==""){
            $this->controller = $this->viewPath.'/'.$this->getController().'/controller.php';       
        }else{
            $this->controller = $this->viewPath.'/'.$controller.'/controller.php';       
        }
        
        
        if(file_exists($this->controller)){
            include $this->controller;
        }else{
            //echo "<br>no controller found.<br>";
            $this->controller = $this->viewPath.'/home/controller.php';
            include $this->controller;
        }                    
    }

    public function executeMethod($method = ''):void{
        
        if($method == ''){            
            if(!empty($_REQUEST[$this->viewPathMethodName]) && !empty($_REQUEST[$this->viewPathControllerName]) && method_exists("Controller", $_REQUEST[$this->viewPathMethodName])){

                $method = $_REQUEST[$this->viewPathMethodName];
                $controller = new Controller();
                $controller->$method();
            }else{
                // echo "<br>no method found<br>";
                $controller = new Controller();
                $controller->home();
            }      
        }else{         
            if(method_exists("Controller", $method)){ 
                
                $controller = new Controller();
                $controller->$method();
            }else{
                $controller = new Controller();
                $controller->home();
            }
        }
    }

    public function getController()
    {
        if(isset($_REQUEST[$this->viewPathControllerName]))
            return $_REQUEST[$this->viewPathControllerName];
        else
            return null;
    }

    public function getRoutes(){
        return [
            (object)["page"=>"anakoinoseis","level"=>1],
            (object)["page"=>"eisodos_eggrafh","level"=>1],
            (object)["page"=>"emboliastika_kentra","level"=>1],
            (object)["page"=>"home","level"=>1],
            (object)["page"=>"login","level"=>1],
            (object)["page"=>"odigies_egrafis_isodou","level"=>1],
            (object)["page"=>"odigies_mvoliasmou","level"=>1],
        ];
    }

}