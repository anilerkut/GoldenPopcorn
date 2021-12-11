<?php

namespace App\Entities;
use \CodeIgniter\Entity\Entity;

class UserEntity extends Entity
{
    protected $user_firstname;
    protected $user_lastname;
    protected $user_birthdate;
    protected $user_email;
    protected $user_password;
    protected $user_gender;
    protected $created_at;
    protected $updated_at;

    protected $dates = ['created_at', 'updated_at'];

    public function getUserFirstname()
    {
        return $this->user_firstname;
    }

    public function setUserFirstname($user_firstname): void
    {
        $this->user_firstname = $user_firstname;
    }

    public function getUserLastname()
    {
        return $this->user_lastname;
    }

    public function setUserLastname($user_lastname): void
    {
        $this->user_lastname = $user_lastname;
    }

    public function getUserBirthdate()
    {
        return $this->user_birthdate;
    }

    public function setUserBirthdate($user_birthdate): void
    {
        $this->user_birthdate = $user_birthdate;
    }

    public function getUserEmail()
    {
        return $this->user_email;
    }

    public function setUserEmail($user_email): void
    {
        $this->user_email = $user_email;
    }

    public function getUserPassword()
    {
        return $this->user_password;
    }

    public function setUserPassword($user_password): void
    {
        $this->user_password = $user_password;
    }

    public function getUserGender()
    {
        return $this->user_gender;
    }

    public function setUserGender($user_gender): void
    {
        $this->user_gender = $user_gender;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($created_at): void
    {
        $this->created_at = $created_at;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function setUpdatedAt($updated_at): void
    {
        $this->updated_at = $updated_at;
    }

    public function getDates(): array
    {
        return $this->dates;
    }

    public function setDates(array $dates): void
    {
        $this->dates = $dates;
    }

}