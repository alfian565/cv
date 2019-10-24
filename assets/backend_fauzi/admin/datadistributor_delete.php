<?php 
include 'config.php';
$id=$_GET['id_distributor'];
mysqli_query($koneksi, "delete from tbldistributor where IDDistributor='$id'");
header("location:data_distributor.php");

?>