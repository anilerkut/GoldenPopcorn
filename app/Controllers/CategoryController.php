<?php

namespace App\Controllers;

use App\Models\CategoryModel;

class CategoryController extends BaseController
{

    private $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }

    public function add() 
    {
        return view('include/category-add');
    }

    public function edit($id) //Brings the information on the edit screen 
    { 
        $category = new CategoryModel();
        $data['category'] = $category->find($id);
        return view('include/category-update', $data);
    }

    public function update($id) //update the informations
    {   
        $category = new CategoryModel();
        $data = 
        [
            'category_name' => $this->request->getPost('category_name')
        ];
        $category->update($id, $data);
        return redirect()->to(base_url('category'));
    }

    public function delete($id) //delete data
    {                                                        
        $category = new CategoryModel();
        $category->delete($id);
        return redirect()->to(base_url('category'));
    }

    public function addCategory() {
        $data = [];
        helper(['form']);

        if($this->request->getPost())
        {
            $rules=
            [
                'category_name' => 'required|min_length[2]|is_unique[category.category_name]',
            ];

            if(! $this->validate($rules))
            {
                $data['validation']= $this->validator;
            }
            else
            {
                $category = new CategoryModel();
                
                $newData =
                [
                    'category_name' => $this->request->getVar('category_name')
                ];

                $category->save($newData);

                return redirect()->to(base_url('category'));
            }
        }
        echo view('include/category-add',$data);
    }

    public function list()
    {
        $category = new CategoryModel();
        $data['category'] = $category->findAll();
        return view('include/category-list', $data);
    }

}