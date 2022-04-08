<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

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


foreach($includes as $include){
    include $include;
}

$user = new User();
$account = new Account($user);
$router = new Router();
$request = new Request();

if($request->get("register")=="1"){
    $account->register();
}
if($account->authenticate()){    
    $router->loadController();
    $router->executeMethod();
}else{
    
    $router->loadController("eisodos_eggrafh");    
    $router->executeMethod("eisodos_eggrafh");
}


