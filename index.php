<?php 

$tasks = array();
$tasks[] = "config.php";
$tasks[] = "classes/core/database.php";
$tasks[] = "classes/core/controller.php";
$tasks[] = "classes/core/model.php";
$tasks[] = "classes/models/entities/user.php";


foreach($tasks as $file){
    include $file;
}


// $controler =  new Controller();
// echo $controler->method;

$user = new User();


$user->id =2;
$user->name = "despoinaki2";
$user->lastname = "alexiadou";
$user->amka = "066452627";
$user->afm = "066452627";
$user->artaftotitas = "1233123123";
$user->age = "23";
$user->gender = "1";
$user->email = "themhz@gmail.com";
$user->mobilephone = "6987556486";
$user->role = 0;

print_r($user->select());
//print_r($user->select(['id ='=>$_REQUEST["user_id"]]));
//print_r($user->select(['name ='=>$_REQUEST["name"], 'id ='=>$_REQUEST["user_id"]]));
//$user->update();
//$user->insert();
//$user->delete(['id ='=>$_REQUEST["user_id"]], true);
//$user->truncate();
