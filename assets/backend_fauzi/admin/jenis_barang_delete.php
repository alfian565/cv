<?php 
include 'config.php';
$id=$_GET['kode_jenis'];
mysqli_query($koneksi, "delete from tbljenis where KodeJenis='$id'");
header("location:jenis_barang.php");

?>