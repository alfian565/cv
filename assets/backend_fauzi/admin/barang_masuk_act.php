<?php 
    include 'config.php';
    $no_nota=$_POST['no_nota'];
    $tanggal_masuk=$_POST['tanggal_masuk'];
    $id_distributor=$_POST['id_distributor'];
    $id_petugas=$_POST['id_petugas'];

    mysqli_query($koneksi, "insert into tblbarangmasuk values('$no_nota','$tanggal_masuk', '$id_distributor', '$id_petugas', '')");
    echo "insert into tblbarang values('$kode_barang','$nama_barang', '$kode_jenis', '$harga_net', '$harga_jual', '$stok')";
    header("location:detail_brg_masuk.php");
?>