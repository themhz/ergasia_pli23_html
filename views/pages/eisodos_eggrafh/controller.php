<?php

class Controller{

    public function eisodos_eggrafh(){
        $view = new view();
        $view->render("eisodos_eggrafh");
    }

    public function login(){
        // $user = new User();        
        // $account = new Account($user);
        // $account->login();
        
        $router = new Router();
        $router->redirect("?page=home&method=home");
        
    }

    public function logout(){        
        $_SESSION["islogged"]=0;
        $router = new Router();
        $router->redirect("?page=home&method=home");
    }

    public function register(){    
       

        echo "Η καταχώρηση έγινε με επιτυχία, θα μεταφερθείτε στην αρχική μας σελίδα";
        header('Refresh: 2; URL=?page=eisodos_eggrafh&method=eisodos_eggrafh');

    }

}