<?php 
include 'config.php';
$penerbit_kode=$_POST['id'];
$penerbit_nama=$_POST['nama'];
$penerbit_alamat=$_POST['icon'];
$penerbit_telp=$_POST['keterangan'];

mysqli_query($koneksi,"insert into skill values('$penerbit_kode','$penerbit_nama','$penerbit_alamat','$penerbit_telp')");
header("location:info.php");

 ?>