<?php

class Controller{

    public function radevou_doctor(){
        $view = new view();
        $data = $_SESSION["user"];                
        $view->render("radevou_doctor", $data);
    }

    public function update_status(){
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