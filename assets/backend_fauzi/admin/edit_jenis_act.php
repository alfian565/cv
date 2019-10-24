<?php 

include 'config.php';
$kode=$_POST['kode_jenis'];
$nama=$_POST['nama_jenis'];

mysqli_query($koneksi, "update tbljenis set KodeJenis='$kode', Jenis='$nama' where KodeJenis='$kode'");
header("location:jenis_barang.php");


?>