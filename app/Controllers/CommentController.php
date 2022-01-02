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

    public function edit($id) //Brings the information on the edit screen 
    { 
        return view('include/actor-update', $data);
    }

    public function update($id) //update the informations
    {   
        $commentModel = new CommentModel();
        $data = 
        [
           
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
                    'comment_content' => 'required|min_length[2]',
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
                    $date = date('Y-m-d'),
                    'comment_date' => $date,
                ];
                $comment->save($newData);

                return redirect()->to(base_url('movie/'.$movieID));
            }
        }
        echo view('site/movie-details',$data);
    }

}