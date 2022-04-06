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
        $user = new User();
        $request = new Request();        
        $user->name = $request->get("name");
        $user->lastname = $request->get("lastname");
        $user->amka = $request->get("amka");
        $user->afm = $request->get("afm");
        $user->artaftotitas = $request->get("artaftotitas");
        $user->age = $request->get("age");
        $user->gender = $request->get("gender");
        $user->email = $request->get("email");
        $user->mobilephone = $request->get("mobilephone");
        $user->role = $request->get("role");

        return $user->insert();
    }

}