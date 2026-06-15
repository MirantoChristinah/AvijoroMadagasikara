<?php
namespace App\Controllers;

class Faq extends BaseController
{
    public function index ()
    {
        //data['faq']= variable qui contient les données  model pour récuperer les données dans database
        body("avijoro/faq",$data);
    }
}



?>