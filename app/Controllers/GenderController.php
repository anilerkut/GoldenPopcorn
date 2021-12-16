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

    public function add() 
    {
        return view('include/gender-add');
    }

    public function edit($id) //Brings the information on the edit screen 
    { 
        $gender = new GenderModel();
        $data['gender'] = $gender->find($id);
        return view('include/gender-update', $data);
    }

    public function update($id) //update the informations
    {   
        $gender = new GenderModel();
        $data = 
        [
            'gender_name' => $this->request->getPost('gender_name')
        ];
        $gender->update($id, $data);
        return redirect()->to(base_url('gender'));
    }

    public function delete($id) //delete data
    { 
        $gender = new GenderModel();
        $gender->delete($id);
        return redirect()->to(base_url('gender'));
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
                    'gender_name' => $this->request->getVar('gender_name')
                ];

                $gender->save($newData);

                return redirect()->to('/gender-list');
            }
        }
        echo view('include/gender-add',$data);
    }

    public function list()
    {
        $gender = new GenderModel();
        $data['gender'] = $gender->findAll();
        return view('include/gender-list', $data);
    }

}