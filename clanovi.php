<?php 
     require "dbBroker.php";
     require "model/clan.php";


     session_start();
     if(!isset($_SESSION["user_id"])){
          header('Location:login.php');
          exit();
     }


     $response= Clan::getAll($conn);

     if(!$response){
          echo "Greska prilikom dovlacenja calnova iz tabele";
          die();
     }


     if($response->num_rows==0){
          echo "Nema clanova u tabeli";
          die();
     }
     else{

     
     
?>





<?php include 'inc/header.php'; ?>


<div class="container" style="margin-top: 7%">
     <table class="table table-hover table-striped">
          <thead class="thead">
               <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Ime</th>
                    <th scope="col">Prezime</th>
                    <th scope="col">Kontakt telefon</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Adresa</th>
                    <th scope="col">Nivo</th>
                    <th></th>
               </tr>
          </thead>
          <tbody>
          <?php 
               while($red_clan=$response->fetch_array()):
          ?>
               <tr>
               
                    <td> <?php echo $red_clan["id"] ?> </td>
                    <td> <?php echo $red_clan["ime"] ?> </td>
                    <td> <?php echo $red_clan["prezime"] ?> </td>
                    <td> <?php echo $red_clan["telefon"] ?> </td>
                    <td> <?php echo $red_clan["email"] ?> </td>
                    <td> <?php echo $red_clan["adresa"] ?> </td>
                    <td> <?php echo $red_clan["nivo"] ?> </td>
                    <td>
                         <button class="btn btn-primary">
                              <a href="" class="text-light">Update</a>
                         </button>
                         <button class="btn btn-danger">
                              <a href="" class="text-light">Delete</a>
                         </button>
                    </td>
               </tr>
          <?php 
               endwhile;
               }
          ?>     
          </tbody>
     </table>
</div>












<?php include 'inc/footer.php'; ?>