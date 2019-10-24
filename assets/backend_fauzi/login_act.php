<?php 
session_start();
include 'admin/config.php';
$uname=$_POST['uname'];
$pass=$_POST['pass'];
$pas=md5($pass);

$query=mysqli_query($koneksi, "select * from tblpetugas where Email='$uname' and password='$pas'");
if(mysqli_num_rows($query)==1){
	$_SESSION['uname']=$uname;
	header("location:admin/index.php");
}else{
	header("location:index.php?pesan=gagal");
	// mysql_error();
}
// echo $pas;
 ?>