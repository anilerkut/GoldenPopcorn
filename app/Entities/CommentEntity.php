<?php

namespace App\Entities;
use \CodeIgniter\Entity\Entity;

class CommentEntity extends Entity
{
    protected $comment_content;
    protected $comment_date;
    protected $user_id;
    protected $movie_id;

    public function getCommentContent()
    {
        return $this->comment_content;
    }

    public function setCommentContent($comment_content): void
    {
        $this->comment_content = $comment_content;
    }

    public function getCommentDate()
    {
        return $this->comment_date;
    }

    public function setCommentDate($comment_date): void
    {
        $this->comment_date = $comment_date;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
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