<?php

namespace App\Entities;
use \CodeIgniter\Entity\Entity;

class NewsEntity extends Entity
{
    protected $news_content;
    protected $news_date;
    protected $actor_id;
    protected $director_id;

    public function getNewsContent()
    {
        return $this->news_content;
    }

    public function setNewsContent($news_content): void
    {
        $this->news_content = $news_content;
    }

    public function getNewsDate()
    {
        return $this->news_date;
    }

    public function setNewsDate($news_date): void
    {
        $this->news_date = $news_date;
    }

    public function getActorId()
    {
        return $this->actor_id;
    }

    public function setActorId($actor_id): void
    {
        $this->actor_id = $actor_id;
    }

    public function getDirectorId()
    {
        return $this->director_id;
    }

    public function setDirectorId($director_id): void
    {
        $this->director_id = $director_id;
    }

}