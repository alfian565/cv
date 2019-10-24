<?php 
include 'config.php';
$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$telp=$_POST['telp'];

mysqli_query($koneksi, "insert into supplier values('','$nama','$alamat','$telp')");
header("location:tambah_suplier.php");

 ?>