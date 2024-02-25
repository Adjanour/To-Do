<?php

class User {
    private $id;
    private $userName;
    private $otherName;
    private $firstName;
    private $lastName;
    private $email;
    

    public function __construct($username,$firstName,$lastName,$email,$otherName=null) {
        $this->userName = $username;
        $this->email = $email;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->otherName = $otherName;
    }

    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->userName;
    }

    public function getFirstName(){
        return $this->firstName;
    }

    public function getLastName(){
        return $this->lastName;
    }
    
    public function getOtherName(){
        return $this->otherName;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getFullName(){
        return trim($this->firstName).trim($this->otherName).trim($this->lastName);
    }


    
}