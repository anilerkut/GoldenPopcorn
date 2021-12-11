<?php

namespace App\Entities;
use \CodeIgniter\Entity\Entity;

class GenderEntity extends Entity
{
    protected $gender_name;

    public function getGenderName()
    {
        return $this->gender_name;
    }

    public function setGenderName($gender_name): void
    {
        $this->gender_name = $gender_name;
    }

}