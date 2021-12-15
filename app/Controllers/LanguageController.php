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
                return redirect()->to('include/language-add');
            }
        }
        echo view('include/language-add',$data);
    }


}