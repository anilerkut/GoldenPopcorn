<?php

namespace App\Controllers;

use App\Models\CountryModel;

class CountryController extends BaseController
{

    private $countryModel;

    public function __construct()
    {
        $this->countryModel = new CountryModel();
    }

    private function setUserSession($warning)
    {
        $data=
        [
            'warning_name'=>$warning['warning_name'],
            // gender, veritabanından cekilip forma aktarılacak ve oradan alınacak
        ];

        session()->set($data);
        return true;
    }


    public function addCountry() {
        $data = [];
        helper(['form']);

        if($this->request->getPost())
        {
            $rules=
                [
                    'country_name' => 'required|min_length[2]',
                ];

            $errors=
                [
                    'country_name' =>
                    [
                        'validateCountry'=> "The length of country name must be minimum two"
                    ]
                ];

            if(! $this->validate($rules,$errors))
            {
                $data['validation']= $this->validator;
            }
            else
            {
                $country = new CountryModel();
                if(is_null($country->getCountry()))
                {
                    $newData = 
                    [
                        'country_name'  => $this->request->getVar('country_name')
                    ];

                    $country->save($newData);
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