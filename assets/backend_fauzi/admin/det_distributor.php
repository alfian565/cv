<?php 
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Barang</h3>
<a class="btn" href="data_distributor.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$id_distributor=mysqli_real_escape_string($koneksi, $_GET['id_distributor']);


$det=mysqli_query($koneksi, "select * from tbldistributor where IDDistributor='$id_distributor'")or die(mysqli_error());
while($d=mysqli_fetch_array($det)){
	?>					
	<table class="table">
		<tr>
			<td>iddistributor</td>
			<td><?php echo $d['IDDistributor'] ?></td>
		</tr>
		<tr>
			<td>namadistributor</td>
			<td><?php echo $d['NamaDistributor'] ?></td>
		</tr>
		<tr>
			<td>alamat</td>
			<td><?php echo $d['Alamat'] ?></td>
		</tr>
		<tr>
			<td>Kotaasalsal</td>
			<td><?php echo $d['KotaAsal']; ?></td>
		</tr>
		<tr>
			<td>email</td>
			<td><?php echo $d['Email']; ?></td>
		</tr>
		<tr>
			<td>telpon</td>
			<td><?php echo $d['Telpon'] ?></td>
		</tr>
		<tr>

	<?php 
}
?>
<?php include 'footer.php'; ?>