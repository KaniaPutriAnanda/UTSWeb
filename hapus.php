<?php 

require 'konfigurasi.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $result = mysqli_query($db, 
        "DELETE FROM barang WHERE id='$id'");

    if($result){
        header("Location:lihat.php");
    }
}
?>