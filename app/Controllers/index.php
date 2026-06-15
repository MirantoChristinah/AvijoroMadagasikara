<?php
namespace App\Controllers;

class Index extends BaseController
{
    public function index ()
    {
        //data['accueil']= variable qui contient les données  model pour récuperer les données dans database
        body("avijoro/index",$data);
    }
}



?>