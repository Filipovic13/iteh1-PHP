<?php 

$host='localhost';
$db='iteh1';
$user='root';
$pass='';

$conn= new mysqli($host, $user, $pass, $db);

if($conn->connect_errno){
    exit("Greska prilikom konekcije: ". $conn->connect_error."Error no: ". $conn->connect_errno );
}

?>