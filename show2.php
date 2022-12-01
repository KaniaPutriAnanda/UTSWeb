<?php 
    require 'konfigurasi.php';
    $result = mysqli_query($db, "SELECT * FROM pesanan");

    if(isset($_GET['search'])){
        $keyword = $_GET['keyword'];
        $query = mysqli_query($db, "SELECT * FROM pesanan where 
        nama LIKE '%$keyword%' OR 
        nohp LIKE '%$keyword%' OR 
        harga LIKE '%$keyword%'");
    }else{
        $query = mysqli_query($db, "SELECT * FROM pesanan");
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
  <link href="style.css?vs" rel="stylesheet">
</head>
<body id='body'>
    <div class="box">
    <table border='1'>
        <tr>
            <th colspan='9'>
                <form action="" method="GET">
                    <td colspan='2'>
                        <div class="search">
                    <input type="text" name="keyword" id="keyword" placeholder='search'>
                    </div>
                    </td>
                    <td>
                        <button type="submit" name="search">
                             <div class='ikon'><i class="bi bi-search"></i></div>
                        </button>
                    </td>
                </form>
            </th>
        </tr>
        <tr>
            <th colspan='12'>--*Order List*--</th>
        </tr>

        <tr>
            <th>ID</th>
            <th>Name of Buyer</th>
            <th>Number Phone</th>
            <th>Category</th>
            <th>Album Version</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Order Date</th>
            <th>Address</th>
            <th>Payment</th>
            <th colspan='2'>action</th>
        </tr>
        <?php 
            $i = 1;
            $kacans = [];
            // while($row = mysqli_fetch_array($result)){

            while($row = mysqli_fetch_assoc($query)){
                $kacans[] = $row;
            
        ?>
        <tr>
            <td><?=$i; ?></td>
            <td><?=$row['nama']?></td>
            <td><?=$row['nohp']?></td>
            <td><?=$row['kategori']?></td>
            <td><?=$row['versi']?></td>
            <td><?=$row['kuantitas']?></td>
            <td><?=$row['harga']?></td>
            <td><?=$row['tanggal']?></td>
            <td><?=$row['alamat']?></td>
            <td><?=$row['pembayaran']?></td>
            <td><a href="edit.php?id=<?=$row['id']?>"> edit </a></+td>
            <td><a href="hapus.php?id=<?=$row['id']?>">hapus</a></td>
        </tr>
            <?php 
             $i++;
                }
            ?>
    </table>
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
          <a class="nav-link " href="logout.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-lock-circle-open text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Logout</span>
          </a>
        </li>

    <script src="kacans.js"></script>

</body>
</html>