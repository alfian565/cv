
<?php 
include 'config.php';
$bukuk=$_POST['experiencce_id'];
$katek=$_POST['nama'];
$penek=$_POST['tahun'];
$judul=$_POST['keterangan'];

mysqli_query($koneksi,"update experience set nama='$katek', tahun='$penek', keterangan='$judul' where experiencce_id='$bukuk'");
header("location:exp.php");

 ?>