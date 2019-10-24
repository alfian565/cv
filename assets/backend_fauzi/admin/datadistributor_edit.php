<?php 
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Barang</h3>
<a class="btn" href="data_barang.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$id_distributor=mysqli_real_escape_string($koneksi, $_GET['id_distributor']);
$det=mysqli_query($koneksi, "select * from tbldistributor where IDDistributor='$id_distributor'")or die(mysqli_error());
while($d=mysqli_fetch_array($det)){
?>					
	<form action="datadistributor_update.php" method="post">
		<table class="table">
			<tr>
				<td>IDDistributor</td>
				<td><input type="text" class="form-control" name="id_distributor" readonly="" value="<?php echo $d['IDDistributor'] ?>"></td>
			</tr>
			<tr>
				<td>NamaDistributor</td>
				<td><input type="text" class="form-control" name="nama_distributor" value="<?php echo $d['NamaDistributor'] ?>"></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>
					<input type="text" name="alamat" class="form-control" value="<?php echo $d['Alamat']; }?>">
						
				</td>
			</tr>
			<tr>
				<td>KotaAsal</td>
				<?php
					$det=mysqli_query($koneksi, "select * from tbldistributor where IDDistributor='$id_distributor'")or die(mysqli_error());
					while($d=mysqli_fetch_array($det)){
				?>
				<td><input type="text" class="form-control" name="kota_asal" value="<?php echo $d['KotaAsal']; }?>"></td>
			</tr>
			<tr>
				<td>Email</td>
				<?php
					$det=mysqli_query($koneksi, "select * from tbldistributor where IDDistributor='$id_distributor'")or die(mysqli_error());
					while($d=mysqli_fetch_array($det)){
				?>
				<td><input type="text" class="form-control" name="email" value="<?php echo $d['Email']; }?>"></td>
			</tr>
			<tr>
				<td>Telpon</td>
				<?php
					$det=mysqli_query($koneksi, "select * from tbldistributor where IDDistributor='$id_distributor'")or die(mysqli_error());
					while($d=mysqli_fetch_array($det)){
				?>
				<td><input type="text" class="form-control" name="telpon" value="<?php echo $d['Telpon']; }?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" class="btn btn-info" value="Simpan"></td>
			</tr>
		</table>
	</form>
	
<?php include 'footer.php'; ?>