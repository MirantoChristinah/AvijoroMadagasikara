<?php
namespace App\Controllers;

class Joins extends BaseController
{
    public function index ()
    {
        //data['join']= variable qui contient les données  model pour récuperer les données dans database
        body("avijoro/join",$data);
    }
}



?>