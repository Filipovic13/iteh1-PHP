<?php 

class User{
    public $id;
    public $username;
    public $password;

    public function __construct($id=null, $username=null, $password=null){

        $this->id=$id;
        $this->username=$username;
        $this->password=$password;

    }

    public function logInUser($username,$password, mysqli $conn){

        $query="SELECT * FROM users WHERE username='$username' and password='$password'";
        return $conn->query($query);
        
    }

}




?>