<?php 

require "../dbBroker.php";
require '../model/clan.php';


if(isset($_POST['modal-name']) && isset($_POST['modal-surname']) && isset($_POST['modal-phone']) && isset($_POST['modal-email'])&& isset($_POST['modal-adress'])){
    
    $novi_clan = new Clan(null, $_POST['modal-name'], $_POST['modal-surname'] , $_POST['modal-phone'], $_POST['modal-email'], $_POST['modal-adress']);
    $status = Clan::dodajClana($novi_clan, $conn);
    

    if ($status){
        echo "kreiran";
    }else{
        echo $status;
        echo 'nije kreiran';
    }
}

?>