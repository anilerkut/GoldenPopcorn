<?php

namespace App\Controllers;
use \App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function add() {

    }

    public function update($id=null) {
        if (!is_null($id)) {

        }
    }

    public function delete($id=null) {
        if (!is_null($id)) {
            $this->userModel->delete($id);
            return $this->response->setJSON([
               'message' => 'Kullanıcı silindi'
            ]);
        }
    }

    public function find($id=null) {
        if (!is_null($id)) {
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