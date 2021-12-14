<?php

namespace App\Controllers;

use App\Models\WarningModel;

class WarningController extends BaseController
{

    private $warningModel;

    public function __construct()
    {
        $this->warningModel = new WarningModel();
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


    public function addWarning() {
        $data = [];
        helper(['form']);

        if($this->request->getPost())
        {
            $rules=
                [
                    'warning_name' => 'required|min_length[2]',
                ];

            $errors=
                [
                    'warning_name' =>
                    [
                        'validateWarning'=> "The length of warning name must be minimum two"
                    ]
                ];

            if(! $this->validate($rules,$errors))
            {
                $data['validation']= $this->validator;
            }
            else
            {
                $warning = new WarningModel();
                if(is_null($warning->getWarning()))
                {
                    $newData = 
                    [
                        'warning_name'  => $this->request->getVar('warning_name')
                    ];

                    $warning->save($newData);
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