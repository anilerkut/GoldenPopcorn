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
        $movieCategoryModel = new MovieCategoryModel();
        $category = new CategoryModel();
        $movie = new MovieModel();
        $data['movie'] = $movie->findAll();
        $data['category'] = $category->findAll();
        $data['movieCategoryModel'] = $movieCategoryModel->find($id);
        return view('include/movie-category-update', $data);
    }

    public function update($id) //update the informations
    {   
        $movieCategoryModel = new MovieCategoryModel();
        $data = 
        [
            'movie_id' => $this->request->getPost('movie_id'),
            'category_id' => $this->request->getPost('category_id')
        ];
        $movieCategoryModel->update($id, $data);
        return redirect()->to(base_url('categoryList'));
    }

    public function delete($id) //delete data
    { 
        $movieCategoryModel = new MovieCategoryModel();
        $movieCategoryModel->delete($id);
        return redirect()->to(base_url('categories/delete'));
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

                    return redirect()->to(base_url('categoryList'));
            }
        }
        echo view('include/movie-category-add',$data);
    }

}