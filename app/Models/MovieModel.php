<?php

namespace App\Models;
use CodeIgniter\Model;
class MovieModel extends Model
{
    protected $table='movie';
    protected $primaryKey = 'id';
    protected $returnType ='array';
    protected $useSoftDeletes =false;
    protected $allowedFields = ['movie_name','movie_summary','movie_duration','movie_releasedate','movie_trailer','imdb_rating',
        'metacritic_rating','rottentomatoes_rating','movie_gross','movie_poster','country_id','language_id'];
    protected $useTimestamps= false;
    protected $createdField='created_at';
    protected $updatedField='updated_at';
    protected $skipValidation=false;


    public function getMovieListByCard(){
        $builder=$this->builder($this->table);
        $builder=$builder->select('movie_name','movie_duration','imdb_rating','movie_releasedate');
        $builder=$builder->get();
        return $builder->getResultArray();
    }

    public function getMovie($id){
        $builder=$this->builder($this->table);
        $builder=$builder->where('id',$id);
        $builder=$builder->get();
        return $builder->getResultArray();
    }

    public function getMovieSelect($id){
        $builder=$this->builder($this->table);
        $builder=$builder->where('id',$id);
        $builder=$builder->select('movie_name','movie_duration');
        $builder=$builder->get();
        return $builder->getResultArray();
    }

    public function getMovieLike($name){
        $builder=$this->builder($this->table);
        $builder=$builder->like('movie_name',$name,both);
        $builder=$builder->get();
        return $builder->getResultArray();
    }
}