<?php 
include 'config.php';
$id_ptg=$_GET['IDPetugas'];
mysqli_query($koneksi, "delete from tblpetugas where IDPetugas='$id_ptg'");
header("location:tambah_petugas.php");

?>