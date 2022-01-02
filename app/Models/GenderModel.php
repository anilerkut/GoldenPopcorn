<?php

namespace App\Models;
use CodeIgniter\Model;
class GenderModel extends Model
{

    protected $table='gender';
    protected $primaryKey = 'id';
    protected $returnType ='array';
    protected $useSoftDeletes =false;
    protected $allowedFields = ['gender_name'];
    protected $useTimestamps= false;
    protected $createdField='created_at';
    protected $updatedField='updated_at';
    protected $skipValidation=false;

}