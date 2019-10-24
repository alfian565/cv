<?php 
include 'config.php';
$id=$_GET['id'];
mysqli_query($koneksi,"delete from skill where id='$id'");
header("location:info.php");

?>