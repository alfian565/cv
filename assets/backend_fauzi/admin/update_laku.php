<?php 
include 'config.php';
$id=$_POST['id'];
$nama=$_POST['nama'];
$tanggal=$_POST['tgl'];
$harga=$_POST['harga'];
$jumlah=$_POST['jumlah'];
$total_harga= $harga * $jumlah;
$laba=$_POST['laba'];

mysqli_query($koneksi, "update barang_laku set nama='$nama', tanggal='$tanggal', jumlah='$jumlah', harga='$harga', total_harga='$total_harga', laba='$laba' where id='$id'");
header("location:barang_laku.php");

?>