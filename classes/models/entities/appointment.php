<?php

class Appointment extends Model
{
    public int $id = -1;
    public string $vaccination_center_id ="";
    public string $user_id ="";
    public string $appointment_date ="";
    public string $appointment_time ="";
    public string $status ="";    
    public string $regdate ="";

    public function __construct()
    {
        parent::__construct('appointments');
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