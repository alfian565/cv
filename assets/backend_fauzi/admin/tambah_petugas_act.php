<?php 
    include 'config.php';
    $id_petugas=$_POST['id_Petugas'];
    $nama_petugas=$_POST['nama_petugas'];
    $alamat=$_POST['alamat'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $pas = md5($password);
    $telpon=$_POST['telpon'];
	$level=$_POST['level'];

    mysqli_query($koneksi, "insert into tblpetugas values('$id_petugas','$nama_petugas', '$alamat', '$email', '$pas', '$telpon', 'level')");
    // echo "insert into tblpetugas values('$id_petugas','$nama_petugas', '$alamat', '$email', '$password', '$telpon')");
    header("location:tambah_petugas.php");
?>