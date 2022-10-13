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

<div class="container" style="margin-top: 9.5%">
     <table class="table table-hover">
          <thead class="thead">
               <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nivo</th>
                    <th scope="col">Datum polaganja</th>
                    <th scope="col">Polaganje za nivo</th>
                    <th scope="col">Polozeno</th>
                    <th scope="col">ID Clana</th>
                    <th scope="col">Ime</th>
                    <th scope="col">Prezime</th>
                    <th></th>
               </tr>
          </thead>
          <tbody>
          <?php 
               while($red_polaganja=$response->fetch_array()):
          ?>     

               <tr>
                    <td> <?php echo $red_polaganja["id"] ?> </td>
                    <td> <?php echo $red_polaganja["nivo"] ?> </td>
                    <td> <?php echo $red_polaganja["datum"] ?> </td>
                    <td> <?php echo $red_polaganja["za_nivo"] ?> </td>
                    <td> <?php echo $red_polaganja["polozio"] ?> </td>
                    <td> <?php echo $red_polaganja["id_clana"] ?> </td>
                    <td> <?php echo $red_polaganja["ime"] ?> </td>
                    <td> <?php echo $red_polaganja["prezime"] ?> </td>
                    <td>
                         <button class="btn btn-outline-secondary edit_polaganje" data-bs-toggle="modal" data-bs-target="#izmeni-polaganje-modal">
                             Azuriraj
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
        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#dodaj-polaganje-modal">
            Dodaj novo polaganje
        </button>
     </div>
    




     <!-- ####################################################################################################################### -->

     <!-- modal za unos novog polaganja -->
     <div class="modal fade" id="dodaj-polaganje-modal" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">

          <!-- dialog - white bubble that pops out -->
          <div class="modal-dialog">

               <!-- content inside bubble -->
               <div class="modal-content">
                         
                    <div class="modal-header">
                         <h5 class="modal-title" id="modal-title">Dodavanje novog polaganja u bazu</h5>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                         <form action="#" method="post" id="formaDodajPolaganje">
                              <div class="form-group">
                                   <label for="modal-nivo" class="col-form-label">Trenutni nivo clana: </label>
                                   <input type="text" class="form-control" name="modal-nivo">
                              </div>
                              <div class="form-group">
                                   <label for="modal-datum" class="col-form-label">Datum polganja: </label>
                                   <input type="date" class="form-control" name="modal-datum"></input>
                              </div>
                              <div class="form-group">
                                   <label for="modal-za-nivo" class="col-form-label">Nivo za koji polaze clan:</label>
                                   <input type="text" class="form-control" name="modal-za-nivo"></input>
                              </div>
                              <div class="form-group">
                                   <label for="modal-polozio" class="col-form-label">Da li je polozeno polaganje? (Da/Ne):</label>
                                   <input type="text" class="form-control" name="modal-polozio"></input>
                              </div>
                              <div class="form-group">
                                   <label for="modal-id-clana" class="col-form-label">Id clana: </label>
                                   <input type="text" class="form-control" name="modal-id-clana"></input>
                              </div>
                              <div class="form-group">
                                   <button type="submit" class="btn btn-secondary mt-3" id="btnNovoPolaganje">Dodaj</button>
                              </div>
                              
                         </form>
                    </div>

               </div>
          </div>
     </div>

     
 <!-- ####################################################################################################################### -->

     <!-- modal za izmenu  polaganja -->
     <div class="modal fade" id="izmeni-polaganje-modal" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">

          <!-- dialog - white bubble that pops out -->
          <div class="modal-dialog">

               <!-- content inside bubble -->
               <div class="modal-content">
                         
                    <div class="modal-header">
                         <h5 class="modal-title" id="modal-title">Izmena polaganja </h5>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                         <form action="handler/updatePolaganje.php" method="POST" id="formaIzmeniPolaganje">

                              <input type="hidden" name="edit_id_p" id="edit_id_p">

                              <div class="form-group">
                                   <label for="update-nivo" class="col-form-label">Nivo:</label>
                                   <input type="text" class="form-control" name="update-nivo" id="update-nivo">
                              </div>
                              <div class="form-group">
                                   <label for="update-datum" class="col-form-label">Datum:</label>
                                   <input type="date" class="form-control" name="update-datum" id="update-datum"></input>
                              </div>
                              <div class="form-group">
                                   <label for="update-za-nivo" class="col-form-label">Polaganje za nivo:</label>
                                   <input type="text" class="form-control" name="update-za-nivo" id="update-za-nivo"></input>
                              </div>
                              <div class="form-group">
                                   <label for="update-polozio" class="col-form-label">Polozio:</label>
                                   <input type="text" class="form-control" name="update-polozio" id="update-polozio"></input>
                              </div>
                              <div class="form-group">
                                   <label for="update-id-clana" class="col-form-label">Id clana:</label>
                                   <input type="text" class="form-control" name="update-id-clana" id="update-id-clana"></input>
                              </div>
                              <div class="form-group">
                                   <button type="submit" class="btn btn-secondary mt-3" name="btnIzmeniPolaganje" id="btnIzmeniPolaganje">Update</button>
                              </div>
                              
                         </form>
                    </div>

               </div>
          </div>
     </div>




</div>





<?php include 'inc/footer.php'; ?>