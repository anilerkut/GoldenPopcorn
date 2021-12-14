<?php

namespace App\Controllers;
use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        return view('index'); // 'welcome_message'
    }

    public function anil()
    {
        return view('include/actor-add'); // 'welcome_message'
    }
}
