<?php

namespace App\Models;
use CodeIgniter\Model;
class WarningModel extends Model
{

    protected $table='warning';
    protected $primaryKey = 'id';
    protected $returnType ='array';
    protected $useSoftDeletes =false;
    protected $allowedFields = ['warning_name'];
    protected $useTimestamps= false;
    protected $createdField='created_at';
    protected $updatedField='updated_at';
    protected $skipValidation=false;

}