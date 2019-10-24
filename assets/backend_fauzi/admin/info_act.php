<?php 
include 'config.php';
$bukuk=$_POST['penerbit_kode'];
$katek=$_POST['penerbit_nama'];
$penek=$_POST['penerbit_alamat'];
$judul=$_POST['penerbit_telp'];
mysqli_query($koneksi,"insert into penerbit values('$bukuk','$katek','$penek','$judul')");
header("location:penerbit.php");

 ?>