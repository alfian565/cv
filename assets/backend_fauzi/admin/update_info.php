
<?php 
include 'config.php';
$bukuk=$_POST['id'];
$katek=$_POST['nama'];
$penek=$_POST['icon'];
$judul=$_POST['keterangan'];

mysqli_query($koneksi,"update skill set nama='$katek', icon='$penek', keterangan='$judul' where id='$bukuk'");
header("location:info.php");

 ?>