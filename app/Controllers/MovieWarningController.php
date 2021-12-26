<?php

namespace App\Controllers;

use App\Models\WarningModel;
use App\Models\MovieModel;
use App\Models\MovieWarningModel;

class MovieWarningController extends BaseController
{
    private $movieWarningModel;

    public function __construct()
    {
        $this->movieWarningModel = new MovieWarningModel();
    }

    public function list()
    {
        $movieWarningModel = new MovieWarningModel();
        $data['warnings'] = $movieWarningModel->findAll();
        return view('include/movie-warning-list', $data);
    }

    public function add() //from admin page actor list menu to actor add  
    {
        $warnings = new WarningModel();
        $movieWarningModel = new MovieWarningModel();
        $data['warnings'] = $warnings->findAll();
        $movie = new MovieModel();
        $data['movie'] = $movie->findAll();
        return view('include/movie-warning-add',$data); 
    }

    public function edit($id) //Brings the information on the edit screen 
    { 
        $movieWarningModel = new MovieWarningModel();
        $data['warnings'] = $warnings->findAll();
        $data['movie'] = $movie->find($id);
        return view('include/movie-update', $data);
    }

    public function update($id) //update the informations
    {   
        $actor = new ActorModel();
        $data = 
        [
            'actor_name' => $this->request->getPost('actor_name')
        ];
        $actor->update($id, $data);
        return redirect()->to(base_url('actor'));
    }

    public function delete($id) //delete data
    { 
        $actor = new ActorModel();
        $actor->delete($id);
        return redirect()->to(base_url('actor'));
    }

    public function addMovieWarnings() {
        
        $data = [];
        helper(['form']);

        if($this->request->getPost())
        {
            $rules=
                [
                    'movie_id' => 'required',
                    'warning_id' => 'required',
                ];

            if(! $this->validate($rules))
            {
                $data['validation']= $this->validator;
            }
            else
            {
                $movieWarningModel = new MovieWarningModel();

                $newData = 
                [
                    'movie_id'  => $this->request->getVar('movie_id'),
                    'warning_id'  => $this->request->getVar('warning_id'),
                ];
                    $movieWarningModel->save($newData);

                return redirect()->to('/include/movie-warning-list');
            }
        }
        echo view('include/movie-warning-add',$data);
    }

}