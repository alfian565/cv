<?php 
    include 'config.php';
    $kode_barang=$_POST['biodata_id'];
    $nama_barang=$_POST['name'];
    $kode_jenis=$_POST['place'];
    $harga_net=$_POST['date'];
    $harga_jual=$_POST['address'];
    $stok=$_POST['moto'];
    $stoka=$_POST['email'];
    $stokb=$_POST['location'];
    $stokc=$_POST['phone'];
    $stokd=$_POST['religion'];
    $stoke=$_POST['resume'];
    $stokf=$_POST['sex'];


    mysqli_query($koneksi, "insert into biodata values('$kode_barang','$nama_barang', '$kode_jenis', '$harga_net', '$harga_jual', '$stok', '$stoka', '$stokb', '$stokc', '$stokd', '$stoke', '$stokf')");
    // echo "insert into tblbarang values('$kode_barang','$nama_barang', '$kode_jenis', '$harga_net', '$harga_jual', '$stok')";
    header("location:biodata.php");
?>