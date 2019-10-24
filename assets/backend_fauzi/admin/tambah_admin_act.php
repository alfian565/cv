<?php
    include 'config.php';
    $id = $_POST['id'];
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $pas=md5($pass);

    $query=mysqli_query($koneksi, "INSERT INTO `admin`(`id`, `uname`, `pass`, `foto`) VALUES ('$id','$uname','$pas','')");
    session_start();
    session_destroy();
    header("location:../index.php");
?>