<?php
namespace App\Controllers;

class About extends BaseController
{
    public function index ()
    {
        $data = ['lang' => $this->request->getLocale()];
        return $this->body('avijoro/about', $data);
    }
}



?>