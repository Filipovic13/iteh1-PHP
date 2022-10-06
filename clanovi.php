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

<!--dugme za otvaranje modala -->
<div>
     <button class="btn btn-secondary"  data-bs-toggle="modal" data-bs-target="#dodaj-clana-modal">
          Dodaj novog clana
     </button>
</div>


<div class="container" style="margin-top: 7%  align-items-center">
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
                         <button type="button" class="btn btn-primary edit_data" data-bs-toggle="modal" data-bs-target="#izmeni-clana-modal">
                              Izmeni
                         </button>
                    </td>
                    <td>
                         <button type="button" class="btn btn-danger delete_data"  data-bs-toggle="modal" data-bs-target="#brisanje-clana-modal">
                              Obrisi
                         </button>
                    </td>
               </tr>
          <?php 
               endwhile;
               }
          ?>     
          </tbody>
     </table>


<!-- ####################################################################################################################### -->

      <!-- modal za unos novog clana -->
     <div class="modal fade" id="dodaj-clana-modal" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">

          <!-- dialog - white bubble that pops out -->
          <div class="modal-dialog">

               <!-- content inside bubble -->
               <div class="modal-content">
                         
                    <div class="modal-header">
                         <h5 class="modal-title" id="modal-title">Dodavanje novog clana u bazu</h5>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                         <form action="#" method="post" id="formaDodajClana">
                              <div class="form-group">
                                   <label for="modal-name" class="col-form-label">Ime:</label>
                                   <input type="text" class="form-control" name="modal-name">
                              </div>
                              <div class="form-group">
                                   <label for="modal-surname" class="col-form-label">Prezime:</label>
                                   <input type="text" class="form-control" name="modal-surname"></input>
                              </div>
                              <div class="form-group">
                                   <label for="modal-phone" class="col-form-label">Telefon:</label>
                                   <input type="text" class="form-control" name="modal-phone"></input>
                              </div>
                              <div class="form-group">
                                   <label for="modal-email" class="col-form-label">E-mail:</label>
                                   <input type="text" class="form-control" name="modal-email"></input>
                              </div>
                              <div class="form-group">
                                   <label for="modal-adress" class="col-form-label">Adresa:</label>
                                   <input type="text" class="form-control" name="modal-adress"></input>
                              </div>
                              <div class="form-group">
                                   <button type="submit" class="btn btn-secondary mt-3" id="btnNoviClan">Dodaj</button>
                              </div>
                              
                         </form>
                    </div>

               </div>
          </div>
     </div>

 <!-- ####################################################################################################################### -->

     <!-- modal za izmenu  clana -->
     <div class="modal fade" id="izmeni-clana-modal" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">

          <!-- dialog - white bubble that pops out -->
          <div class="modal-dialog">

               <!-- content inside bubble -->
               <div class="modal-content">
                         
                    <div class="modal-header">
                         <h5 class="modal-title" id="modal-title">Izmena postojeceg clana </h5>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                         <form action="handler/updateClan.php" method="POST" id="formaIzmeniClana">

                              <input type="hidden" name="edit_id" id="edit_id">

                              <div class="form-group">
                                   <label for="update-name" class="col-form-label">Ime:</label>
                                   <input type="text" class="form-control" name="update-name" id="update-name">
                              </div>
                              <div class="form-group">
                                   <label for="update-surname" class="col-form-label">Prezime:</label>
                                   <input type="text" class="form-control" name="update-surname" id="update-surname"></input>
                              </div>
                              <div class="form-group">
                                   <label for="update-phone" class="col-form-label">Telefon:</label>
                                   <input type="text" class="form-control" name="update-phone" id="update-phone"></input>
                              </div>
                              <div class="form-group">
                                   <label for="update-email" class="col-form-label">E-mail:</label>
                                   <input type="text" class="form-control" name="update-email" id="update-email"></input>
                              </div>
                              <div class="form-group">
                                   <label for="update-adress" class="col-form-label">Adresa:</label>
                                   <input type="text" class="form-control" name="update-adress" id="update-adress"></input>
                              </div>
                              <div class="form-group">
                                   <button type="submit" class="btn btn-secondary mt-3" name="btnIzmeniClana" id="btnIzmeniClana">Update</button>
                              </div>
                              
                         </form>
                    </div>

               </div>
          </div>
     </div>

     
 <!-- ####################################################################################################################### -->

     <!-- modal za brisanje  clana -->
     <div class="modal fade" id="brisanje-clana-modal" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">

          <!-- dialog - white bubble that pops out -->
          <div class="modal-dialog">

               <!-- content inside bubble -->
               <div class="modal-content">
                         
                    <div class="modal-header">
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="handler/deleteClan.php" method="POST">
                         <div class="modal-body">
                              <input type="hidden" name="delete_id" id="delete_id">
                              <h5>Da li ste sigunrni da obriste ovog clana? </h5>
                              
                         </div>

                         <div class="modal-footer">
                              <button type="submit" class="btn btn-secondary" name="btnObrisiClana">Da, obrisi</button>
                         </div>

                    </form>

            
               </div>
          </div>
     </div>

</div>












<?php include 'inc/footer.php'; ?>