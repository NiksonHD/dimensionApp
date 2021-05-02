<?php

namespace App\Data;

class UserDTO {

    private $id;
    private $username;
    private $password;
   

    public static function create(
            $username, $password, $firstName, $lastName, $bornOn,$id = null) {
        return (new UserDTO())
                ->setUsername($username)
                ->setPassword($password)
                
                ->setId($id);
    }

    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getBornOn() {
        return $this->bornOn;
    }

    public function setId($id): UserDTO {
        $this->id = $id;
        return $this;
    }

    public function setUsername($username): UserDTO {
        $this->username = $username;
        return $this;
    }

    public function setPassword($password): UserDTO {
        $this->password = $password;
        return $this;
    }

    public function setFirstName($firstName): UserDTO {
        $this->firstName = $firstName;
        return $this;
    }

    public function setLastName($lastName): UserDTO {
        $this->lastName = $lastName;
        return $this;
    }

    public function setBornOn($bornOn): UserDTO {
        $this->bornOn = $bornOn;
        return $this;
    }

}
