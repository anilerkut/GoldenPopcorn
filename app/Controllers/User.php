<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }
    
    public function login()
    {
        $data=[];
        helper(['form']);

        if($this->request->getPost())
        {
            $rules=
            [ 
                'user_email' => 'required|valid_email',
                'user_password' => 'required|min_length[4]|max_length[30]|validateUser[user_email,user_password]',
            ];

            $errors=
            [
                'user_password'=> 
                [
                    'validateUser'=> "Email or Password don't match"
                ]
            ];

            if(! $this->validate($rules,$errors))
            {          
                $data['validation']= $this->validator;
            }
            else
            {
                $model = new UserModel();
                $user=$model->where('user_email',$this->request->getVar('user_email'))
                            ->first();

                $this->setUserSession($user);
                $session->setFlashdata('success','Succesful Registiration');
                return redirect()->to('/movies');
            }
        }
        echo view('site/login',$data);

    }

    private function setUserSession($user)
    {
        $data=[

            'user_firstname'=>$user['user_firstname'],
            'user_lastname'=>$user['user_lastname'],
            'user_email'=>$user['user_email'],
            'isLoggedIn'=>true,
        ];

        session()->set($data);
        return true;
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
                return redirect()->to('/login');
            }
        }
        echo view('site/signup',$data);
    }

    public function delete($id=null) 
    {
        if (!is_null($id)) {
            $this->userModel->delete($id);
            return $this->response->setJSON([
               'message' => 'Kullanıcı silindi'
            ]);
        }
    }

    public function find($id=null) {
        if (!is_null($id))
        {
            $user = $this->userModel->find($id);
            return $this->response->setJSON([
                'user' => $user,
                'message' => "kullanıcı getirildi"
            ]);
        }
    }

    public function findAll() {
        $users = $this->userModel->findAll();
        return $this->response->setJSON($users);
    }
}
