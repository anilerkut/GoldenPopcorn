<?php

namespace App\Models;
use CodeIgniter\Model;
class DirectorModel extends Model
{
    protected $table='director';
    protected $primaryKey = 'id';
    protected $returnType ='array';
    protected $useSoftDeletes =true;
    protected $allowedFields = ['director_name','director_gender'];
    protected $useTimestamps= false;
    protected $createdField='created_at';
    protected $updatedField='updated_at';
    protected $deletedField='deleted_at';
    protected $skipValidation=false;


    public function getDirectorList(){
        $builder=$this->builder($this->table);
        $builder=$builder->get();
        return $builder->getResultArray();
    }

    public function getDirector($id){
        $builder=$this->builder($this->table);
        $builder=$builder->where('id',$id);
        $builder=$builder->get();
        return $builder->getResultArray();
    }

    public function getDirectorSelect($id){
        $builder=$this->builder($this->table);
        $builder=$builder->where('id',$id);
        $builder=$builder->select('director_name');
        $builder=$builder->get();
        return $builder->getResultArray();
    }

    public function getDirectorLike($name){
        $builder=$this->builder($this->table);
        $builder=$builder->like('director_name',$name,both);
        $builder=$builder->get();
        return $builder->getResultArray();
    }
}