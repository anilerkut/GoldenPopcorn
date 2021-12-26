<?php

namespace App\Models;
use CodeIgniter\Model;

class MovieCategoryModel extends Model
{
    protected $table='movie_category';
    protected $primaryKey = 'id';
    protected $returnType ='array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['movie_id','category_id'];
    protected $useTimestamps= false;
    protected $createdField='created_at';
    protected $updatedField='updated_at';
    protected $skipValidation=false;


}