<?php
class Account{   
    public User $user;
    
    public function __construct(User $u){
        $this->user = $u;
    }
    public function authenticate(): bool{        
        $result = $this->user->select(["amka="=>$_SESSION["amka"], "afm="=> $_SESSION["afm"]]);

        $_SESSION["islogged"] = !empty($result);

        return !empty($result);
    }

    public function authorize(): bool{

    }

    public function register($user): bool{
        return $user->insert();
    }

    public function login(): bool{
        $_SESSION["amka"] = isset($_REQUEST["amka"])? $_REQUEST["amka"] : "";
        $_SESSION["afm"] = isset($_REQUEST["afm"])? $_REQUEST["afm"] : "";        
            
        $this->user->amka = $_SESSION["amka"];
        $this->user->afm = $_SESSION["afm"];
        
        if($_SESSION["islogged"] == false){
            return $this->authenticate();        
        }else{
            return $_SESSION["islogged"];
        }
        
    }

    public function logout(): bool{

    }


}