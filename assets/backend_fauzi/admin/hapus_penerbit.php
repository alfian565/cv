<?php 
include 'config.php';
$id=$_GET['education_id'];
mysqli_query($koneksi,"delete from education where education_id='$id'");
header("location:penerbit.php");

?>