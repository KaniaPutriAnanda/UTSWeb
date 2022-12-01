<?php 
    require 'konfigurasi.php';
    $result = mysqli_query($db, "SELECT * FROM barang");

    if(isset($_GET['search'])){
        $keyword = $_GET['keyword'];
        $query = mysqli_query($db, "SELECT * FROM barang where 
        nama LIKE '%$keyword%' OR 
        harga LIKE '%$keyword%'");
    }else{
        $query = mysqli_query($db, "SELECT * FROM barang");
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
  <link href="all.css" rel="stylesheet">
</head>

<body id="body">
    <div class="box">
    <table>
    <tr>
      <th colspan='5'>
            <form action="" method="GET">
                  <td colspan='2'>
                        <div class="search">
                    <input type="text" name="keyword" id="keyword" placeholder='search'>
                    </div>
                    </td>
                    <td>
                        <button type="submit" name="search" class="tombol">
                             <div class='ikon'><i class="bi bi-search"></i></div>
                        </button>
                    </td>
                </form>
            </th>
        </tr>
        <tr>
            <th>no</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Tanggal Rilis</th>
            <th>Harga</th>
            <th>Photo</th>
            <th colspan='2'>action</th>
        </tr>
        <?php 
            $i = 1;
            $barang = [];
            // while($row = mysqli_fetch_array($result)){

            while($row = mysqli_fetch_assoc($query)){
                $barang[] = $row;
            
        ?>
        <tr>
            <td><?=$i?></td>
            <td><?=$row['nama']?></td>
            <td><?=$row['kategori']?></td>
            <td><?=$row['tanggal']?></td>
            <td><?=$row['harga']?></td>
            <td><img src="gambar/<?=$row['gambar']?>" alt="" width="100px"></td>
            <td><a href="edit.php?id=<?=$row['id']?>"> edit </a></+td>
            <td><a href="hapus.php?id=<?=$row['id']?>">hapus</a></td>
        </tr>
            <?php
                $i++; }
            ?>
    </table>
    </div>