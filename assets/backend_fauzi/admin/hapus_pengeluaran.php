<?php 
include 'config.php';
$id=$_GET['id'];
mysqli_query($koneksi, "delete from pengeluaran where id ='$id'");
header("location:pengeluaran.php");

 ?>