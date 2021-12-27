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
        $warning = new WarningModel();
        $movie = new MovieModel();
        $data['movie'] = $movie->findAll();
        $data['warning'] = $warning->findAll();
        $data['movieWarningModel'] = $movieWarningModel->find($id);
        return view('include/movie-warning-update', $data);
    }

    public function update($id) //update the informations
    {   
        $movieWarningModel = new MovieWarningModel();
        $data = 
        [
            'movie_id' => $this->request->getPost('movie_id'),
            'warning_id' => $this->request->getPost('warning_id')
        ];
        $movieWarningModel->update($id, $data);
        return redirect()->to(base_url('warningList'));
    }

    public function delete($id) //delete data
    { 
        $movieWarningModel = new MovieWarningModel();
        $movieWarningModel->delete($id);
        return redirect()->to(base_url('warningList'));
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

                return redirect()->to(base_url('warningList'));
            }
        }
        echo view('include/movie-warning-add',$data);
    }

}