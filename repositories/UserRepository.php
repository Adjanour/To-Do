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
        $query = "SELECT * FROM tblUsers WHERE usrName = ?";
        $statement = $this->connection->prepare($query);
        $statement->bind_param('s', $username);
        $statement->execute();
        $result = $statement->get_result();
        return $result->fetch_assoc();
    }
    public function getUserById($id){
        try{
        $query = "SELECT * FROM tblUsers WHERE usrIdpk = ?";
        $statement = $this->connection->prepare($query);
        $statement->bind_param('s', $id);
        $statement->execute();
        $result = $statement->get_result();
        return $result->fetch_assoc();
        }catch (Exception $e){
            echo $e;
        }
    }

    public function addUser(User $user, $password){
        $hased_password = password_hash($password,PASSWORD_DEFAULT);
        $query = "INSERT INTO tblUsers (usrName, usrFirstName, usrLastName, usrOtherName, usrEmailAddress, usrPassword) VALUES (?, ?, ?, ?, ?, ?)";
        $statement = $this->connection->prepare($query);
        $statement->bind_param('ssssss', $user->getUsername(), $user->getFirstName(), $user->getLastName(), $user->getOtherName(), $user->getEmail(), $hased_password);
        $statement->execute();
        return $statement->insert_id;
    }
    public function setPassword($password) {
        
    }

    public function verifyPassword($password) {
        
    }

    public function setUserLogedInDate($userId) {
        $currentDateTime = date('Y-m-d H:i:s');
        $query = "UPDATE tblUsers SET usrLastLoginDate='$currentDateTime' WHERE usrIdpk = ?";
        $statement = $this->connection->prepare($query);
        $statement->bind_param('i', $userId);
        $statement->execute();
    }
}
