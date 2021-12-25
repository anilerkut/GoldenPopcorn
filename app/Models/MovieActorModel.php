<?php

namespace App\Models;
use CodeIgniter\Model;

class MovieActorModel extends Model
{
    protected $table='movie_actor';
    protected $primaryKey = 'id';
    protected $returnType ='array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['actor_id','movie_id','role_name'];
    protected $useTimestamps= false;
    protected $createdField='created_at';
    protected $updatedField='updated_at';
    protected $skipValidation=false;


    public function getRoleList()
    {
        $builder=$this->builder($this->table);
        $builder=$builder->get();
        return $builder->getResultArray();
    }

    public function getRole($id)
    {
        $builder=$this->builder($this->table);
        $builder=$builder->where('id',$id);
        $builder=$builder->get();
        return $builder->getResultArray();
    }

    public function getRoleSelect($id)
    {
        $builder=$this->builder($this->table);
        $builder=$builder->where('id',$id);
        $builder=$builder->select('actor_firstname','actor_lastname');
        $builder=$builder->get();
        return $builder->getResultArray();
    }

    public function getActorID($id){ //brings the actor's gender from gender table
        $builder=$this->builder($this->table);
        $builder=$builder->where('id',$id);
        $builder=$builder->select('actor_id');
        $builder=$builder->get();
        return $builder->getFirstRow();
    }

}