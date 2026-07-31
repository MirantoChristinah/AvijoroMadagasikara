<?php

namespace App\Controllers\Administration; 

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $data['nom_admin'] = session()->get('nom');
        return view('Administration/dashboard', $data); 
    }
}
