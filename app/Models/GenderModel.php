<?php

namespace App\Models;
use CodeIgniter\Model;
class GenderModel extends Model
{

    protected $table='gender';
    protected $primaryKey = 'id';
    protected $returnType ='array';
    protected $useSoftDeletes =true;
    protected $allowedFields = ['gender_name'];
    protected $useTimestamps= false;
    protected $createdField='created_at';
    protected $updatedField='updated_at';
    protected $deletedField='deleted_at';
    protected $skipValidation=false;


    public function getGenderList(){
        $builder=$this->builder($this->table);
        $builder=$builder->get();
        return $builder->getResultArray();
    }

    public function getGender($id){
        $builder=$this->builder($this->table);
        $builder=$builder->where('id',$id);
        $builder=$builder->get();
        return $builder->getResultArray();
    }
}