<?php

namespace App\Models;
use CodeIgniter\Model;
use App\Models\DirectorModel;

class DirectorModel extends Model
{
    protected $table='director';
    protected $primaryKey = 'id';
    protected $returnType ='array';
    protected $useSoftDeletes =false;
    protected $allowedFields = ['director_name','director_gender','director_picture'];
    protected $useTimestamps= false;
    protected $createdField='created_at';
    protected $updatedField='updated_at';
    //protected $deletedField='deleted_at';
    protected $skipValidation=false;
 
}