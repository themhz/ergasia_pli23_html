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
        
        if($user->age >= 40 && $user->age<=65){
            $appointment = new Appointment();
            $appointment->id=$request->get("id");
            $appointment->user_id=$user->id;
    
            $appointment->update(["user_id"]);    
            $view->render("radevou", $user);
        }else{
            echo "Ο χρήστης με AMKA:$user->amka και ΑΦΜ:$user->afm δεν ανοίκει στην ηλικιακή ομάδα 40 - 65";
            header('Refresh: 2; URL=?page=radevou&method=radevou');
        }
        
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