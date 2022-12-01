


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
         <h2 class="text-center">Sign In as User</h2>
         <br>
         <form action="" method="POST">
            <div class="form-group">
               <input type="text" class="form-control" id="email" placeholder="Enter Email or Username" name="user">
            </div>                     

            <div class="form-group">
               <input type="password" class="form-control" id="email" placeholder="Enter password" name="password">
            </div>

            <button type="submit" name="login" id="button" class="btn btn-primary deep-purple btn-block ">Login</button>
            <br><br>

            <p>Don't have an account yet?
                <a href="regis.php">Registration</a>
            </p>

            <div class="cute1"><img class="cute" src="https://i.pinimg.com/564x/67/c9/e9/67c9e94a20cb781756a6b7804cb38e26.jpg" alt="" width="80px"></div>

         </form>
      </div>
      <div>

      <?php

session_start();
require 'konfigurasi.php';

if(isset($_POST['login'])){
    $user = $_POST['user'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM akun WHERE username='$user' OR email='$user'";
    $result = $db->query($sql);

    //cek akun ada atau gak
    if(mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_array($result);
        $username = $row['username'];

        //cek passwordnya valid
        if(password_verify($password, $row['psw'])){

            $_SESSION['login'] = $username;

            echo "<script>
                    alert('Selamat Datang $username');
                    document.location.href = 'user.php';
                    </script>";
        }else{
            echo "<script>
                    alert('Username dan Password salah');
                    </script>";
        }
    } else{
        echo "<script>
                    alert('Buat akun terlebih dahulu');
                    </script>";
    }
}

?>