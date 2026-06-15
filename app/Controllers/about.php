<?php
namespace App\Controllers;

class About extends BaseController
{
    public function index ()
    {
        //data['about']= variable qui contient les données  model pour récuperer les données dans database
        body("avijoro/about ",$data);
    }
}



?>