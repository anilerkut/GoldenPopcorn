<?php

namespace App\Models;
use CodeIgniter\Database\BaseBuilder;
use CodeIgniter\Model;
class MovieModel extends Model
{
    protected $table='movie';
    protected $primaryKey = 'id';
    protected $returnType ='array';
    protected $useSoftDeletes =false;
    protected $allowedFields = ['movie_name','movie_summary','movie_duration','movie_releasedate','movie_trailer','imdb_rating',
        'metacritic_rating','rottentomatoes_rating','movie_gross','movie_poster','country_id','language_id'];
    protected $useTimestamps= false;
    protected $createdField='created_at';
    protected $updatedField='updated_at';
    protected $skipValidation=false;


    public function getMovieCountryID($id){ //brings the movie's country from country table
        $builder=$this->builder($this->table);
        $builder=$builder->where('id',$id);
        $builder=$builder->select('country_id');
        $builder=$builder->get();
        return $builder->getFirstRow();
    }

    public function getMovieLanguageID($id){ //brings the movie's language from language table
        $builder=$this->builder($this->table);
        $builder=$builder->where('id',$id);
        $builder=$builder->select('language_id');
        $builder=$builder->get();
        return $builder->getFirstRow();
    }

    public function getMovieActors($movieId) {
        $builder=$this->builder($this->table);
        $builder = $builder->join('movie_actor', 'movie_actor.movie_id = movie.id');
        $builder = $builder->join('actor', 'actor.id = movie_actor.actor_id');
        $builder=$builder->where('movie_actor.movie_id',$movieId);
        $builder=$builder->get();
        return $builder->getResultArray();
    }

    public function getMovieDirectors($movieId) {
        $builder=$this->builder($this->table);
        $builder = $builder->join('movie_director', 'movie_director.movie_id = movie.id');
        $builder = $builder->join('director', 'director.id = movie_director.director_id');
        $builder=$builder->where('movie.id',$movieId);
        $builder=$builder->get();
        return $builder->getResultArray();
    }

    public function getMoviePictures($id){ //brings the movie's pictures from picture table
        $builder=$this->builder($this->table);
        $builder=$builder->select('picture_link');
        $builder = $builder->join('picture', 'picture.movie_id = movie.id');
        $builder=$builder->where('movie.id',$id);
        $builder=$builder->get();
        return $builder->getResultArray();
    }

    public function getMovieCategories($id){ //brings the movie's categories from category table
        $builder=$this->builder($this->table);
        $builder=$builder->select('category_name');
        $builder = $builder->join('movie_category', 'movie_category.movie_id = movie.id');
        $builder = $builder->join('category', 'category.id = movie_category.category_id');
        $builder=$builder->where('movie.id',$id);
        $builder=$builder->get();
        return $builder->getResultArray();
    }

    public function getMovieWarnings($id){ //brings the movie's pictures from picture table
        $builder=$this->builder($this->table);
        $builder=$builder->select('warning_name');
        $builder = $builder->join('movie_warning', 'movie_warning.movie_id = movie.id');
        $builder = $builder->join('warning', 'warning.id = movie_warning.warning_id');
        $builder=$builder->where('movie.id',$id);
        $builder=$builder->get();
        return $builder->getResultArray();
    }

    public function getMovieComments($id){ //brings the movie's pictures from picture table
        $builder=$this->builder($this->table);
        $builder=$builder->select('comment_content,comment_date,user_firstname,user_lastname,user_image');
        $builder = $builder->join('comment', 'comment.movie_id = movie.id');
        $builder = $builder->join('user', 'user.id = comment.user_id');
        $builder=$builder->where('movie.id',$id);
        $builder=$builder->get();
        return $builder->getResultArray();
    }

    public function suggest($limit)
    {
        $builder = $this->builder($this->table)->distinct()->limit($limit);
        $builder = $builder->select('movie.id, movie_name, movie_duration, imdb_rating, movie_releasedate, movie_poster');
        $builder = $builder->join('movie_category', 'movie_category.movie_id = movie.id');

        $builder = $builder->whereIn('movie_category.category_id', function (BaseBuilder $subqueryBuilder) {
            return $subqueryBuilder->select('movie_category.category_id')->distinct()->from('watchlist')
                ->join('movie_category', 'movie_category.movie_id = watchlist.movie_id')
                ->join('user', 'user.id = watchlist.user_id')
                ->where('user.id', session()->get('user')['id']);
        });

        $builder = $builder->whereNotIn('movie.id', function (BaseBuilder $subqueryBuilder) {
            return $subqueryBuilder->select('watchlist.movie_id')->distinct()->from('watchlist')
                ->join('movie', 'movie.id =  watchlist.movie_id')
                ->where('watchlist.user_id', session()->get('user')['id']);
        });

        $builder = $builder->orderBy('movie.movie_name', 'RANDOM');
        $builder = $builder->get();
        return $builder->getResultArray();
    }

}