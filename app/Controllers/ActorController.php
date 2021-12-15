<?php

namespace App\Controllers;


use App\Models\ActorModel;

class ActorController extends BaseController
{
    private $actorModel;

    public function __construct()
    {
        $this->actorModel = new ActorModel();
    }

    private function setUserSession($actor)
    {
        $data=[
            'actor_firstname'=>$actor['actor_firstName'],
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
        //$actor = new ActorModel();
        //$data['actor'] = actor->findAll();
        //return view('include/actor-list', $data);
        return view('include/actor-list');
    }


    public function addActor() {
        $data = [];
        helper(['form']);

        if($this->request->getPost())
        {
            $rules=
                [
                    'actor_firstName' => 'required|min_length[2]',
                    'actor_lastName' => 'required|min_length[2]',
                    'actor_gender' => 'required',
                    'actor_birthdate' => 'required'
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
                $actor = new ActorModel();

                    $newData = [
                        'actor_firstname'  => $this->request->getVar('actor_firstName'),
                        'actor_lastname'  => $this->request->getVar('actor_lastName'),
                        'actor_birthdate'  => $this->request->getVar('actor_birthdate'),
                        // gender gelecek
                    ];

                    $actor->save($newData);



                //$this->setUserSession($user);
                //$session->setFlashdata('success','Succesful Registiration');
                return redirect()->to('/dashboard');
            }
        }
        echo view('login',$data);
    }

}