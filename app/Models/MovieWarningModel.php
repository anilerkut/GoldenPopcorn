<?php

namespace App\Models;
use CodeIgniter\Model;

class MovieWarningModel extends Model
{
    protected $table='movie_warning';
    protected $primaryKey = 'id';
    protected $returnType ='array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['movie_id','warning_id'];
    protected $useTimestamps= false;
    protected $createdField='created_at';
    protected $updatedField='updated_at';
    protected $skipValidation=false;


}