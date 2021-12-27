<?php

namespace App\Models;

use CodeIgniter\Model;

class WatchlistModel extends Model
{
    protected $table='watchlist';
    protected $primaryKey = 'movie_id, user_id';
    protected $returnType ='array';
    protected $useSoftDeletes =false;
    protected $allowedFields = ['movie_id', 'user_id'];
    protected $useTimestamps= false;
    protected $updatedField='updated_at';
    protected $skipValidation=false;

    public function deleteFromUserWatchlist($userId, $movieId) {
        $builder = $this->builder($this->table);
        $builder = $builder->where('user_id',$userId);
        $builder = $builder->where('movie_id',$movieId);
        $builder->delete();
    }

}