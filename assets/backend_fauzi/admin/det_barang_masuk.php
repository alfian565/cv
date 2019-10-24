<?php 
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Barang</h3>
<a class="btn" href="data_barang.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$id_brg=mysqli_real_escape_string($koneksi, $_GET['NoNota']);


$det=mysqli_query($koneksi, "select * from tblbarangmasuk where NoNota='$id_brg'")or die(mysqli_error());
while($d=mysqli_fetch_array($det)){
	?>					
	<table class="table">
		<tr>
			<td>No Nota</td>
			<td><?php echo $d['NoNota']; ?></td>
		</tr>
		<tr>
			<td>Tanggal Masuk</td>
			<td><?php echo $d['TglMasuk']; ?></td>
		</tr>
		<tr>
			<td>ID Distributor</td>
			<td><?php echo $d['IDDistributor']; ?></td>
		</tr>
		<tr>
			<td>ID Petugas</td>
			<td><?php echo $d['IDPetugas']; ?></td>
		</tr>
		<tr>
			<td>Total</td>
			<td><?php echo number_format($d['Total']); ?></td>
		</tr>
	</table>
	<?php 
}
?>
<?php include 'footer.php'; ?>