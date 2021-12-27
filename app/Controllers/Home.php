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
        $movie = new MovieModel();
        $data['movie']=$movie->paginate(12);
        $data['pager'] = $movie->pager;
        $category = new CategoryModel();
        $data['category'] = $category->findAll();
        return view('site/mainPage.php',$data);
        //return view('site/welcome_screen.php');
    }

}
