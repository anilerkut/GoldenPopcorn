<?php

namespace App\Entities;
use \CodeIgniter\Entity\Entity;

class ActorEntity extends Entity
{
    protected $actor_firstname;
    protected $actor_lastname;
    protected $actor_birthdate;
    protected $actor_gender;

    public function getActorFirstname()
    {
        return $this->actor_firstname;
    }

    public function setActorFirstname($actor_firstname): void
    {
        $this->actor_firstname = $actor_firstname;
    }

    public function getActorLastname()
    {
        return $this->actor_lastname;
    }

    public function setActorLastname($actor_lastname): void
    {
        $this->actor_lastname = $actor_lastname;
    }


    public function getActorBirthdate()
    {
        return $this->actor_birthdate;
    }

    public function setActorBirthdate($actor_birthdate): void
    {
        $this->actor_birthdate = $actor_birthdate;
    }

    public function getActorGender()
    {
        return $this->actor_gender;
    }

    public function setActorGender($actor_gender): void
    {
        $this->actor_gender = $actor_gender;
    }

}