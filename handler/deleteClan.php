<?php 

require "../dbBroker.php";
require '../model/clan.php';


if(isset($_POST['btnObrisiClana']) ){

    $clan_id=$_POST['delete_id'];

    $result=Clan::obrisiClana($clan_id, $conn);

    if($result){
        echo "<script> alert('Clan obrisan'); </script>";
        header("Location: ../clanovi.php");

    }else{
        echo "<script> alert('fail'); </script>";
        header("Location: ../clanovi.php");
    }
   
    

}

?>