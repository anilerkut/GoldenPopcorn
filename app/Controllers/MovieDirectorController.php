<?php

namespace App\Controllers;

use App\Models\DirectorModel;
use App\Models\MovieModel;
use App\Models\MovieDirectorModel;

class MovieDirectorController extends BaseController
{
    private $movieDirectorModel;

    public function __construct()
    {
        $this->movieDirectorModel = new MovieDirectorModel();
    }

    public function list()
    {
        $movieDirectorModel = new MovieDirectorModel();
        $data['movieDirectors'] = $movieDirectorModel->findAll();
        return view('/include/movie-director-list', $data);
    }

    public function add() //from admin page actor list menu to actor add  
    {
        $director = new DirectorModel();
        $data['director'] = $director->findAll();
        $movie = new MovieModel();
        $data['movie'] = $movie->findAll();
        return view('include/movie-director-add',$data); 
    }

    public function edit($id) //Brings the information on the edit screen 
    { 
        $movieDirectorModel = new MovieDirectorModel();
        $director = new DirectorModel();
        $movie = new MovieModel();
        $data['movie'] = $movie->findAll();
        $data['director'] = $director->findAll();
        $data['movieDirectorModel'] = $movieDirectorModel->find($id);
        return view('include/movie-director-update', $data);
    }

    public function update($id) //update the informations
    {   
        $movieDirectorModel = new MovieDirectorModel();
        $data = 
        [
            'movie_id' => $this->request->getPost('movie_id'),
            'director_id' => $this->request->getPost('director_id')
        ];
        $movieDirectorModel->update($id, $data);
        return redirect()->to(base_url('movie-directors'));
    }

    public function delete($id) //delete data
    { 
        $movieDirectorModel = new MovieDirectorModel();
        $movieDirectorModel->delete($id);
        return redirect()->to(base_url('movie-directors'));
    }

    public function addMovieDirectors() {
        
        $data = [];
        helper(['form']);

        if($this->request->getPost())
        {
            $rules=
                [
                    'movie_id' => 'required',
                    'director_id' => 'required',
                ];

            if(! $this->validate($rules))
            {
                $data['validation']= $this->validator;
            }
            else
            {
                $movieDirectorModel = new MovieDirectorModel();

                $newData = 
                [
                    'movie_id'  => $this->request->getVar('movie_id'),
                    'director_id'  => $this->request->getVar('director_id'),
                ];
                    $movieDirectorModel->save($newData);

                return redirect()->to(base_url('movie-directors'));
            }
        }
        echo view('include/movie-category-add',$data);
    }

}