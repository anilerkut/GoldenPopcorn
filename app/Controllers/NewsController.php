<?php

namespace App\Controllers;


use App\Models\NewsModel;
use App\Models\DirectorModel;
use App\Models\ActorModel;
use App\Models\MovieModel;

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
        $actor = new ActorModel();
        $data['actor'] = $actor->findAll();
        return view('include/news-add',$data); 
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
                    'actor_id' => $this->request->getVar('actor_id'), 
                ];

                $news->save($newData);

                return redirect()->to('/dashboard');
            }
        }
    }

    public function listByCard()
    {
        $news = new NewsModel();
        // $data['news'] = $news->paginate(10);
        $data['news'] = $news->getNewsByCard();
        // $data['pager'] = $news->pager;
        return view('site/news', $data);
    }

    public function showWithDetail($id)
    {
        $news = new NewsModel();
        $data['news'] = $news->getNewsWithActor($id);
        return view('site/news-details', $data);
    }

    public function listByNewDate() {
        $newsModel = new NewsModel();
        $actorModel = new ActorModel();
        $data['news'] = $newsModel->select('news.id, news_title, actor_firstname, actor_lastname')
            ->join('actor', 'actor.id = news.actor_id')
            ->orderBy('news_date', 'DESC')
            ->paginate(9);
        $data['actor'] = $actorModel->findAll();
        $data['pager'] = $newsModel->pager;
        return view('site/news', $data);
    }

    public function listByOldDate() {
        $newsModel = new NewsModel();
        $actorModel = new ActorModel();
        $data['news'] = $newsModel->select('news.id, news_title, actor_firstname, actor_lastname')
            ->join('actor', 'actor.id = news.actor_id')
            ->orderBy('news_date', 'ASC')
            ->paginate(9);
        $data['actor'] = $actorModel->findAll();
        $data['pager'] = $newsModel->pager;
        return view('site/news', $data);
    }

}