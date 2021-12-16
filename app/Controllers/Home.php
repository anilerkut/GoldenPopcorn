<?php

namespace App\Controllers;
use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        return view('index'); // 'welcome_message'
    }

    public function add_news()
    {
        return view('include/news-add');
    }

    public function add_warning()
    {
        return view('include/warning-add');

    }

}
