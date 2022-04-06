<?php

class Request
{

  
    public function get($vat)
    {
        return isset($_REQUEST[$vat])?$_REQUEST[$vat]:"";
    }


}