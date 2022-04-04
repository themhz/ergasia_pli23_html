<?php

class Database
{
    public $dbh;
    private static $instance;

    private function __construct()
    {        
        $user = CONFIG['db.user'];    
        $password = CONFIG['db.password'];
        $dbhost = CONFIG['db.host'];
        $basename = CONFIG['db.name'];
        $this->dbh = new PDO("mysql:host=$dbhost;dbname=$basename", $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8;",PDO::ATTR_PERSISTENT => true));          
        $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance()
    {
        if (!isset(self::$instance))
        {
            $object = __CLASS__;
            self::$instance = new $object;
        }
        return self::$instance;
    }
}