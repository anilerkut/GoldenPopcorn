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
                    'country_name' => 'required|min_length[2]|is_unique[country.country_name]',
                ];

            if(! $this->validate($rules))
            {
                $data['validation']= $this->validator;
            }
            else
            {
                $country = new CountryModel();
               
                $newData = 
                [
                    'country_name'  => $this->request->getVar('country_name')
                ];

                $country->save($newData);

                return redirect()->to('include/country-add');
            }
        }
        echo view('include/country-add',$data);
    }


}