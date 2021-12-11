<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class WarningEntity extends Entity
{
    protected $warning_name;

    public function getWarningName()
    {
        return $this->warning_name;
    }

    public function setWarningName($warning_name): void
    {
        $this->warning_name = $warning_name;
    }

}