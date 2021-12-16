<?php

namespace App\Models;
use CodeIgniter\Model;

class ActorModel extends Model
{
    protected $table='actor';
    protected $primaryKey = 'id';
    protected $returnType ='array';
    protected $useSoftDeletes =false;
    protected $allowedFields = ['actor_firstname','actor_lastname','actor_gender','actor_picture','actor_birthdate'];
    protected $useTimestamps= false;
    protected $createdField='created_at';
    protected $updatedField='updated_at';
    protected $skipValidation=false;


    public function getActorList()
    {
        $builder=$this->builder($this->table);
        $builder=$builder->get();
        return $builder->getResultArray();
    }

    public function getActor($id){

        $builder=$this->builder($this->table);
        $builder=$builder->where('id',$id);
        $builder=$builder->get();
        return $builder->getResultArray();
    }
    public function getActorSelect($id)
    {
        $builder=$this->builder($this->table);
        $builder=$builder->where('id',$id);
        $builder=$builder->select('actor_firstname','actor_lastname');
        $builder=$builder->get();
        return $builder->getResultArray();
    }

    public function getActorFullName($firstName, $lastName)
    {
        $builder=$this->builder($this->table);
        $builder=$builder->where('actor_firstName',$firstName);
        $builder=$builder->where('actor_lastName',$lastName);
        $builder=$builder->select('actor_firstname','actor_lastname');
        $builder=$builder->get();
        return $builder->getResultArray();
    }

    public function getActorLike($name){
        $builder=$this->builder($this->table);
        $builder=$builder->like('actor_firstname',$name,both);
        $builder=$builder->orLike('actor_lastname',$name,both);
        $builder=$builder->get();
        return $builder->getResultArray();
    }

}