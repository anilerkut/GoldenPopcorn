<?php

namespace App\Models;
use CodeIgniter\Model;
class CountryModel extends Model
{

    protected $table='country';
    protected $primaryKey = 'id';
    protected $returnType ='array';
    protected $useSoftDeletes =false;
    protected $allowedFields = ['country_name'];
    protected $useTimestamps= false;
    protected $createdField='created_at';
    protected $updatedField='updated_at';
    protected $skipValidation=false;


    public function getCountryList(){
        $builder=$this->builder($this->table);
        $builder=$builder->get();
        return $builder->getResultArray();
    }

    public function getCountry($id){
        $builder=$this->builder($this->table);
        $builder=$builder->where('id',$id);
        $builder=$builder->get();
        return $builder->getResultArray();
    }
}