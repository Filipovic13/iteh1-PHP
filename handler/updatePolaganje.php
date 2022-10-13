<?php

require '../dbBroker.php';
require '../model/polaganje.php';


if(isset($_POST['btnIzmeniPolaganje']) ){


    $nivo = $_POST['update-nivo'];
    $datum = $_POST['update-datum'];
    $za_nivo = $_POST['update-za-nivo'];
    $polozio = $_POST['update-polozio'];
    $id_clana = $_POST['update-id-clana'];
    $id = $_POST['edit_id_p'];

    $result = Polaganje::izmeniPolaganje($nivo, $datum, $za_nivo, $polozio, $id_clana, $id, $conn);

    if($result){
        echo "<script> alert('Podaci izmenjeni'); </script>";
        header("Location: ../polaganja.php");

    }else{
        echo "<script> alert('fail'); </script>";
        header("Location: ../polaganja.php");
    }


}



?>