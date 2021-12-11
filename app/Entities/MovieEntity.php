<?php

namespace App\Entities;
use \CodeIgniter\Entity\Entity;

class MovieEntity extends Entity {

    protected $movie_name;
    protected $movie_duration;
    protected $movie_release_date;
    protected $movie_summary;
    protected $movie_trailer;
    protected $movie_gross;
    protected $language_id;
    protected $country_id;
    protected $imdb_rating;
    protected $metacritic_rating;
    protected $rottentomatoes_rating;
    protected $warning_ids = array();
    protected $movie_picture;
    protected $director_id;
    protected $comments = array();

    public function getMovieName()
    {
        return $this->movie_name;
    }

    public function setMovieName($movie_name): void
    {
        $this->movie_name = $movie_name;
    }

    public function getMovieDuration()
    {
        return $this->movie_duration;
    }

    public function setMovieDuration($movie_duration): void
    {
        $this->movie_duration = $movie_duration;
    }

    public function getMovieReleaseDate()
    {
        return $this->movie_release_date;
    }

    public function setMovieReleaseDate($movie_release_date): void
    {
        $this->movie_release_date = $movie_release_date;
    }

    public function getMovieSummary()
    {
        return $this->movie_summary;
    }

    public function setMovieSummary($movie_summary): void
    {
        $this->movie_summary = $movie_summary;
    }

    public function getMovieTrailer()
    {
        return $this->movie_trailer;
    }

    public function setMovieTrailer($movie_trailer): void
    {
        $this->movie_trailer = $movie_trailer;
    }

    public function getMovieGross()
    {
        return $this->movie_gross;
    }

    public function setMovieGross($movie_gross): void
    {
        $this->movie_gross = $movie_gross;
    }

    public function getLanguageId()
    {
        return $this->language_id;
    }

    public function setLanguageId($language_id): void
    {
        $this->language_id = $language_id;
    }

    public function getCountryId()
    {
        return $this->country_id;
    }

    public function setCountryId($country_id): void
    {
        $this->country_id = $country_id;
    }

    public function getImdbRating()
    {
        return $this->imdb_rating;
    }

    public function setImdbRating($imdb_rating): void
    {
        $this->imdb_rating = $imdb_rating;
    }

    public function getMetacriticRating()
    {
        return $this->metacritic_rating;
    }

    public function setMetacriticRating($metacritic_rating): void
    {
        $this->metacritic_rating = $metacritic_rating;
    }

    public function getRottentomatoesRating()
    {
        return $this->rottentomatoes_rating;
    }

    public function setRottentomatoesRating($rottentomatoes_rating): void
    {
        $this->rottentomatoes_rating = $rottentomatoes_rating;
    }

    public function getWarningIds(): array
    {
        return $this->warning_ids;
    }

    public function setWarningIds(array $warning_ids): void
    {
        $this->warning_ids = $warning_ids;
    }

    public function getMoviePicture()
    {
        return $this->movie_picture;
    }

    public function setMoviePicture($movie_picture): void
    {
        $this->movie_picture = $movie_picture;
    }

    public function getDirectorId()
    {
        return $this->director_id;
    }

    public function setDirectorId($director_id): void
    {
        $this->director_id = $director_id;
    }

    public function getComments(): array
    {
        return $this->comments;
    }

    public function setComments(array $comments): void
    {
        $this->comments = $comments;
    }

}