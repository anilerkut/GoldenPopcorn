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
                    'warning_name' => 'required|min_length[2]|is_unique[warning.warning_name]',
                ];

            if(! $this->validate($rules))
            {
                $data['validation']= $this->validator;
            }
            else
            {
                $warning = new WarningModel();
               
                $newData = 
                [
                    'warning_name'  => $this->request->getVar('warning_name')
                ];

                $warning->save($newData);

                return redirect()->to('/dashboard');
            }
        }
    }

}