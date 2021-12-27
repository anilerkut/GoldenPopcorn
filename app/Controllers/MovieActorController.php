<?php

namespace App\Controllers;

use App\Models\ActorModel;
use App\Models\MovieModel;
use App\Models\GenderModel;
use App\Models\MovieActorModel;

class MovieActorController extends BaseController
{
    private $roleModel;

    public function __construct()
    {
        $this->roleModel = new MovieActorModel();
    }

    public function list()
    {
        $role = new MovieActorModel();
        $data['role'] = $role->findAll();
        return view('include/movie-actor-list', $data);
    }

    public function add() //from admin page actor list menu to actor add  
    {
        $actor = new ActorModel();
        $data['actor'] = $actor->findAll();
        $movie = new MovieModel();
        $data['movie'] = $movie->findAll();
        return view('include/movie-actor-add',$data); 
    }

    public function edit($id) //Brings the information on the edit screen 
    { 
        $roleModel = new MovieActorModel();
        $actor = new ActorModel();
        $movie = new MovieModel();
        $data['movie'] = $movie->findAll();
        $data['actor'] = $actor->findAll();
        $data['roleModel'] = $roleModel->find($id);
        return view('include/movie-actor-update', $data);
    }

    public function update($id) //update the informations
    {   
        $roleModel = new MovieActorModel();
        $data = 
        [
            'role_name'  => $this->request->getVar('role_name'),
            'actor_id'  => $this->request->getVar('actor_id'),
            'movie_id'  => $this->request->getVar('movie_id'),
        ];
        $roleModel->update($id, $data);
        return redirect()->to(base_url('role'));
    }

    public function delete($id) //delete data
    { 
        $actor = new ActorModel();
        $actor->delete($id);
        return redirect()->to(base_url('actor'));
    }

    public function addRole() {
        
        $data = [];
        helper(['form']);

        if($this->request->getPost())
        {
            $rules=
                [
                    'actor_id' => 'required',
                    'movie_id' => 'required',
                    'role_name' => 'required',
                ];

            if(! $this->validate($rules))
            {
                $data['validation']= $this->validator;
            }
            else
            {
                $role = new MovieActorModel();

                $newData = 
                [
                    'role_name'  => $this->request->getVar('role_name'),
                    'actor_id'  => $this->request->getVar('actor_id'),
                    'movie_id'  => $this->request->getVar('movie_id'),
                ];
                    $role->save($newData);

                return redirect()->to(base_url('role'));
            }
        }
        echo view('include/movie-actor-add',$data);
    }

}