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

    public function edit($id) //Brings the information on the edit screen 
    { 
        $warning = new WarningModel();
        $data['warning'] = $warning->find($id);
        return view('include/warning-update', $data);
    }

    public function update($id) //update the informations
    {   
        $warning = new WarningModel();
        $data = 
        [
            'warning_name' => $this->request->getPost('warning_name')
        ];
        $warning->update($id, $data);
        return redirect()->to(base_url('warning'));
    }

    public function delete($id) //delete data
    { 
        $warning = new WarningModel();
        $warning->delete($id);
        return redirect()->to(base_url('warning'));
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

                return redirect()->to('/warning-add');
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