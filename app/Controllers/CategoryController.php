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

                return redirect()->to('/category-list');//?statussuccess
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