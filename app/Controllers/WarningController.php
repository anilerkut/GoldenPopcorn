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

    public function add() 
    {

        return view('include/warning-add');
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

                return redirect()->to('include/warning-add');
            }
        }
        echo view('include/warning-add',$data);
    }


    public function list()
    {
        $warning = new WarningModel();
        $data['warning'] = $warning->findAll();
        return view('include/warning-list', $data);
    }

}