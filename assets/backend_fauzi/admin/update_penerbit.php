
<?php 
include 'config.php';
$bukuk=$_POST['education_id'];
$katek=$_POST['nama'];
$penek=$_POST['tahun'];
$judul=$_POST['keterangan'];

mysqli_query($koneksi,"update education set nama='$katek', tahun='$penek', keterangan='$judul' where education_id='$bukuk'");
header("location:penerbit.php");

 ?>