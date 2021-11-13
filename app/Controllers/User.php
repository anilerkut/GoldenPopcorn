<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    public function login()
    {
        $data=[];
        helper(['form']);
        echo view('login',$data);

    }

    public function register()
    {
        $data=[];
        helper(['form']);
        

        if($this->request->getPost())
        {
            $rules=
            [
                'user_firstname' => 'required|alpha_space|min_length[2]',
                'user_lastname' => 'required|alpha_space|min_length[2]',
                'user_email' => 'required|valid_email|is_unique[user.user_email]',
                'user_password' => 'required|min_length[4]|max_length[30]',
                'confirmpassword'  => 'matches[user_password]',
                'user_gender'  => 'required',
                'user_birthdate'  => 'required'     
            ];

            if(! $this->validate($rules))
            {          
                $data['validation']= $this->validator;
            }
            else
            {
                $user = new UserModel();

                $newdata = [
                    'user_firstname'     => $this->request->getVar('user_firstname'),
                    'user_lastname'    => $this->request->getVar('user_lastname'),
                    'user_password' => $this->request->getVar('user_password'),
                    'user_email'     => $this->request->getVar('user_email'),
                    'user_gender'    => $this->request->getVar('user_gender'),
                    'user_birthdate'    => $this->request->getVar('user_birthdate')
                ];

                $user->save($newdata);
                $session = session();
                $session->setFlashdata('success','Succesful Registiration');
                
            }
        }
        echo view('signup',$data);
    }
}
