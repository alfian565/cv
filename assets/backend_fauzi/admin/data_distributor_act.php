<?php 
    include 'config.php';
    $id=$_POST['id_distributor'];
    $nama=$_POST['nama_distributor'];
    $alamat=$_POST['Alamat'];
    $kota_asal=$_POST['kota_asal'];
    $email=$_POST['email'];
    $telepon=$_POST['telpon'];
    
    mysqli_query($koneksi, "insert into tbldistributor values('$id','$nama', '$alamat', '$kota_asal', '$email', '$telepon')");
    // echo "insert into tbldistributor values('$nama_distributor','$Alamat', '$kota_asal', '$email', '$telpon')";
    header("location:data_distributor.php");
?>