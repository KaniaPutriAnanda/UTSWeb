<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-login.css?vk">
    <title>Login</title>
</head>
<body>
    
<div class="container" id="container">
	<div class="box login">
		<form action="" method="post">
           
			<input type="text" name="user" placeholder="email or username" class="input" required autocomplete="off">
			<input type="password" name="password" placeholder="password" class="input" required autocomplete="off">
			<input type="submit" name="login" value="Login" class="submit"><br><br>
		</form>
	</div>
    <div class="box register">
            <form action="" method="post">
            
                <input type="email" name="email" class="input" placeholder="email" required autocomplete="off">
                <input type="text" name="username" class="input" placeholder="username" required autocomplete="off">
                <input type="password" name="password" class="input" placeholder="Password" required autocomplete="off">
                <input type="password" name="konfirmasi" class="input" placeholder="Confirm password" required autocomplete="off">

                <input type="submit" name="registrasi" class="submit" value="Submit"><br><br>
            </form>
	</div>
	<div class="box-geser">
		<div class="geser">
			<div class="geser2 kiri">
				<h1>Welcome to Kacansg</h1>
				<p>You are a great person so let's be friends with Kacansg!!</p>
				<button class="button" id="log">Login</button>
			</div>
			<div class="geser2 kanan">
				<h1>Welcome to Kacansg</h1>
				<p>Hello Fwends!! Please login by entering your username or email and password</p>
				<button class="button" id="regis">Register</button>
			</div>
		</div>
	</div>
</div>
<script src="main.js"></script>
</body>
</html>
<?php
    session_start();
    require 'konfigurasi.php';

    if(isset($_POST['login'])){
        $user = $_POST['user'];
        $password = $_POST['password'];
        $admin = $_POST['user'];
        $pass_admin = $_POST['password'];

        $sql = "SELECT * FROM akun WHERE username = '$user' OR email = '$user'";
        $result= $db->query($sql);

        // cek akun ada atau tidak ada
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_array($result);
            $username = $row['username'];
            $user_admin = $row['username'];

            // cek kevalidan password
            if($admin == 'admin' AND $pass_admin == 'admin'){

                $_SESSION['login'] = $user_admin;
                
                echo "<script>
                        alert('Selamat Datang $user_admin');
                        document.location.href = 'admin.php';
                    </script>";
            }
            else if(password_verify($password, $row['psw'])){

                $_SESSION['login'] = $username;
                
                echo "<script>
                        alert('Selamat Datang $username');
                        document.location.href = 'user.php';
                    </script>";
            }else{
                echo "<script>
                        alert('Username & Password Salah!');
                    </script>";

            }
        }else{
            echo "<script>
                    alert('Username & Password Tidak Terdaftar, Silahkan Registrasi!');
                 </script>";
        }
    }

    if(isset($_POST['registrasi'])){
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $konfirmasi = $_POST['konfirmasi'];

        // Cek Username Udah Digunakan atau Belum
        $sql = "SELECT * FROM akun WHERE username = '$username'";
        $user = $db->query($sql);
        if(mysqli_num_rows($user) > 0){
            echo "<script>
                    alert('Username telah digunakan, Silahkan gunakan Username lain')
                </script>";
        }else {
            // cek konfirmasi password
            if($password == $konfirmasi){
                $password = password_hash($password, PASSWORD_DEFAULT);
                $query = "INSERT INTO akun (email, username, psw)
                VALUES ('$email', '$username', '$password')";

                $result = $db->query($query);

                if ($result){
                    echo "<script>
                            alert('Registrasi Berhasil');
                            document.location.href = 'user.php';
                        </script>";
                } else {
                    echo "<script>
                             alert('Registrasi Gagal');
                        </script>";
                }
            }else{
                echo "<script>
                        alert('Konfirmasi Password Salah');
                    </script>";
            }
        }
    }

?>