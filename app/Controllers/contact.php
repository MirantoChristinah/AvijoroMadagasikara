<?php
namespace App\Controllers;

class Contact extends BaseController
{
    public function index ()
    {
        //data['contact']= variable qui contient les données  model pour récuperer les données dans database
        body("avijoro/contact",$data);
    }
}



?>