<?php

class Controller
{    
    public $method;   
    public function __construct(){        
        if(isset($_REQUEST["method"])){ 
            $this->method = $_REQUEST["method"];
        }        
    }

    public function respond($data){
        echo json_encode($data);
    }
}
