<?php

class Controller{

    public function home(){
        $view = new view();
        $view->render("home");
    }

    public function test2(){

    //print_r($user->select());
    //print_r($user->select(['id ='=>$_REQUEST["user_id"]]));
    //print_r($user->select(['name ='=>$_REQUEST["name"], 'id ='=>$_REQUEST["user_id"]]));
    //$user->update();
    //$user->insert();
    //$user->delete(['id ='=>$_REQUEST["user_id"]], true);
    //$user->truncate();
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
        echo "ok";
    }

}