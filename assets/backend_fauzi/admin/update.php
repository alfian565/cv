<?php 
include 'config.php';
$kode_brg=$_POST['biodata_id'];
$nama_brg=$_POST['name'];
$kode_jenis=$_POST['place'];
$harga_net=$_POST['date'];
$harga_jual=$_POST['address'];
$stok=$_POST['moto'];
$stoka=$_POST['email'];
$stokb=$_POST['location'];
$stokc=$_POST['phone'];
$stokd=$_POST['religion'];
$stoke=$_POST['resume'];
$stokf=$_POST['sex'];

mysqli_query($koneksi, "update biodata set biodata_id='$kode_brg', name='$nama_brg', place='$kode_jenis', date='$harga_net', address='$harga_jual', moto='$stok' ,email='$stoka' ,location='$stokb',phone='$stokc' , religion='$stokd' ,resume='$stoke' ,sex='$stokf' where biodata_id='$kode_brg'");
header("location:biodata.php");

?>