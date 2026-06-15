<?php
namespace App\Controllers;

class Projects extends BaseController
{
    public function index ()
    {
        //data['projects']= variable qui contient les données  model pour récuperer les données dans database
        body("avijoro/projects",$data);
    }
}



?>