<?php

namespace App\Models;
use CodeIgniter\Model;
class NewsModel extends Model
{

    protected $table='news';
    protected $primaryKey = 'id';
    protected $returnType ='array';
    protected $useSoftDeletes =false;
    protected $allowedFields = ['news_title','news_content','news_date','actor_id'];
    protected $useTimestamps= false;
    protected $createdField='created_at';
    protected $updatedField='updated_at';
    protected $skipValidation=false;

    public function getNewsByCard(){
        $builder=$this->builder($this->table);
        $builder=$builder->select('news.id, news_title, actor_firstname, actor_lastname');
        $builder = $builder->join('actor', 'actor.id = news.actor_id');
        $builder=$builder->get();
        return $builder->getResultArray();
    }

    public function getNewsWithActor($id){
        $builder=$this->builder($this->table);
        $builder = $builder->join('actor', 'actor.id = news.actor_id');
        $builder=$builder->where('news.id',$id);
        $builder=$builder->get();
        return $builder->getFirstRow();
    }

    public function getNewsLike($name){
        $builder=$this->builder($this->table);
        $builder=$builder->like('actor_firstname',$name,both);
        $builder=$builder->get();
        return $builder->getResultArray();
    }
}