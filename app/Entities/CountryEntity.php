<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class CountryEntity extends Entity
{
    protected $country;

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry($country): void
    {
        $this->country = $country;
    }

}