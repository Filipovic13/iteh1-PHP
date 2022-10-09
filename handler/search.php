<?php

require "../dbBroker.php";
require '../model/clan.php';
$result;
$output="";

if(isset($_POST['query'])){

    $search = $_POST['query'];
    $result = Clan::search($search, $conn);

    
    if($result->num_rows>0){
        $output="
                    <thead class='thead'>
                            <tr>
                                    <th scope='col'>ID</th>
                                    <th scope='col'>Ime</th>
                                    <th scope='col'>Prezime</th>
                                    <th scope='col'>Kontakt telefon</th>
                                    <th scope='col'>E-mail</th>
                                    <th scope='col'>Adresa</th>
                                    <th scope='col'>Nivo</th>
                                    <th></th>
                                    <th></th>
                            </tr>
                        </thead>
                        <tbody> ";
                        while($red_clan=$result->fetch_array()):
                        $output .="
                        
                        <tr>
                        
                            <td>".$red_clan['id']."</td>
                            <td>".$red_clan['ime']."</td>
                            <td>".$red_clan['prezime']."</td>
                            <td>".$red_clan['telefon']."</td>
                            <td>".$red_clan['email']."</td>
                            <td>".$red_clan['adresa']."</td>
                            <td>".$red_clan["nivo"]."</td>
                            <td>
                                <button type='button' class='btn btn-outline-primary edit_data' data-bs-toggle='modal' data-bs-target='#izmeni-clana-modal'>
                                    Izmeni
                                </button>
                            </td>
                            <td>
                                <button type='button' class='btn btn-outline-danger delete_data'  data-bs-toggle='modal' data-bs-target='#brisanje-clana-modal'>
                                    Obrisi
                                </button>
                            </td>
                        </tr>";
                        
                    endwhile;
                    $output."</tbody>";
                    echo $output;
                        
               
    }else{
        echo "<h3> Nema rezultata</h3>";
    }
   
}

?>