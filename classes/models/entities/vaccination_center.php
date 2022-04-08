<?php

class Vaccination_center extends Model
{
    public int $id = -1;    
    public string $name ="";
    public string $taxidromikos_kodikas ="";
    public string $phone ="";
    public string $regdate ="";

    public function __construct()
    {
        parent::__construct('vaccination_centers');
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