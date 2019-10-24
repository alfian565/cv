<?php 
include 'config.php';
$id_petugas=$_POST['id_petugas'];
$nama_petugas=$_POST['nama_petugas'];
$alamat=$_POST['alamat'];
$email=$_POST['email'];
$password=$_POST['password'];
$pas = md5($password);
$telpon=$_POST['telpon'];
echo "update tblpetugas set id_petugas='$id_petugas', nama_petugas='$nama_petugas', alamat='$alamat', email='$email', password='$pas', telpon='$telpon' where IDPetugas='$id_petugas'";
mysqli_query($koneksi, "update tblpetugas set idpetugas='$id_petugas', namapetugas='$nama_petugas', alamat='$alamat', email='$email', password='$pas', telpon='$telpon' where IDPetugas='$id_petugas'");
header("location:tambah_petugas.php");

?>