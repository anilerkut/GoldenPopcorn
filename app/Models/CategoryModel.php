<?php

namespace App\Models;
use CodeIgniter\Model;
class CategoryModel extends Model
{

    protected $table='category';
    protected $primaryKey = 'id';
    protected $returnType ='array';
    protected $useSoftDeletes =true;
    protected $allowedFields = ['category_name'];
    protected $useTimestamps= false;
    protected $createdField='created_at';
    protected $updatedField='updated_at';
    protected $deletedField='deleted_at';
    protected $skipValidation=false;


    public function getCategoryList(){
        $builder=$this->builder($this->table);
        $builder=$builder->get();
        return $builder->getResultArray();
    }


    public function getCategory($name){
        $builder=$this->builder($this->table);
        $builder=$builder->where('category_name',$name);
    }

    public function getCategoryById($id){
        $builder=$this->builder($this->table);
        $builder=$builder->where('id',$id);
        $builder=$builder->get();
        return $builder->getResultArray();
    }


    public function getCategoryLike($name){
        $builder=$this->builder($this->table);
        $builder=$builder->like('category_name',$name,both);
        $builder=$builder->get();
        return $builder->getResultArray();
    }
}