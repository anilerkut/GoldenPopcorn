<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\MovieModel;
use App\Models\MovieCategoryModel;

class MovieCategoryController extends BaseController
{
    private $movieCategoryModel;

    public function __construct()
    {
        $this->movieCategoryModel = new MovieCategoryModel();
    }

    public function list()
    {
        $categories = new MovieCategoryModel();
        $data['categories'] = $categories->findAll();
        var_dump( $data['categories']);
        return view('include/movie-category-list', $data);
    }

    public function add() //from admin page actor list menu to actor add  
    {
        $category = new CategoryModel();
        $data['category'] = $category->findAll();
        $movie = new MovieModel();
        $data['movie'] = $movie->findAll();
        return view('include/movie-category-add',$data); 
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

    public function addMovieCategories() {
        
        $data = [];
        helper(['form']);

        if($this->request->getPost())
        {
            $rules=
                [
                    'movie_id' => 'required',
                    'category_id' => 'required',
                ];

            if(! $this->validate($rules))
            {
                $data['validation']= $this->validator;
            }
            else
            {
                $movieCategoryModel = new MovieCategoryModel();

                $newData = 
                [
                    'movie_id'  => $this->request->getVar('movie_id'),
                    'category_id'  => $this->request->getVar('category_id'),
                ];
                    $movieCategoryModel->save($newData);

                return redirect()->to('/include/movie-category-list');
            }
        }
        echo view('include/movie-category-add',$data);
    }

}