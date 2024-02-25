<?php

class UserRepository
{
    protected $connection;

    public function __construct(mysqli $connection)
    {
        $this->connection = $connection;
    }

    public function getUserByUsername($username)
    {
        $query = "SELECT * FROM tblUsers WHERE username = ?";
        $statement = $this->connection->prepare($query);
        $statement->bind_param('s', $username);
        $statement->execute();
        $result = $statement->get_result();
        return $result->fetch_assoc();
    }
    public function getUserById($id){
        $query = "SELECT * FROM tblUsers WHERE usrIdpk = ?";
        $statement = $this->connection->prepare($query);
        $statement->bind_param('s', $id);
        $statement->execute();
        $result = $statement->get_result();
        return $result->fetch_assoc();
    }

    public function addUser(User $user, $password){
        $query = "INSERT INTO tblUsers (usrName, usrFirstName, usrLastName, usrOtherName, usrEmailAddress, usrPassword) VALUES (?, ?, ?, ?, ?, ?)";
        $statement = $this->connection->prepare($query);
        $statement->bind_param('ssssss', $user->getUsername(), $user->getFirstName(), $user->getLastName(), $user->getOtherName(), $user->getEmail(), $password);
        $statement->execute();
        return $statement->insert_id;
    }
    public function setPassword($password) {
        
    }

    public function verifyPassword($password) {
        
    }
}
