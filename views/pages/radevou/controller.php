<?php

class Controller{

    public function radevou(){
        $view = new view();
        $data = $_SESSION["user"];

        
        
        $view->render("radevou", $data);
    }


    public function cancel(){
        echo "cancel";
    }

}