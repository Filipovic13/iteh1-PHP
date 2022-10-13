<?php 

require '../dbBroker.php';
require '../model/polaganje.php';


if(isset($_POST['modal-nivo']) && isset($_POST['modal-datum']) && isset($_POST['modal-za-nivo']) && isset($_POST['modal-polozio']) && isset($_POST['modal-id-clana']) ){

    $novo_polaganje = new Polaganje(null, $_POST['modal-nivo'], $_POST['modal-datum'], $_POST['modal-za-nivo'], $_POST['modal-polozio'], $_POST['modal-id-clana']);
    $status = Polaganje::dodajPolaganje($novo_polaganje, $conn);

    if($status){
        echo "dodato";
    }else{
        echo $status;
        echo "neuspeno dodavanje novog polaganja";
    }
}


?>