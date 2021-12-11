<?php

namespace App\Entities;

class DirectorEntity extends \CodeIgniter\Entity\Entity
{
    protected $director_name;
    protected $director_gender;

    public function getDirectorName()
    {
        return $this->director_name;
    }

    public function setDirectorName($director_name): void
    {
        $this->director_name = $director_name;
    }

    public function getDirectorGender()
    {
        return $this->director_gender;
    }

    public function setDirectorGender($director_gender): void
    {
        $this->director_gender = $director_gender;
    }

}