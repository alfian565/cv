<?php 
include 'config.php';
$id=$_GET['experiencce_id'];
mysqli_query($koneksi,"delete from experience where experiencce_id='$id'");
header("location:penerbit.php");

?>