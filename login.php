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

<body class="container">
     <main>
          <div class="container d-flex flex-column align-items-center">
               <img src="/iteh/domaci1/img/KMG.png"  width="200" class="mt-4  mb-3 ">
               <h2>Welcome</h2>

               <form method="POST" class="mt-4 w-50   border rounded p-5"  action="./clanovi.php">
                    <div class="mb-3">
                         <label for="username" class="form-label">Username</label>
                         <input type="text" class="form-control">
                    </div>

                    <div class="mb-3">
                         <label for="password" class="form-label">Password</label>
                         <input type="password" class="form-control">
                    </div>

                    <div class="text-center  mb-3" >
                         <button type="submit" name="Login" class="btn w-25 btn-backgr" > Next </button>
                    </div>
               </form>

               
          </div>
          
     </main>
</body>















<?php include 'inc/footer.php'; ?>