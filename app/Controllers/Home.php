<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\MovieModel;
use App\Models\DirectorModel;

class Home extends BaseController
{
    public function index()
    {
        return view('/index'); 

       // $movie = new MovieModel();
        //$datas['movie']=$movie->findAll();
        $director = new DirectorModel();
        $data['director'] = $director->findAll();
        return view('site/director',$data); // 'welcome_message'

    }

}
