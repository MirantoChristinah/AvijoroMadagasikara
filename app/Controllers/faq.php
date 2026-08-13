<?php
namespace App\Controllers;

class Faq extends BaseController
{
    public function index ()
    {
        $data = ['lang' => $this->request->getLocale()];
        return $this->body('avijoro/faq', $data);
    }
}



?>