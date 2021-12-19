<?php

namespace App\Controllers;


use App\Models\MovieModel;
use App\Models\CountryModel;
use App\Models\LanguageModel;

class MovieController extends BaseController
{
    private $movieModel;

    public function __construct()
    {
        $this->movieModel = new MovieModel();
    }

    private function callbackDateValid($date){
        $day = (int) substr($date, 0, 2);
        $month = (int) substr($date, 3, 2);
        $year = (int) substr($date, 6, 4);
        return checkdate($month, $day, $year);
    }

    public function list()
    {
        $movie = new MovieModel();
        $data['movie'] = $movie->findAll();
        return view('include/movie-list', $data);
    }

    public function add() //from admin page movie list menu to movie add  
    {
        $country = new CountryModel();
        $language = new LanguageModel();
        $data['country'] = $country->findAll();
        $data['language'] = $language->findAll();
        return view('include/movie-add',$data); 
    }

    public function edit($id) //Brings the information on the edit screen 
    { 
        $movie = new MovieModel();
        $country = new CountryModel();
        $language = new LanguageModel();
        $data['country'] = $country->findAll();
        $data['language'] = $language->findAll();
        $data['movie'] = $movie->find($id);
        return view('include/movie-update',$data);
    }

    public function update($id) //update the informations
    {   
        $country = new CountryModel();
        $language = new LanguageModel();
        $movie = new MovieModel();
        $data = 
        [
                    'movie_name' => $this->request->getPost('movie_name'),
                    'movie_releasedate' => $this->request->getPost('movie_releasedate'),
                    'movie_duration' => $this->request->getPost('movie_duration'),
                    'movie_summary' => $this->request->getPost('movie_summary'), 
                    'movie_trailer' => $this->request->getPost('movie_trailer'),
                    'country_id' => $this->request->getPost('country_id'), 
                    'language_id' => $this->request->getPost('language_id'),
                    'movie_gross' =>$this->request->getPost('movie_gross'),
                    'imdb_rating' => $this->request->getPost('imdb_rating'),
                    'metacritic_rating' => $this->request->getPost('metacritic_rating'),
                    'rottentomatoes_rating' => $this->request->getPost('rottentomatoes_rating'),
                    'movie_poster' => $this->request->getPost('movie_poster'),
        ];
        $movie->update($id, $data);
        $data['movie'] = $movie->find($id);
        $data['country'] = $country->findAll();
        $data['language'] = $language->findAll();
        echo view('include/movie-update',$data);  
        return redirect()->to(base_url('movie'));
    }

    public function delete($id) //delete data
    { 
        $movie = new MovieModel();
        $movie->delete($id);
        return redirect()->to(base_url('movie'));
    }

    public function addMovie() {
        $data=[];
        helper(['form']);
        

        if($this->request->getPost())
        {
            $rules=
                [
                    'movie_name' => 'required|min_length[2]|is_unique[movie.movie_name]',
                    'movie_releasedate' => 'required',
                    'movie_duration' => 'required',
                    'movie_summary' => 'required|min_length[2]', 
                    'movie_trailer' => 'required|min_length[2]',
                    'country_id' => 'required',
                    'language_id' => 'required',
                    'movie_gross' => 'required|min_length[2]',
                    'imdb_rating' => 'required',
                    'metacritic_rating' => 'required',
                    'rottentomatoes_rating' => 'required',
                    'movie_poster' => 'required',
                ];

            if(! $this->validate($rules))
            {
                $data['validation']= $this->validator;
            }
            else
            {
                $movie = new MovieModel();
                $newData = [
                        'movie_name' => $this->request->getVar('movie_name'),
                        'movie_releasedate' => $this->request->getVar('movie_releasedate'),
                        'movie_duration' => $this->request->getVar('movie_duration'),
                        'movie_summary' => $this->request->getVar('movie_summary'), 
                        'movie_trailer' => $this->request->getVar('movie_trailer'),
                        'country_id' => $this->request->getVar('country_id'), 
                        'language_id' => $this->request->getVar('language_id'),
                        'movie_gross' =>$this->request->getVar('movie_gross'),
                        'imdb_rating' => $this->request->getVar('imdb_rating'),
                        'metacritic_rating' => $this->request->getVar('metacritic_rating'),
                        'rottentomatoes_rating' => $this->request->getVar('rottentomatoes_rating'),
                        'movie_poster' => $this->request->getVar('movie_poster'),
                ];
                $movie->save($newData);
                return redirect()->to('/dashboard');
            }
        }
        echo view('include/movie-add',$data);   
    }

}