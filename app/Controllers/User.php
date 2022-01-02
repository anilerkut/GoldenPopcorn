<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    private $userModel;
    private $perPage = 4;

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
                $user = $model->where('user_email',$this->request->getVar('user_email'))
                              ->first();

                $this->setUserSession($user);
                if($user['user_type']==1)
                {
                    return redirect()->to('/movies');
                }
                else if($user['user_type']==2)
                {
                    return redirect()->to('/movie');
                }
            }
        }
        echo view('site/login',$data);
    }

    private function setUserSession($user)
    {
        $data=[
            'id' => $user['id'],
            'user_firstname'=>$user['user_firstname'],
            'user_lastname'=>$user['user_lastname'],
            'user_email'=>$user['user_email'],
            'isLoggedIn'=>true,
        ];
        session()->set('user', $data);
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
                $file = $this->request->getFile('user_image');
                $imageName = "";
                if ($file->isValid() && ! $file->hasMoved()) {
                    $imageName = $file->getRandomName();
                    $file->move('uploads/', $imageName);
                }
                if ($imageName === "") {
                    $imageName = 'no-user-profile-picture.jpg';
                }

                $newdata = [
                    'user_firstname'     => $this->request->getVar('user_firstname'),
                    'user_lastname'    => $this->request->getVar('user_lastname'),
                    'user_password' => $this->request->getVar('user_password'),
                    'user_email'     => $this->request->getVar('user_email'),
                    'user_type' => 1,
                    'user_gender'    => $this->request->getVar('user_gender'),
                    'user_birthdate'    => $this->request->getVar('user_birthdate'),
                    'user_image' => $imageName
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
        if (!is_null($id))
        {
            $this->userModel->delete($id);
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
        return redirect()->to(base_url('user'));
    }

    public function list()
    {
        $user = new UserModel();
        $data['user'] = $user->findAll();
        return view('include/user-list', $data);
    }

    public function findAll() {
        $users = $this->userModel->findAll();
        return $this->response->setJSON($users);
    }

    public function edit($id) {
        $userModel = new UserModel();
        $data['user'] = $userModel->find($id);
        // $data['movies'] = $userModel->getUserMovies($id);
        $data['movies'] = $userModel->select('movie.movie_name, movie.movie_poster, movie.id')
                                    ->join('watchlist', 'watchlist.user_id = user.id')
                                    ->join('movie', 'movie.id = watchlist.movie_id')
                                    ->where('user.id',$id)
                                    ->paginate($this->perPage);
        $data['pager'] = $userModel->pager;
        return view('site/profile', $data);
    }

    public function update($id) {
        $data=[];
        helper(['form']);
        $rules=
            [
                'user_firstname' => 'required|alpha_space|min_length[2]',
                'user_lastname' => 'required|alpha_space|min_length[2]',
                'user_password' => 'required|min_length[4]|max_length[30]',
                'user_password_again'  => 'matches[user_password]',
            ];
        if(! $this->validate($rules)) {
            $data['validation']= $this->validator;
        } else {
            $userModel = new UserModel();
            $newPassword = $this->request->getPost('user_password');
            $newData = [
                'user_firstname' => $this->request->getPost('user_firstname'),
                'user_lastname' => $this->request->getPost('user_lastname'),
                'user_password' => $newPassword
            ];
            $userModel->update($id, $newData);
            return redirect()->to(base_url('profile/'.$id));
        }
        $this->edit($id);
        echo view('site/profile', $data);
    }


}
