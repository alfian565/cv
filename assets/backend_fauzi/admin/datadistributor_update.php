<?php 
include 'config.php';
$IDDistributor=$_POST['id_distributor'];
$NamaDistributor=$_POST['nama_distributor'];
$Alamat=$_POST['alamat'];
$KotaAsal=$_POST['kota_asal'];
$Email=$_POST['email'];
$Telpon=$_POST['telpon'];

mysqli_query($koneksi, "update tbldistributor set NamaDistributor='$NamaDistributor', Alamat='$Alamat', KotaAsal='$KotaAsal', Email='$Email', Telpon='$Telpon' where IDDistributor='$IDDistributor'");
header("location:data_distributor.php");

?>