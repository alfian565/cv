<?php 

include 'config.php';

$penerbit_kode=$_POST['penerbit_kode'];
$penerbit_nama=$_POST['penerbit_nama'];
$penerbit_alamat=$_POST['penerbit_alamat'];
$penerbit_telp=$_POST['penerbit_telp'];

mysqli_query($koneksi,"update penerbit set penerbit_kode='$penerbit_kode', penerbit_nama='$penerbit_nama', penerbit_alamat='$penerbit_alamat', penerbit_telp='$penerbit_telp' where penerbit_kode='$penerbit_kode'");
header("location:penerbit.php");

?>