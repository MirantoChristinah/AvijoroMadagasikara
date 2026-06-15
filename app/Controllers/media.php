<?php
namespace App\Controllers;

class Media extends BaseController
{
    public function index ()
    {
        //data['media']= variable qui contient les données  model pour récuperer les données dans database
        body("avijoro/media",$data);
    }
}



?>