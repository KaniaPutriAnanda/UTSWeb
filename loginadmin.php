<?php
   if(isset($_POST['login'])) {
      $admin = $_POST['email'];
      $pass_admin = $_POST['password'];

      if ($admin == 'kananda@gmail.com' AND $pass_admin == '098') {
         header("Location: admin.php");
      } 
      
      else {
         header("wrong_login.php");
      }
   }

?>



<!DOCTYPE html>
<html lang="en">

<head>
   <title>Login</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   <link href="https://fonts.googleapis.com/css?family=Nunito:600,700,900" rel="stylesheet">
   <link href="style.css" rel="stylesheet">

</head>

<body id="body">
   <div class="logo">
            <a href="#"><h3>Kacansg</h3></a>
            </div>
   <div id="login-card" class="card">
      <div class="card-body">
         <h2 class="text-center">Sign In as Admin</h2>
         <br>
         <form action="" method="POST">
            <div class="form-group">
               <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>

            <div class="form-group">
               <input type="password" class="form-control" id="email" placeholder="Enter password" name="password">
            </div>

            <button type="submit" name="login" id="button" class="btn btn-primary deep-purple btn-block ">Submit</button>
            <br><br>

            <div class="cute1"><img class="cute" src="https://i.pinimg.com/564x/62/0b/b8/620bb803ef01c61631f95cc86c45e4d5.jpg" alt="" width="80px"></div>

         </form>
      </div>
      <div>