<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\MovieModel;
use App\Models\CountryModel;
use App\Models\LanguageModel;
use App\Models\MovieActorModel;
use App\Models\PictureModel;
use App\Models\RatingModel;


class MovieController extends BaseController
{
    private $movieModel;
    public $perPage = 12;

    public function __construct()
    {
        $this->movieModel = new MovieModel();
    }

    public function list()
    {
        $movie = new MovieModel();
        $data['movie'] = $movie->findAll();
        return view('include/movie-list', $data);
    }

    public function add() //from admin page movie list menu to movie add  
    {
        $country = new CountryModel();
        $language = new LanguageModel();
        $data['country'] = $country->findAll();
        $data['language'] = $language->findAll();
        return view('include/movie-add',$data); 
    }

    public function edit($id) //Brings the information on the edit screen 
    { 
        $movie = new MovieModel();
        $country = new CountryModel();
        $language = new LanguageModel();
        $data['country'] = $country->findAll();
        $data['language'] = $language->findAll();
        $data['movie'] = $movie->find($id);
        return view('include/movie-update',$data);
    }

    public function movieDetails($id) //to the movie details page
    { 
        $movie = new MovieModel();
        $country = new CountryModel();
        $language = new LanguageModel();
        $picture = new PictureModel();
        $category=new CategoryModel();
        $movieCountry=(($movie->getMovieCountryID($id)));
        $movieLanguage=(($movie->getMovieLanguageID($id)));  
        $data['comment']=(($movie->getMovieComments ($id)));
        $data['categories']=(($movie->getMovieCategories($id)));
        $data['warnings']=(($movie->getMovieWarnings($id)));
        $data['picture']=(($movie->getMoviePictures($id)));
        $data['movie'] = $movie->find($id);
        $data['director'] = $movie->getMovieDirectors($id);
        $data['role'] =(($movie->getMovieActors($id)));
        $data['country'] = $country->find($movieCountry->country_id);
        $data['language'] = $language->find($movieLanguage->language_id);
        return view('/site/movie-details',$data);
    }


    public function update($id) //update the informations
    {   
        $country = new CountryModel();
        $language = new LanguageModel();
        $movie = new MovieModel();
        $data = 
        [
                    'movie_name' => $this->request->getPost('movie_name'),
                    'movie_releasedate' => $this->request->getPost('movie_releasedate'),
                    'movie_duration' => $this->request->getPost('movie_duration'),
                    'movie_summary' => $this->request->getPost('movie_summary'), 
                    'movie_trailer' => $this->request->getPost('movie_trailer'),
                    'country_id' => $this->request->getPost('country_id'), 
                    'language_id' => $this->request->getPost('language_id'),
                    'movie_gross' =>$this->request->getPost('movie_gross'),
                    'imdb_rating' => $this->request->getPost('imdb_rating'),
                    'metacritic_rating' => $this->request->getPost('metacritic_rating'),
                    'rottentomatoes_rating' => $this->request->getPost('rottentomatoes_rating'),
                    'movie_poster' => $this->request->getPost('movie_poster'),
        ];
        $movie->update($id, $data);
        $data['movie'] = $movie->find($id);
        $data['country'] = $country->findAll();
        $data['language'] = $language->findAll();
        echo view('include/movie-update',$data);  
        return redirect()->to(base_url('movie'));
    }

    public function delete($id) //delete data
    { 
        $movie = new MovieModel();
        $movie->delete($id);
        return redirect()->to(base_url('movie'));
    }

    public function addMovie() {
        $data=[];
        helper(['form']);
        

        if($this->request->getPost())
        {
            $rules=
                [
                    'movie_name' => 'required|min_length[2]|is_unique[movie.movie_name]',
                    'movie_releasedate' => 'required',
                    'movie_duration' => 'required',
                    'movie_summary' => 'required|min_length[2]', 
                    'movie_trailer' => 'required|min_length[2]',
                    'country_id' => 'required',
                    'language_id' => 'required',
                    'movie_gross' => 'required|min_length[2]',
                    'imdb_rating' => 'required',
                    'metacritic_rating' => 'required',
                    'rottentomatoes_rating' => 'required',
                    'movie_poster' => 'required',
                ];

            if(! $this->validate($rules))
            {
                $data['validation']= $this->validator;
            }
            else
            {
                $movie = new MovieModel();
                $newData = [
                        'movie_name' => $this->request->getVar('movie_name'),
                        'movie_releasedate' => $this->request->getVar('movie_releasedate'),
                        'movie_duration' => $this->request->getVar('movie_duration'),
                        'movie_summary' => $this->request->getVar('movie_summary'), 
                        'movie_trailer' => $this->request->getVar('movie_trailer'),
                        'country_id' => $this->request->getVar('country_id'), 
                        'language_id' => $this->request->getVar('language_id'),
                        'movie_gross' =>$this->request->getVar('movie_gross'),
                        'imdb_rating' => $this->request->getVar('imdb_rating'),
                        'metacritic_rating' => $this->request->getVar('metacritic_rating'),
                        'rottentomatoes_rating' => $this->request->getVar('rottentomatoes_rating'),
                        'movie_poster' => $this->request->getVar('movie_poster'),
                ];
                $movie->save($newData);
                return redirect()->to('/dashboard');
            }
        }
        echo view('include/movie-add',$data);   
    }

    public function listByCard() {
        $movie = new MovieModel();
        $category = new CategoryModel();
        $country = new CountryModel();
        $data['movie'] = $movie->select('id, movie_name, movie_duration, imdb_rating, movie_releasedate, movie_poster')
                                ->where('movie.movie_releasedate <= NOW()')
                               ->paginate($this->perPage);
        $data['pager'] = $movie->pager;
        $data['category'] = $category->findAll();
        $data['country'] = $country->findAll();
        return view('site/mainPage', $data);
    }

    public function listUpcomingByCard() {
        $movie = new MovieModel();
        $category = new CategoryModel();
        $data['movie'] = $movie->select('id, movie_name, movie_duration, imdb_rating, movie_releasedate, movie_poster')
                                ->where('movie.movie_releasedate > NOW()')
                               ->paginate($this->perPage);
        $data['pager'] = $movie->pager;
        $data['category'] = $category->findAll();
        return view('site/upcoming-movies', $data);
    }

    public function searchByName() {
        $movie = new MovieModel();
        $name = $this->request->getPost('searchTxt');
        $data['movie'] = $movie->select('movie.id, movie_name, movie_duration, imdb_rating, movie_releasedate, movie_poster')
                               ->join('movie_actor', 'movie_actor.movie_id = movie.id')
                               ->join('actor', 'actor.id = movie_actor.actor_id')
                               ->join('movie_director', 'movie_director.movie_id = movie.id')
                               ->join('director', 'director.id = movie_director.director_id')
                               ->groupBy('movie.id')
                               ->like('movie_name', $name)
                               ->orLike('actor_firstname', $name)
                               ->orLike('actor_lastname', $name)
                               ->orLike('director_name', $name)
                               ->paginate($this->perPage);
        $category = new CategoryModel();

        $countryModel = new CountryModel();
        $data['category'] = $category->findAll();
        $data['country'] = $countryModel->findAll();

        $data['pager'] = $movie->pager;
        return view('site/mainPage', $data);
    }

    public function listByCategory($categoryId) {
        $movieModel = new MovieModel();
        $categoryModel = new CategoryModel();
        $countryModel = new CountryModel();
        $data['movie'] = $movieModel->select('*,movie.id as id')
                             ->join('movie_category', 'movie_category.movie_id = movie.id')
                             ->join('category', 'category.id = movie_category.category_id')
                             ->where('movie_category.category_id',$categoryId)
                             ->paginate($this->perPage);

        $data['category'] = $categoryModel->findAll();
        $data['country'] = $countryModel->findAll();
        $data['pager'] = $movieModel->pager;
        return view('site/mainPage', $data);
    }

    public function listByCountry($countryId) {
        $movieModel = new MovieModel();
        $countryModel = new CountryModel();
        $categoryModel = new CategoryModel();
        $data['movie'] = $movieModel->select('*,movie.id as id')
                             ->join('country', 'movie.country_id = country.id')
                             ->where('movie.country_id',$countryId)
                             ->paginate($this->perPage);

        $data['country'] = $countryModel->findAll();
        $data['category'] = $categoryModel->findAll();
        $data['pager'] = $movieModel->pager;
        return view('site/mainPage', $data);
    }

    public function movieRate($movieId, $rating)
    {
        $uri = service('uri');
        $movieId = $uri->getSegment(2);
        $rating = $uri->getSegment(4);
        if (!session()->get('user')){
            return redirect()->to(base_url('home/signIn'));
        } else if($rating < 1 || $rating > 5) {
            die('404');
        } else {
            $ratingModel = new RatingModel();
            $newData = [
                'movie_id' => $movieId,
                'user_id' => session()->get('user')['id'],
                'rating' => $rating
            ];
            $obj = $ratingModel->checkUserRating(session()->get('user')['id'], $movieId);
            if ($obj !== null) {
                $ratingModel->update($obj->id,$newData);
            } else {
                $ratingModel->save($newData);
            }
            return redirect()->to(base_url('movie/'.$movieId));
        }

    }

}