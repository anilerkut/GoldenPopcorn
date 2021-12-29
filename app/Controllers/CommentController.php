<?php

namespace App\Controllers;

use App\Models\MovieModel;
use App\Models\CommentModel;

class CommentController extends BaseController
{
    private $commentModel;

    public function __construct()
    {
        $this->commentModel = new CommentModel();
    }

    public function list()
    {
        $comment = new CommentModel();
        $data['comment'] = $comment->findAll();
        return view('include/actor-list', $data);
    }

    public function add() //from admin page actor list menu to actor add  
    {
        $movie = new MovieModel();
        $data['movie'] = $movie->findAll();
        return view('include/actor-add',$data); 
    }

    public function edit($id) //Brings the information on the edit screen 
    { 
        $gender = new GenderModel();
        $actor = new ActorModel();
        $data['gender'] = $gender->findAll();
        $data['actor'] = $actor->find($id);
        return view('include/actor-update', $data);
    }

    public function update($id) //update the informations
    {   
        $actor = new ActorModel();
        $data = 
        [
            'actor_name' => $this->request->getPost('actor_name')
        ];
        $actor->update($id, $data);
        return redirect()->to(base_url('actor'));
    }

    public function delete($id) //delete data
    { 
        $actor = new ActorModel();
        $actor->delete($id);
        return redirect()->to(base_url('actor'));
    }

    public function addComment($userID,$movieID)
     {
        
        $data = [];
        helper(['form']);

        if($this->request->getPost())
        {
            $rules=
                [
                    'user_id' => 'required',
                    'movie_id' => 'required',
                    'comment_content' => 'required|min_length[2]',
                    'comment_date' => 'required',
                ];

            if(! $this->validate($rules))
            {
                $data['validation']= $this->validator;
            }
            else
            {
                $comment = new CommentModel();

                $newData = 
                [
                    'user_id'  => $userID,
                    'movie_id'  => $movieID,
                    'comment_content'  => $this->request->getVar('comment_content'),
                    'comment_date' => $this->request->getVar(NOW()),
                ];
                $comment->save($newData);

                return redirect()->to(base_url('actor'));
            }
        }
        echo view('include/actor-add',$data);
    }

}