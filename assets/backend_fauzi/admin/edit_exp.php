<?php 
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Buku</h3>
<a class="btn" href="exp.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$id_brg=mysqli_real_escape_string($koneksi,$_GET['experiencce_id']);
$det=mysqli_query($koneksi,"select * from experience where experiencce_id='$id_brg'")or die(mysql_error());
while($d=mysqli_fetch_array($det)){
?>					
	<form action="update_exp.php" method="post">
		<table class="table">
			<tr>
				<td></td>
				<td><input type="hidden" name="experiencce_id" value="<?php echo $d['experiencce_id'] ?>"></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input type="text" class="form-control" name="nama" value="<?php echo $d['nama'] ?>"></td>
			</tr>
			<tr>
				<td>tahun</td>
				<td><input type="text" class="form-control" name="tahun" value="<?php echo $d['tahun'] ?>"></td>
			</tr>
			<tr>
				<td>ket</td>
				<td><input type="text" class="form-control" name="keterangan" value="<?php echo $d['keterangan'] ?>"></td>
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