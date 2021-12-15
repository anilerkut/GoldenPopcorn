<?php

namespace App\Models;
use CodeIgniter\Model;
class NewsModel extends Model
{

    protected $table='news';
    protected $primaryKey = 'id';
    protected $returnType ='array';
    protected $useSoftDeletes =false;
    protected $allowedFields = ['news_content','news_date','actor_id','director_id'];
    protected $useTimestamps= false;
    protected $createdField='created_at';
    protected $updatedField='updated_at';
    protected $skipValidation=false;


    public function getNewsList(){
        $builder=$this->builder($this->table);
        $builder=$builder->get();
        return $builder->getResultArray();
    }

    public function getNews($id){
        $builder=$this->builder($this->table);
        $builder=$builder->where('id',$id);
        $builder=$builder->get();
        return $builder->getResultArray();
    }

    public function getNewsSelect($id){
        $builder=$this->builder($this->table);
        $builder=$builder->where('id',$id);
        $builder=$builder->select('director_name');
        $builder=$builder->get();
        return $builder->getResultArray();
    }

    public function getNewsLike($name){
        $builder=$this->builder($this->table);
        $builder=$builder->like('director_name',$name,both);
        $builder=$builder->get();
        return $builder->getResultArray();
    }
}