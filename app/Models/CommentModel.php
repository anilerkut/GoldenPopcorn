<?php

namespace App\Models;
use CodeIgniter\Model;
class CommentModel extends Model
{
    protected $table='comment';
    protected $primaryKey = 'id';
    protected $returnType ='array';
    protected $useSoftDeletes =false;
    protected $allowedFields = ['comment_content','comment_date','user_id','movie_id'];
    protected $useTimestamps= false;
    protected $createdField='created_at';
    protected $updatedField='updated_at';
    protected $skipValidation=false;

}