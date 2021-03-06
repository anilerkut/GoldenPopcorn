<?php

namespace App\Models;

class RatingModel extends \CodeIgniter\Model
{
    protected $table='rating';
    protected $primaryKey = 'id';
    protected $returnType ='array';
    protected $useSoftDeletes =false;
    protected $allowedFields = ['movie_id', 'user_id', 'rating'];
    protected $useTimestamps= false;
    protected $createdField='created_at';
    protected $updatedField='updated_at';
    protected $skipValidation=false;

    public function checkUserRating ($userId, $movieId) {
        $builder = $this->builder($this->table);
        $builder = $builder->where('user_id',$userId);
        $builder = $builder->where('movie_id',$movieId);
        $builder =  $builder->get();
        return $builder->getFirstRow();
    }

    public function getAverageRating($movieId)
    {
        $builder = $this->builder($this->table);
        $builder = $builder->selectAvg('rating');
        $builder = $builder->groupBy('movie_id');
        $builder = $builder->having('movie_id', $movieId);
        $builder = $builder->get();
        return $builder->getRow();
    }

    public function getUserRating($movieId, $userId)
    {
        $builder = $this->builder($this->table);
        $builder = $builder->select('rating');
        $builder = $builder->where('movie_id', $movieId);
        $builder = $builder->where('user_id', $userId);
        $builder = $builder->get();
        return $builder->getRow();
    }

}