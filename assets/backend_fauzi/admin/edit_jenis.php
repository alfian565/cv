<?php 
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Jenis</h3>
<a class="btn" href="data_barang.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$id_jns=mysqli_real_escape_string($koneksi, $_GET['kode_jenis']);
$det=mysqli_query($koneksi, "select * from tbljenis where KodeJenis='$id_jns'")or die(mysqli_error());
while($d=mysqli_fetch_array($det)){
?>					
	<form action="edit_jenis_act.php" method="post">
		<table class="table">
			<tr>
				<td>Kode Jenis</td>
				<td><input type="text" class="form-control" name="kode_jenis" readonly="" value="<?php echo $d['KodeJenis'] ?>"></td>
			</tr>
			<tr>
				<td>Nama Jenis</td>
				<td><input type="text" class="form-control" name="nama_jenis" value="<?php echo $d['Jenis'] ?>"></td>
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