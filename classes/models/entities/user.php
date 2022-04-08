<?php

class User extends Model
{
    public int $id = -1;
    public string $name ="";
    public string $lastname ="";
    public string $amka ="";
    public string $afm ="";
    public string $artaftotitas ="";
    public string $age ="";
    public string $gender ="";
    public string $email ="";
    public string $mobilephone ="";
    public string $role ="";
    public string $regdate ="";

    public function __construct()
    {
        parent::__construct('users');

    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
    
}