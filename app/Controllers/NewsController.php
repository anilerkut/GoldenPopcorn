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

    public function addNews() {
        $data = [];
        helper(['form']);

        if($this->request->getPost())
        {
            $rules=
                [
                    'news_content' => 'required|min_length[2]',
                    'news_date' => 'required|min_length[2]',
                    'actor_id' => 'required',
                    'director_id' => 'required'
                ];

            $errors=
                [
                    'actor_firstName'=>
                        [
                            'validateActor'=> "The length of first name must be minimum two"
                        ],
                    'actor_lastName'=>
                        [
                            'validateActor'=> "The length of last name must be minimum two"
                        ],
                    'actor_gender'=>
                        [
                            'validateActor'=> "The length of first name must be minimum two"
                        ],
                    'actor_birthdate'=>
                        [
                            'validateActor'=> "The given date is not valid"
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