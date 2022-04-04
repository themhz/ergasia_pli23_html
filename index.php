<?php 

$tasks = array();
$tasks[] = "config.php";
$tasks[] = "classes/database.php";
$tasks[] = "classes/controller.php";
$tasks[] = "classes/model.php";
$tasks[] = "classes/models/entities/user.php";


foreach($tasks as $file){
    include $file;
}


// $controler =  new Controller();
// echo $controler->method;

$user = new User();

//print_r($user->select(['id ='=>$_REQUEST["user_id"]]));
//print_r($user->select(['name ='=>$_REQUEST["name"], 'id ='=>$_REQUEST["user_id"]]));

$user->id =5;
$user->name = "despoinaki1";
$user->lastname = "alexiadou";
$user->amka = "066452627";
$user->afm = "066452627";
$user->artaftotitas = "1233123123";
$user->age = "23";
$user->gender = "1";
$user->email = "themhz@gmail.com";
$user->mobilephone = "6987556486";
$user->role = 0;

$user->delete(['id ='=>$_REQUEST["user_id"]], true);