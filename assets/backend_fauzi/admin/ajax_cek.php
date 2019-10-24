<?php
include "config.php";
$pegawai = mysqli_fetch_array(mysqli_query($mysqli, "select * from tblbarang where nama_barang='$_GET[nama_barang]'"));
$data_barang = array('harga_net'   	=>  $pegawai['harga_net'],
              		'harga_jual'  	=>  $pegawai['harga_jual'],);
 echo json_encode($data_barang);
 ?>