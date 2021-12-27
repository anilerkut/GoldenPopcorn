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

    public function add() 
    {
        return view('include/country-add');
    }

    public function edit($id) //Brings the information on the edit screen 
    { 
        $country = new CountryModel();
        $data['country'] = $country->find($id);
        return view('include/country-update', $data);
    }

    public function update($id) //update the informations
    {   
        $country = new CountryModel();
        $data = 
        [
            'country_name' => $this->request->getPost('country_name')
        ];
        $country->update($id, $data);
        return redirect()->to(base_url('country'));
    }

    public function delete($id) //delete data
    { 
        $country = new CountryModel();
        $country->delete($id);
        return redirect()->to(base_url('country'));
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

                return redirect()->to(base_url('country'));
            }
        }
        echo view('include/country-add',$data);
    }

    public function list() 
    {
        $country = new CountryModel();
        $data['country'] = $country->findAll();
        return view('include/country-list', $data);
    }
}