<?php

namespace App\Models;
use CodeIgniter\Model;
class LanguageModel extends Model
{
    protected $table='language';
    protected $primaryKey = 'id';
    protected $returnType ='array';
    protected $useSoftDeletes =true;
    protected $allowedFields = ['language_name'];
    protected $useTimestamps= false;
    protected $createdField='created_at';
    protected $updatedField='updated_at';
    protected $deletedField='deleted_at';
    protected $skipValidation=false;


    public function getLanguageList(){
        $builder=$this->builder($this->table);
        $builder=$builder->get();
        return $builder->getResultArray();
    }

    public function getLanguage($id){
        $builder=$this->builder($this->table);
        $builder=$builder->where('id',$id);
        $builder=$builder->get();
        return $builder->getResultArray();
    }
}