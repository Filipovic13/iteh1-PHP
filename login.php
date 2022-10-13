<?php 
     require 'dbBroker.php';
     require 'model/user.php';

     session_start();
     if(isset($_POST["username"]) && isset($_POST["password"])){

          $uname = $_POST["username"];
          $upass = $_POST["password"];

          $korisnik = new User(1, $uname, $upass);

          $response = $korisnik->logInUser($uname, $upass, $conn);
          

          if($response->num_rows==1){
          
               $_SESSION["user_id"] = $korisnik->id;
               header('Location: clanovi.php');
               exit();
          }else{
               echo "<script>console.log('ne moze');</script>";
          }
     }


?>




<!DOCTYPE html>
<html lang="en">
     <head>
          <meta charset="UTF-8" />
          <meta http-equiv="X-UA-Compatible" content="IE=edge" />
          <meta
               name="viewport"
               content="width=device-width, initial-scale=1.0"
          />
          <link
               rel="stylesheet"
               href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
               integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
               crossorigin="anonymous"
          />
          <link rel="stylesheet" href="./css/style.css">
          <title>Home page</title>
     </head>

<body class="container mb-5" style="background-color:white ;">
     <main>
          <div class="container d-flex flex-column align-items-center">
               <img src="/iteh/domaci1/img/logoCrnaSLova.png"  width="200" class="mt-4  mb-3 ">
               <h2>Welcome</h2>
               <h1><p id="paragraf-ime"></p></h1>

               <form method="POST" class="mt-4 w-50   border rounded p-5"  style="background-color: #e17f26;">
                     <div class="mb-3">
                         <label for="name" class="form-label">Name</label>
                         <input type="text" name="ime-input" id="ime-input" class="form-control" autocomplete="off" >
                        
                    </div>

                    <div class="mb-3">
                         <label for="username" class="form-label">Username</label>
                         <input type="text" name="username" class="form-control" required autocomplete="off">
               
                    </div>

                    <div class="mb-3">
                         <label for="password" class="form-label">Password</label>
                         <input type="password" name="password" class="form-control" required autocomplete="off">
                    
                    </div>

                    <div class="text-center  mb-3" >
                         <button type="submit" name="Login" class="btn btn-light w-25 btn-backgr" > Next </button>
                    </div>
               </form>

               
          </div>
          
     </main>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>















<?php include 'inc/footer.php'; ?>