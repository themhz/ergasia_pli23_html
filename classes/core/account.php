<?php
class Account{   
    public User $user;
    
    public function __construct(User $u){
        session_start();
        $this->user = $u;
    }
    public function authenticate(): bool{                
      
        if(isset($_SESSION["islogged"]) && $_SESSION["islogged"] == 1){
            return true;
        }else{
            return $this->login();
        }
    }
    

    public function login(): bool{              
        if(isset($_REQUEST["amka"]) && isset($_REQUEST["afm"])){
            $result = $this->user->select(["amka="=>$_REQUEST["amka"], "afm="=> $_REQUEST["afm"]]);
            $_SESSION["islogged"] = !empty($result);
            return !empty($result);
        }else{
            return false;
        }        
    }


    public function authorize(): bool{
        return false;
    }

    public function register($user): bool{
        return $user->insert();
    }

    public function logout(): bool{
        return false;
    }


}