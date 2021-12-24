<?php

namespace App\Controllers;

use App\Models\DirectorModel;
use App\Models\GenderModel;
use PhpParser\Node\Scalar\MagicConst\Dir;

class DirectorController extends BaseController
{
    private $directorModel;

    public function __construct()
    {
        $this->directorModel = new DirectorModel();
    }

    public function list() 
    {
        $director = new DirectorModel();
        $data['director'] = $director->findAll();
        return view('include/director-list', $data);
    }

    public function add() 
    {
        $gender = new GenderModel();
        $data['gender'] = $gender->findAll();
        return view('include/director-add',$data);
    }

    public function edit($id) {
        $gender = new GenderModel();
        $director = new DirectorModel();
        $data['gender'] = $gender->findAll();
        $data['director'] = $director->find($id);
        return view('include/director-update', $data);
    }

    public function update($id) {
        $director = new DirectorModel();
        $gender = new GenderModel();
        $data = [
            'director_name' => $this->request->getPost('director_name'),
            'director_gender' => $this->request->getPost('director_gender'),
            'director_picture' => $this->request->getPost('director_picture')
        ];
        $data['gender'] = $gender->findAll();
        $data['director'] = $director->find($id);
        $director->update($id, $data);
        return redirect()->to(base_url('director'));
    }

    public function delete($id) {
        $director = new DirectorModel();
        $director->delete($id);
        return redirect()->to(base_url('director'));
    }


    public function addDirector() {
        $data = [];
        helper(['form']);

        if($this->request->getPost())
        {
            $rules=
                [
                    'director_name' => 'required|min_length[2]',
                    'director_gender'=> 'required',
                    'director_picture'=> 'required',
                ];

            $errors=
                [
                    'director_name' =>
                        [
                            'validateDirector'=> "The length of category name must be minimum two"
                        ],
                    "gender" => [

                    ]
                ];

            if(! $this->validate($rules,$errors))
            {
                $data['validation']= $this->validator;
            }
            else
            {
                $director = new DirectorModel();
                
                $newData = 
                [
                    'director_name' => $this->request->getVar('director_name'),
                    'director_gender' => $this->request->getVar('director_gender'),
                    'director_picture' => $this->request->getVar('director_picture')
                ];
                    $director->save($newData);
                return redirect()->to('/dashboard');
            }
        }
        echo view('login',$data);
    }

    public function listByCard() 
    {
        $director = new DirectorModel();
        $data['director'] = $director->findAll();
        return view('site/director', $data);
    }
}