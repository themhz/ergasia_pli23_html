<?php

class Controller{

    public function radevou(){
        $view = new view();
        $data = $_SESSION["user"];
                
        $view->render("radevou", $data);
    }

    public function create(){
        $view = new view();
        $request = new Request();    
        $user = $_SESSION["user"];        
        
        $appointment = new Appointment();
        $appointment->id=$request->get("id");
        $appointment->user_id=$user->id;

        $appointment->update(["user_id"]);

        $view->render("radevou", $user);
    }

    public function cancel(){
        $view = new view();
        $request = new Request();    
        $user = $_SESSION["user"];        
        
        $appointment = new Appointment();
        $appointment->id=$request->get("id");
        $appointment->user_id= "";

        $appointment->update(["user_id"]);

        $view->render("radevou", $user);
    }

}