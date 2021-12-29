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
            // language, veritabanından cekilip forma aktarılacak ve oradan alınacak
        ];

        session()->set($data);
        return true;
    }

    public function list()
    {
        $language = new LanguageModel();
        $data['language'] = $language->findAll();
        return view('include/language-list', $data);
    }

    public function add() 
    {
        return view('include/language-add');
    }

    public function edit($id) //Brings the information on the edit screen 
    { 
        $language = new languageModel();
        $data['language'] = $language->find($id);
        return view('include/language-update', $data);
    }

    public function update($id) //update the informations
    {   
        $language = new languageModel();
        $data = 
        [
            'language_name' => $this->request->getPost('language_name')
        ];
        $language->update($id, $data);
        return redirect()->to(base_url('language'));
    }

    public function delete($id) //delete data
    { 
        $language = new languageModel();
        $language->delete($id);
        return redirect()->to(base_url('language'));
    }

    public function addLanguage() 
    {
        $data = [];
        helper(['form']);

        if($this->request->getPost())
        {
            $rules=
                [
                    'language_name' => 'required|min_length[2]|is_unique[language.language_name]',
                ];

            if(! $this->validate($rules))
            {
                echo "hata yaptın sürtük";
                $data['validation']= $this->validator;
            }
            else
            {
                $language = new LanguageModel();
               
                $newData = 
                [
                    'language_name'  => $this->request->getVar('language_name')
                ];

                $language->save($newData);
                return redirect()->to(base_url('language'));
            }
        }
        echo view('include/language-add',$data);
    }


}