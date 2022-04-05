<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$tasks = array();
$tasks[] = "config.php";
$tasks[] = "classes/core/database.php";
$tasks[] = "classes/core/model.php";
$tasks[] = "classes/core/view.php";
$tasks[] = "classes/core/router.php";
$tasks[] = "classes/models/entities/user.php";


foreach($tasks as $file){
    include $file;
}







// $controler =  new Controller();
// echo $controler->method;

$router = new Router();
$router->loadController();
$router->executeMethod();
