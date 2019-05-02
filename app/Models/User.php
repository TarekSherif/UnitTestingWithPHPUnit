<?php
namespace App\Models;
class User
{

    protected $firstName;
    protected $lastName;
    protected $email;
    

    
    public function setFirstName($firstName):void
    {
        $this->firstName=$firstName;
    }
    public function getFirstName()
    {
      return $this->firstName;
    }
    public function setLastName($lastName):void
    {
        $this->lastName=$lastName;
    }
    public function getLastName()
    {
      return $this->lastName;
    }

    public function setEmail($email):void
    {
        $this->email=$email;
    }
    public function getEmail()
    {
      return $this->email;
    }

  public function exportData()
    {
      return [
            "firstName"=>$this->firstName,
            "lastName"=>$this->lastName,
           "fullName"=>$this->getFullName(),
           "email"=>$this->email,
      ];
    }


    public function getFullName()
    {
      return $this->firstName." ".$this->lastName;
    }

}