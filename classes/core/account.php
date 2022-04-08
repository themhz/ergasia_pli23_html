<?php
class Account{   
    public User $user;
    
    public function __construct(User $u){        
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

            if(!empty($result)){
                $_SESSION["user"]=$result[0];            
                $_SESSION["islogged"] = 1;
                return true;
            }else{
                return false;
            }                        
        }else{
            return false;
        }        
    }


    public function authorize(): bool{
        return false;
    }

    public function register(): bool{
        $user = new User();
        $request = new Request();
        $user->amka = $request->get("amka");
        $user->afm = $request->get("afm");

        $checkUser = $user->select(["amka="=>$user->amka, "afm="=>$user->afm]);                
        if(empty($checkUser)){
            $user->name = $request->get("name");
            $user->lastname = $request->get("lastname");        
            $user->artaftotitas = $request->get("artaftotitas");
            $user->age = $request->get("age");
            $user->gender = $request->get("gender");
            $user->email = $request->get("email");
            $user->mobilephone = $request->get("mobilephone");
            $user->role = $request->get("role");
            return  $user->insert();
        }else{
            echo "Ο χρήστης με AMKA:$user->amka και ΑΦΜ:$user->afm υπάρχει ήδη!";
            header('Refresh: 2; URL=?page=eisodos_eggrafh&method=eisodos_eggrafh');

            return false;
        }                                        
    }

    public function logout(): bool{
        return false;
    }


}