<?php 

include 'config.php';
$kode=$_POST['kode_jenis'];
$nama=$_POST['namaJenis'];

mysqli_query($koneksi, "insert into tbljenis values('$kode','$nama')")or die(mysqli_error());
header("location:jenis_barang.php");

?>