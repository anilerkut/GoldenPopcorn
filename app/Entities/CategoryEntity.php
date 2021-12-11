<?php

namespace App\Entities;
use \CodeIgniter\Entity\Entity;

class CategoryEntity extends Entity
{
    protected $category_name;

    public function getCategoryName()
    {
        return $this->category_name;
    }

    public function setCategoryName($category_name): void
    {
        $this->category_name = $category_name;
    }

}