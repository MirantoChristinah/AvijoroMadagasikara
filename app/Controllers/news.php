<?php
namespace App\Controllers;

class News extends BaseController
{
    public function index ()
    {
        //data['news']= variable qui contient les données  model pour récuperer les données dans database
        body("avijoro/newq",$data);
    }
}



?>