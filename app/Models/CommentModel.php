<?php

namespace App\Models;
use CodeIgniter\Model;
class CommentModel extends Model
{
    protected $table='comment';
    protected $primaryKey = 'id';
    protected $returnType ='array';
    protected $useSoftDeletes =true;
    protected $allowedFields = ['comment_content','comment_date','user_id','movie_id'];
    protected $useTimestamps= false;
    protected $createdField='created_at';
    protected $updatedField='updated_at';
    protected $deletedField='deleted_at';
    protected $skipValidation=false;


    public function getCommentList(){
        $builder=$this->builder($this->table);
        $builder=$builder->get();
        return $builder->getResultArray();
    }

    public function getComment($id){
        $builder=$this->builder($this->table);
        $builder=$builder->where('id',$id);
        $builder=$builder->get();
        return $builder->getResultArray();
    }

    public function getCommentSelect($id){
        $builder=$this->builder($this->table);
        $builder=$builder->where('id',$id);
        $builder=$builder->select('comment_content',comment_date);
        $builder=$builder->get();
        return $builder->getResultArray();
    }

}