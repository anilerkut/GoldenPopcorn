<?php

namespace App\Controllers;

use App\Models\GenderModel;

class GenderController extends BaseController
{

    private $genderModel;

    public function __construct()
    {
        $this->genderModel = new GenderModel();
    }



    public function addGender() {
        $data = [];
        helper(['form']);

        if($this->request->getPost())
        {
            $rules=
            [
                'gender_name' => 'required|min_length[2]|is_unique[gender.gender_name]',
            ];

            if(! $this->validate($rules))
            {
                $data['validation']= $this->validator;
            }
            else
            {
                $gender = new GenderModel();
                
                    $newData =
                    [
                        'gender_name'  => $this->request->getVar('gender_name')
                    ];

                    $gender->save($newData);


                //$this->setUserSession($user);
                //$session->setFlashdata('success','Succesful Registiration');
                return redirect()->to('/dashboard');
            }
        }
    }


}