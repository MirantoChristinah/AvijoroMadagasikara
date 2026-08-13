<?php
namespace App\Controllers;

class Support extends BaseController
{
    public function index ()
    {
        $data = ['lang' => $this->request->getLocale()];
        return $this->body('avijoro/join', $data);
    }
}



?>