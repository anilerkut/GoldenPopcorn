<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class PictureEntity extends Entity
{
    protected $picture_link;
    protected $movie_id;

    public function getPictureLink()
    {
        return $this->picture_link;
    }

    public function setPictureLink($picture_link): void
    {
        $this->picture_link = $picture_link;
    }

    public function getMovieId()
    {
        return $this->movie_id;
    }

    public function setMovieId($movie_id): void
    {
        $this->movie_id = $movie_id;
    }
}