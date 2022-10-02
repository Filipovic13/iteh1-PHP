<?php include 'inc/header.php'; ?>

<?php

     require 'dbBroker.php';
     require 'model/polaganje.php';

     session_start();
     if(!isset($_SESSION["user_id"])){
          header('Location:login.php');
          exit();
     }


     $response = Polaganje::getAll($conn);

     if(!$response){
          echo "Greska prilikom konekcije sa bazom";
          die();
     }

     if($response->num_rows==0){
          echo "Nema podataka u tabeli polaganja";
          die();
     }else{

     

 ?>

<div class="container" style="margin-top: 7%">
     <table class="table table-hover table-striped">
          <thead class="thead">
               <tr>
                    <th scope="col">Nivo</th>
                    <th scope="col">Datum polaganja</th>
                    <th scope="col">Polaganje za nivo</th>
                    <th scope="col">Polozeno</th>
                    <th scope="col">ID Clana</th>
                    <th></th>
               </tr>
          </thead>
          <tbody>
          <?php 
               while($red_polaganja=$response->fetch_array()):
          ?>     

               <tr>
                    <td> <?php echo $red_polaganja["nivo"] ?> </td>
                    <td> <?php echo $red_polaganja["datum"] ?> </td>
                    <td> <?php echo $red_polaganja["za_nivo"] ?> </td>
                    <td> <?php echo $red_polaganja["polozio"] ?> </td>
                    <td> <?php echo $red_polaganja["id_clana"] ?> </td>
                    <td>
                         <button class="btn btn-info">
                              <a href="" class="text-light">Update</a>
                         </button>
                    </td>
               </tr>

          <?php 
               endwhile;
               }
          ?>     
          </tbody>
     </table>


     <div class="text-center">
        <button class="btn btn-info ">
            <a href="" class="text-light">Dodaj novo polaganje</a>
        </button>
     </div>
    
</div>












<?php include 'inc/footer.php'; ?>