<?php 

require "../dbBroker.php";
require '../model/clan.php';


if(isset($_POST['btnIzmeniClana']) ){

   
    $name = $_POST['update-name'];
    $surname = $_POST['update-surname'];
    $phone = $_POST['update-phone'];
    $email = $_POST['update-email'];
    $adress = $_POST['update-adress'];
    $clan_id=$_POST['edit_id'];

    $result=Clan::izmeniClana($name, $surname, $phone, $email, $adress, $clan_id, $conn);

    if($result){
        echo "<script> alert('Podaci izmenjeni'); </script>";
        header("Location: ../clanovi.php");

    }else{
        echo "<script> alert('fail'); </script>";
        header("Location: ../clanovi.php");
    }

}

?>