<?php 
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Barang</h3>
<a class="btn" href="biodata.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$id_brg=mysqli_real_escape_string($koneksi, $_GET['biodata_id']);
$det=mysqli_query($koneksi, "select * from biodata where biodata_id='$id_brg'")or die(mysqli_error());
while($d=mysqli_fetch_array($det)){
?>					
	<form action="update.php" method="post">
		<table class="table">
			<tr>
				<td>Kode Biodata</td>
				<td><input type="text" class="form-control" name="biodata_id" readonly="" value="<?php echo $d['biodata_id'] ?>"></td>
			</tr>
			<tr>
				<td>Name</td>
				<td><input type="text" class="form-control" name="name" value="<?php echo $d['name'] ?>"></td>
			</tr>
			<tr>
				<td>date</td>
				<td><input type="text" class="form-control" name="date" value="<?php echo $d['date'] ?>"></td>
			</tr>
			<tr>
				<td>place</td>
				<td><input type="text" class="form-control" name="place" value="<?php echo $d['place'] ?>"></td>
			</tr>
			<tr>
				<td>address</td>
				<td><input type="text" class="form-control" name="address" value="<?php echo $d['address'] ?>"></td>
			</tr>
			<tr>
				<td>moto</td>
				<td><input type="text" class="form-control" name="moto" value="<?php echo $d['moto'] ?>"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" class="form-control" name="email" value="<?php echo $d['email'] ?>"></td>
			</tr>
			<tr>
				<td>location</td>
				<td><input type="text" class="form-control" name="location" value="<?php echo $d['location'] ?>"></td>
			</tr>
			<tr>
				<td>phone</td>
				<td><input type="text" class="form-control" name="phone" value="<?php echo $d['phone'] ?>"></td>
			</tr>
			<tr>
				<td>religion</td>
				<td><input type="text" class="form-control" name="religion" value="<?php echo $d['religion'] ?>"></td>
			</tr>
			<tr>
				<td>resume</td>
				<td><input type="text" class="form-control" name="resume" value="<?php echo $d['resume'] ?>"></td>
			</tr>
			<tr>
				<td>sex</td>
				<td><input type="text" class="form-control" name="sex" value="<?php echo $d['sex'] ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" class="btn btn-info" value="Simpan"></td>
			</tr>
		</table>
	</form>
	<?php 
}
?>
<?php include 'footer.php'; ?>