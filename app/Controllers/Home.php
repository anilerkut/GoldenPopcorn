<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ActorModel;
use App\Models\CategoryModel;
use App\Models\GenderModel;
use App\Models\MovieModel;
use App\Models\DirectorModel;

class Home extends BaseController
{
    public function index()
    {
        return view('site/welcome_screen.php');
    }

}
