<?php

namespace App\Models;
use CodeIgniter\Model;

class MovieDirectorModel extends Model
{
    protected $table='movie_director';
    protected $primaryKey = 'id';
    protected $returnType ='array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['movie_id','director_id'];
    protected $useTimestamps= false;
    protected $createdField='created_at';
    protected $updatedField='updated_at';
    protected $skipValidation=false;

}