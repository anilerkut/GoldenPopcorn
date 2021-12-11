<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class LanguageEntity extends Entity
{
    protected $language_name;

    public function getLanguageName()
    {
        return $this->language_name;
    }

    public function setLanguageName($language_name): void
    {
        $this->language_name = $language_name;
    }

}