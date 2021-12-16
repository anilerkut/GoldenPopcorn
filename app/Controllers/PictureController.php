<?php

namespace App\Controllers;

use App\Models\PictureModel;

class PictureController extends BaseController
{

    private $pictureModel;

    public function __construct()
    {
        $this->pictureModel = new PictureModel();
    }

    public function list()
    {
        $picture = new PictureModel();
        $data['picture'] = $picture->findAll();
        return view('include/picture-list', $data);
    }

    public function add() //from admin page picture list menu to picture add  
    {
        return view('include/picture-add'); 
    }

    public function edit($id) //Brings the information on the edit screen 
    { 
        $picture = new PictureModel();
        $data['picture'] = $picture->find($id);
        return view('include/picture-update', $data);
    }

    public function update($id) //update the informations
    {   
        $picture = new PictureModel();
        $data = 
        [
            'picture_name' => $this->request->getPost('picture_name')
        ];
        $picture->update($id, $data);
        return redirect()->to(base_url('picture'));
    }

    public function delete($id) //delete data
    { 
        $picture = new PictureModel();
        $picture->delete($id);
        return redirect()->to(base_url('picture'));
    }

    public function addPicture() {
        $data = [];
        helper(['form']);

        if($this->request->getPost())
        {
            $rules=
                [
                    'picture_link' => 'required|min_length[2]|is_unique[picture.picture_link]',
                    'movie_id'=> 'required',
                ];


            if(! $this->validate($rules))
            {
                $data['validation']= $this->validator;
            }
            else
            {
                $picture = new PictureModel();
                
                $newData = 
                [
                    'picture_link'  => $this->request->getVar('picture_link'),
                    'movie_id' =>  $this->request->getVar('movie_id'),
                ];

                $picture->save($newData);
               
                return redirect()->to('/dashboard');
            }
        }
    }


}