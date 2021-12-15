<?php

namespace App\Controllers;

use App\Models\DirectorModel;
use PhpParser\Node\Scalar\MagicConst\Dir;

class DirectorController extends BaseController
{
    private $directorModel;

    public function __construct()
    {
        $this->directorModel = new DirectorModel();
    }

    public function list() {
        $director = new DirectorModel();
        $data['director'] = $director->findAll();
        return view('include/director-list', $data);
    }

    public function add() {

        return view('include/director-add');
    }

    public function store() {
        $director = new DirectorModel();
        $data = [
          'full_name' => $this->request->getPost('director_name')
        ];
        $director->save($data);
        return redirect()->to(base_url('director'));
    }

    public function edit($id) {
        $director = new DirectorModel();
        $data['director'] = $director->find($id);
        return view('include/director-update', $data);
    }

    public function update($id) {
        $director = new DirectorModel();
        $data = [
            'full_name' => $this->request->getPost('director_name')
        ];
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
                    // gender gelecek
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
                if(is_null($director->getDirector())) {
                    $newData = [
                        'category_name' => $this->request->getVar('category_name')
                        // gender gelecek
                    ];

                    $director->save($newData);

                } else {

                }

                //$this->setUserSession($user);
                //$session->setFlashdata('success','Succesful Registiration');
                return redirect()->to('/dashboard');
            }
        }
        echo view('login',$data);
    }



}