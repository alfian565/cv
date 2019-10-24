<?php
include "config.php";
$query = "SELECT max(penerbit_kode) as maxKode FROM penerbit";
$hasil = mysqli_query($koneksi,$query);
$data = mysqli_fetch_array($hasil);
$penerbit_kode = $data['maxKode'];
$noUrut = (int) substr($penerbit_kode, 3, 3);
$noUrut++;
$char = "PEN";
$penerbit_kode = $char . sprintf("%03s", $noUrut);
?>