<?php

namespace App\Controllers;
use App\Controllers\BaseController;

class User extends BaseController
{
    public function login()
    {
        $data=[];
        helper(['form']);
        echo view('login',$data);

    }

    public function register()
    {
        $data=[];
        helper(['form']);
        echo view('signup',$data);

    }


}
