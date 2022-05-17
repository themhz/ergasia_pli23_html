<?php 
//Έχει γίνει μια προσπάθεια ώστε η εφαρμογή να ακολουθεί το πρότυπο mvc
//Τυπικά έχω τις κλάσεις που περιλαμβάνουν 
//τον πυρήνα της εφαρμογής core
//και τις οντότητες entities καθώς και ένα μοντέλο για την διαχείρηση τους στην βάση δεδομένων
//Εισάγω τις εντολές αυτές για να μπορώ και να πιάνω το σφάλμα

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ERROR | E_PARSE);


//Ενεργοποιούμε το session για να κρατάμε το username και το password
session_start();

//Φορτώνω όλα τα αρχεία σε ένα Array
$includes = array();
$includes[] = "config.php";
$includes[] = "classes/core/database.php";
$includes[] = "classes/core/request.php";
$includes[] = "classes/core/model.php";
$includes[] = "classes/core/view.php";
$includes[] = "classes/core/router.php";
$includes[] = "classes/core/account.php";
$includes[] = "classes/models/entities/user.php";
$includes[] = "classes/models/entities/appointment.php";
$includes[] = "classes/models/entities/doctor.php";
$includes[] = "classes/models/entities/vaccination_center.php";


//και με μια λούπα τα κάνω include
foreach($includes as $include){
    include $include;
}


$user = new User();
$account = new Account($user);
$router = new Router();
$request = new Request();

//Τσεκάρω αν εκτελείτε η register
if($request->get("register")=="1"){
    $account->register();
}
//Τσεκάρω αν ο χρήστης είναι για authentication
if($account->authenticate()){    

    //Αν ναι τότε φορτώνω τον controller
    $router->loadController();
    //Και εκτελώ την μέθοδο
    $router->executeMethod();
}else{
    
    //αλιώς φορτώνω τα default
    $router->loadController("eisodos_eggrafh");    
    $router->executeMethod("eisodos_eggrafh");
}


