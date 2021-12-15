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

    private function setUserSession($warning)
    {
        $data=
        [
            'picture_link'=>$warning['warning_name'],
            // gender, veritabanından cekilip forma aktarılacak ve oradan alınacak
        ];

        session()->set($data);
        return true;
    }


    public function addPicture() {
        $data = [];
        helper(['form']);

        if($this->request->getPost())
        {
            $rules=
                [
                    'picture_link' => 'required|min_length[2]',
                    'movie_id'=> 'required',
                ];

            $errors=
                [
                    'picture_link' =>
                    [
                        'validatePicture'=> "The length of picture link must be minimum two"
                    ]
                ];

            if(! $this->validate($rules,$errors))
            {
                $data['validation']= $this->validator;
            }
            else
            {
                $picture = new PictureModel();
                if(is_null($picture->getPicture()))
                {
                    $newData = 
                    [
                        'picture_link'  => $this->request->getVar('picture_link'),
                        'movie_id' =>  $this->request->getVar('movie_id'),
                    ];

                    $picture->save($newData);
                }
                else
                {

                }

                //$this->setUserSession($user);
                //$session->setFlashdata('success','Succesful Registiration');
                return redirect()->to('/dashboard');
            }
        }
    }


}