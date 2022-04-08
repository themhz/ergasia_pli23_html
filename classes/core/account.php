<?php
// Είναι η κλάση account που διαχειρήζεται τους λογαριασμούς του συστηματος. 
// 
class Account{   

    //Συνδέεται με τον user
    public User $user;
    

    //Υπάρχει ένας constructor για να αρχικοποιήτε ο user απο εδω
    public function __construct(User $u){        
        $this->user = $u;        
    }

    //Μια μέθοδο για να μπορεί να κάνει αυθεντικοποίηση ο χρήστης αν ναι τότε κάνει Login
    public function authenticate(): bool{                
      
        if(isset($_SESSION["islogged"]) && $_SESSION["islogged"] == 1){
            return true;
        }else{
            return $this->login();
        }
    }
    

    //Η μέθοδος της Login
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

    //Η Μέθοδος για να κάνει register ο user
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


    //Με αυτή την μέθοδο γίνεται Logout ο χρήστης. 
    public function logout(): bool{
        return false;
    }


}