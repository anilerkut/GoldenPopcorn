<?php

namespace App\Controllers;


use App\Models\ActorModel;
use App\Models\GenderModel;

class ActorController extends BaseController
{
    private $actorModel;

    public function __construct()
    {
        $this->actorModel = new ActorModel();
    }

    private function callbackDateValid($date){
        $day = (int) substr($date, 0, 2);
        $month = (int) substr($date, 3, 2);
        $year = (int) substr($date, 6, 4);
        return checkdate($month, $day, $year);
    }

    public function list()
    {
        $actor = new ActorModel();
        $data['actor'] = $actor->findAll();
        return view('include/actor-list', $data);
    }

    public function add() //from admin page actor list menu to actor add  
    {
        $gender = new GenderModel();
        $data['gender'] = $gender->findAll();
        return view('include/actor-add',$data); 
    }

    public function edit($id) //Brings the information on the edit screen 
    { 
        $gender = new GenderModel();
        $actor = new ActorModel();
        $data['gender'] = $gender->findAll();
        $data['actor'] = $actor->find($id);
        return view('include/actor-update', $data);
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

    public function addActor() {
        
        $data = [];
        helper(['form']);

        if($this->request->getPost())
        {
            $rules=
                [
                    'actor_firstname' => 'required|min_length[2]',
                    'actor_lastname' => 'required|min_length[2]',
                    'actor_gender' => 'required',
                    'actor_birthdate' => 'required',
                    'actor_picture' => 'required'
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
                    'actor_actor'=>
                        [
                            'validateActor'=> "The length of first name must be minimum two"
                        ],
                    'actor_birthdate'=>
                        [
                            'validateActor'=> "The given date is not valid"
                        ],
                    'actor_picture' => 
                        [
                        'The actor picture is required'
                        ]
                ];

            if(! $this->validate($rules))
            {
                $data['validation']= $this->validator;
            }
            else
            {
                $actor = new ActorModel();

                $newData = 
                [
                    'actor_firstname'  => $this->request->getVar('actor_firstname'),
                    'actor_lastname'  => $this->request->getVar('actor_lastname'),
                    'actor_birthdate'  => $this->request->getVar('actor_birthdate'),
                    'actor_picture' => $this->request->getVar('actor_picture'),
                    'actor_gender'=>  $this->request->getVar('actor_gender'),
                ];
                    $actor->save($newData);

                return redirect()->to('/actor-list');
            }
        }
        echo view('include/actor-add',$data);
    }

}