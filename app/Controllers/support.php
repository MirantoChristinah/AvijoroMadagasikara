<?php
namespace App\Controllers;

class Support extends BaseController
{
    public function index ()
    {
        //data['support']= variable qui contient les données  model pour récuperer les données dans database
        body("avijoro/support",$data);
    }
}



?>