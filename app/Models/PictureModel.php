<?php

namespace App\Models;
use CodeIgniter\Model;
class PictureModel extends \CodeIgniter\Model
{

    protected $table='Picture';
    protected $primaryKey = 'id';
    protected $returnType ='array';
    protected $useSoftDeletes =false;
    protected $allowedFields = ['picture_link','movie_id'];
    protected $useTimestamps= false;
    protected $createdField='created_at';
    protected $updatedField='updated_at';
    protected $skipValidation=false;

    public function getPictureSelect($id){
        $builder=$this->builder($this->table);
        $builder=$builder->where('id',$id);
        $builder=$builder->select('picture_link');
        $builder=$builder->get();
        return $builder->getResultArray();
    }

}