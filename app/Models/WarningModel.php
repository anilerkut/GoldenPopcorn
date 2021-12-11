<?php

namespace App\Models;
use CodeIgniter\Model;
class WarningModel extends Model
{

    protected $table='warning';
    protected $primaryKey = 'id';
    protected $returnType ='array';
    protected $useSoftDeletes =true;
    protected $allowedFields = ['warning_name'];
    protected $useTimestamps= false;
    protected $createdField='created_at';
    protected $updatedField='updated_at';
    protected $deletedField='deleted_at';
    protected $skipValidation=false;


    public function getWarningList(){
        $builder=$this->builder($this->table);
        $builder=$builder->get();
        return $builder->getResultArray();
    }

    public function getWarning($id){
        $builder=$this->builder($this->table);
        $builder=$builder->where('id',$id);
        $builder=$builder->get();
        return $builder->getResultArray();
    }
}