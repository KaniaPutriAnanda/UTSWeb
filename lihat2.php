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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
            $i = 1;
            $barang = [];
            // while($row = mysqli_fetch_array($result)){

            while($row = mysqli_fetch_assoc($query)){
                $barang[] = $row;
            
        ?>
        <img src="gambar/<?=$row['gambar']?>" alt="" width="100px"> <br>
        <?=$row['nama']?> <br>
        <?=$row['harga']?> <br>
        <?php
                $i++; }
            ?>
</body>
</html>