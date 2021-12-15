<?php

namespace App\Controllers;


use App\Models\MovieModel;

class MovieController extends BaseController
{
    private $movieModel;

    public function __construct()
    {
        $this->movieModel = new MovieModel();
    }

    private function setUserSession($actor)
    {
        $data=[
            'movie_name'=>$actor['actor_firstName'],
            'actor_lastname'=>$actor['actor_lastName'],
            'actor_birthdate'=>$actor['actor_birthdate'],
            // gender, veritabanından cekilip forma aktarılacak ve oradan alınacak
        ];

        session()->set($data);
        return true;
    }

    private function callbackDateValid($date){
        $day = (int) substr($date, 0, 2);
        $month = (int) substr($date, 3, 2);
        $year = (int) substr($date, 6, 4);
        return checkdate($month, $day, $year);
    }

    public function list()
    {
        //$movie = new MovieModel();
        //$data['movie'] = $movie->findAll();
        //return view('include/category-list', $data);
        return view('include/movie-list');
    }

    public function addMovie() {
        $data=[];
        helper(['form']);

        if($this->request->getPost())
        {
            $rules=
                [
                    'movie_name' => 'required|min_length[2]',
                    'movie_releasedate' => 'required|min_length[2]',
                    'movie_duration' => 'required|min_length[2]',
                    'movie_summary' => 'required|min_length[2]', 
                    'movie_trailer' => 'required|min_length[2]',
                    'country_id' => 'required|min_length[2]',
                    'language_id' => 'required|min_length[2]',
                    'movie_gross' => 'required|min_length[2]',
                    'imdb_rating' => 'required|min_length[2]',
                    'metacritic_rating' => 'required|min_length[2]',
                    'rottentomatoes_rating' => 'required|min_length[2]',
                    'movie_poster' => 'required',
                ];
            //BUNLARI DÜZELT
            $errors=
                [
                        'movie_name'=>
                        [
                            'validateMovie'=> "The length of first name must be minimum two"
                        ],
                        'movie_releasedate'=>
                        [
                            'validateMovie'=> "The length of last name must be minimum two"
                        ],
                        'movie_duration'=>
                        [
                            'validateMovie'=> "The length of first name must be minimum two"
                        ],
                        'movie_summary'=>
                        [
                            'validateMovie'=> "The given date is not valid"
                        ],
                        'movie_trailer'=>
                        [
                            'validateMovie'=> "The given date is not valid"
                        ],
                        'movie_gross'=>
                        [
                            'validateMovie'=> "The given date is not valid"
                        ],
                        'imdb_rating'=>
                        [
                            'validateMovie'=> "The given date is not valid"
                        ],
                        'rottentomatoes_rating'=>
                        [
                            'validateMovie'=> "The given date is not valid"
                        ],
                        'metacritic_rating'=>
                        [
                            'validateMovie'=> "The given date is not valid"
                        ],
                                          
                ];

            if(! $this->validate($rules,$errors))
            {
                $data['validation']= $this->validator;
            }
            else
            {
                $movie = new MovieModel();
                if(is_null($movie->getMovie()))
                {
                    $newData = [
                        'movie_name' => $this->request->getVar('movie_name'),
                        'movie_releasedate' => $this->request->getVar('movie_releasedate'),
                        'movie_duration' => $this->request->getVar('movie_duration'),
                        'movie_summary' => $this->request->getVar('movie_summary'), 
                        'movie_trailer' => $this->request->getVar('movie_trailer'),
                        'country_id' => $this->request->getVar('actor_firstName'), //bunların formda name i yok , idrise nasıl alınacak sor
                        'language_id' => $this->request->getVar('actor_firstName'),
                        'movie_gross' =>$this->request->getVar('movie_gross'),
                        'imdb_rating' => $this->request->getVar('imdb_rating'),
                        'metacritic_rating' => $this->request->getVar('metacritic_rating'),
                        'rottentomatoes_rating' => $this->request->getVar('rottentomatoes_rating'),
                        'movie_poster' => $this->request->getVar('movie_poster'),
                    ];

                    $movie->save($newData);

                } else {

                }

                //$this->setUserSession($user);
                //$session->setFlashdata('success','Succesful Registiration');
                return redirect()->to('/dashboard');
            }
        }
    }

}