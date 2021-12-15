<?php

namespace App\Controllers;
use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        return view('index'); // 'welcome_message'
    }


    public function add_movie()
    {
        return view('include/movie-add');
    }

    public function add_actor()
    {
        return view('include/actor-add');
    }

    public function add_director()
    {
        return view('include/director-add');
    }

    public function add_category()
    {
        return view('include/category-add');
    }

    public function add_language()
    {
        return view('include/language-add');
    }

    public function add_news()
    {
        return view('include/news-add');
    }

    public function add_gender()
    {
        return view('include/gender-add');

    }
    public function add_country()
    {
        return view('include/country-add');
    }

    public function add_warning()
    {
        return view('include/warning-add');

    }

}
