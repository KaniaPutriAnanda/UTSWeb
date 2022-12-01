<?php
    require 'konfigurasi.php';
    if(isset($_POST['kirim'])){
        $nama = $_POST['nama'];
        $kategori = $_POST['kategori'];
        $tanggal = $_POST['tanggal'];
        $harga = $_POST['harga'];

        $gambar = $_FILES['gambar']['name'];
        $x = explode('.',$gambar);
        $ekstensi = strtolower(end($x));
        $gambar_baru = "$nama.$ekstensi";

        $tmp = $_FILES['gambar']['tmp_name'];
        
        if(move_uploaded_file($tmp, "gambar/".$gambar_baru)){
            $query = "INSERT INTO barang
            VALUES ('', '$nama', '$kategori', '$tanggal', '$harga', '$gambar_baru')";

            $result = $db->query($query);

            if($result){
                header("Location:input.php");
            }else{
                echo "gagal kirim";
            }  
        }
        else {
            echo "GAGAL";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="nucleo-icons.css" rel="stylesheet" />
  <link href="nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="nucleo-svg.css?v2" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="argon-dashboard.css?v=2.0.4" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
  <link href="style.css?v2" rel="stylesheet">
</head>

<body id="body">
    <div><h1 class="teks3">Menambahkan Produk</h1></div>
    <div class="kotak4">
      <form action="" method="POST"  enctype="multipart/form-data">
            <!-- <label for=""">ID Produk: </label> 
            <input type="text" name="id"> <br> -->

            <label for="">Nama Produk: </label>
            <input type="text" name="nama"> <br>

            <label for="">Kategori: </label>
            <select name="kategori" id="">
                <option value="pc">Photo Card</option>
                <option value="ls">Light Stick</option>
                <option value="album">Album</option>
            </select> <br>
            
            <label for="">TanggaL Rilis: </label>
            <input type="date" name="tanggal"><br>
            
            <label for="">Harga: </label>
            <input type="number" min="50000" max="1000000000000" name="harga"><br>

            <label for="">Gambar Produk: </label>
            <input type="file" name="gambar"> <br>

            <button type="submit" name="kirim" id="button1" class="btn btn-primary deep-purple btn-block ">Tambahkan</button>
            
        </form>
    </div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-7 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="admin.php" target="_blank">
        <div class="teks2"><p>Kananda - Admin</p></div>
      </a>
    </div>

    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="admin.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link " href="input.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-bag-17 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Tambah Produk</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link " href="lihat.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-album-2 text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Rincian Produk</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link " href="show2.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-bulb-61 text-danger text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Pesanan</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link " href="index.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-lock-circle-open text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Logout</span>
          </a>
        </li>