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

    public function logInUser($uname,$upass, mysqli $conn){

        $query="SELECT * 
                FROM users 
                WHERE username='$uname' AND password='$upass'";
        return $conn->query($query);
        
    }

}




?>