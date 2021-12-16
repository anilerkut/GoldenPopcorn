<?php

namespace App\Controllers;


use App\Models\NewsModel;

class NewsController extends BaseController
{
    private $newsModel;

    public function __construct()
    {
        $this->newsModel = new NewsModel();
    }

    private function callbackDateValid($date){
        $day = (int) substr($date, 0, 2);
        $month = (int) substr($date, 3, 2);
        $year = (int) substr($date, 6, 4);
        return checkdate($month, $day, $year);
    }

    public function list()
    {
        $news = new NewsModel();
        $data['news'] = $news->findAll();
        return view('include/news-list', $data);
    }

    public function add() //from admin page news list menu to news add  
    {
        return view('include/news-add'); 
    }

    public function edit($id) //Brings the information on the edit screen 
    { 
        $news = new NewsModel();
        $data['news'] = $news->find($id);
        return view('include/news-update', $data);
    }

    public function update($id) //update the informations
    {   
        $news = new NewsModel();
        $data = 
        [
            'news_name' => $this->request->getPost('news_name')
        ];
        $news->update($id, $data);
        return redirect()->to(base_url('news'));
    }

    public function delete($id) //delete data
    { 
        $news = new NewsModel();
        $news->delete($id);
        return redirect()->to(base_url('news'));
    }

    public function addNews() {
        $data = [];
        helper(['form']);

        if($this->request->getPost())
        {
            $rules=
                [
                    'news_content' => 'required|min_length[2]',
                    'news_date' => 'required|min_length[2]',
                ];

            $errors=
                [
                    'news_firstName'=>
                        [
                            'validatenews'=> "The length of first name must be minimum two"
                        ],
                    'news_lastName'=>
                        [
                            'validatenews'=> "The length of last name must be minimum two"
                        ],
                    'news_gender'=>
                        [
                            'validatenews'=> "The length of first name must be minimum two"
                        ],
                    'news_birthdate'=>
                        [
                            'validatenews'=> "The given date is not valid"
                        ],
                ];

            if(! $this->validate($rules,$errors))
            {
                $data['validation']= $this->validator;
            }
            else
            {
                $news = new NewsModel();
               
                $newData = 
                [
                    'news_content'  => $this->request->getVar('news_content'),
                    'news_date'  => $this->request->getVar('news_date'),
                ];

                $news->save($newData);

                return redirect()->to('/dashboard');
            }
        }
    }

}