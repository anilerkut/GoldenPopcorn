<?php

namespace App\Models;
use CodeIgniter\Model;

class ActorModel extends Model
{
    protected $table='actor';
    protected $primaryKey = 'id';
    protected $returnType ='array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['actor_firstname','actor_lastname','actor_gender','actor_picture','actor_birthdate'];
    protected $useTimestamps= false;
    protected $createdField='created_at';
    protected $updatedField='updated_at';
    protected $skipValidation=false;

    public function getActorSelect($id)
    {
        $builder=$this->builder($this->table);
        $builder=$builder->where('id',$id);
        $builder=$builder->select('actor_firstname','actor_lastname');
        $builder=$builder->get();
        return $builder->getResultArray();
    }

    public function getActorFullNameAndPicture()
    {
        $builder = $this->builder($this->table);
        $builder = $builder->select('actor_firstname, actor_lastname, actor_picture');
        $builder = $builder->get();
        return $builder->getResultArray();
    }

    public function getActorLike($name){
        $builder=$this->builder($this->table);
        $builder=$builder->like('actor_firstname',$name,both);
        $builder=$builder->orLike('actor_lastname',$name,both);
        $builder=$builder->get();
        return $builder->getResultArray();
    }

    public function getActorGenderID($id){ //brings the actor's gender from gender table
        $builder=$this->builder($this->table);
        $builder=$builder->where('id',$id);
        $builder=$builder->select('actor_gender');
        $builder=$builder->get();
        return $builder->getFirstRow();
    }

    public function getActorMovieandRoles($id){ //brings the actor's movie and roles from movie and role table
        $builder=$this->builder($this->table);
        $builder=$builder->select('role_name,movie_name,movie_poster');
        $builder = $builder->join('movie_actor', 'movie_actor.actor_id = actor.id');
        $builder = $builder->join('movie', 'movie.id = movie_actor.movie_id');
        $builder=$builder->where('actor.id',$id);
        $builder=$builder->get();
        return $builder->getResultArray();
    }
}