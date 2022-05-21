<?php

class Controller{

    public function profile(){
        $view = new view();
        $data = $_SESSION["user"];                
        $view->render("profile", $data);
    }

    public function update_profile(){
        $view = new view();
        $data = $_SESSION["user"];

        $request = new Request();
        $request->get("status");

        $apointment =  new Appointment();
        $apointment->status = $request->get("status");
        $apointment->id = $request->get("id");

        $apointment->update(["status"]);
        
        $view->render("radevou_doctor", $data);
    }
}