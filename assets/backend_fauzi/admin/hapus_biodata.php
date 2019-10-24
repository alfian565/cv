<?php 
include 'config.php';
$id=$_GET['biodata_id'];
mysqli_query($koneksi, "delete from biodata where biodata_id='$id'");
header("location:biodata.php");

?>