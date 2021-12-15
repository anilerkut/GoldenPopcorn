<?php

namespace App\Controllers;

use App\Models\LanguageModel;

class LanguageController extends BaseController
{

    private $languageModel;

    public function __construct()
    {
        $this->languageModel = new LanguageModel();
    }

    private function setLanguageSession($language)
    {
        $data=
        [
            'language_name'=>$language['language_name'],
            // gender, veritabanından cekilip forma aktarılacak ve oradan alınacak
        ];

        session()->set($data);
        return true;
    }

    public function list()
    {
        //$language = new LanguageModel();
        //$data['language'] = $language->findAll();
        //return view('include/language-list', $data);
        return view('include/language-list');
    }


    public function addLanguage() 
    {
        $data = [];
        helper(['form']);

        if($this->request->getPost())
        {
            $rules=
                [
                    'language_name' => 'required|min_length[2]',
                ];

            $errors=
                [
                    'language_name' =>
                    [
                        'validateLanguage'=> "The length of language name must be minimum two"
                    ]
                ];

            if(! $this->validate($rules,$errors))
            {
                $data['validation']= $this->validator;
            }
            else
            {
                $language = new LanguageModel();
                if(is_null($language->getLanguage()))
                {
                    $newData = 
                    [
                        'language_name'  => $this->request->getVar('language_name')
                    ];

                    $language->save($newData);
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