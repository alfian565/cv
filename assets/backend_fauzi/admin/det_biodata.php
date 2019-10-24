<?php 
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Barang</h3>
<a class="btn" href="biodata.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$id_brg=mysqli_real_escape_string($koneksi, $_GET['id']);


$det=mysqli_query($koneksi, "select * from biodata where id='$id_brg'")or die(mysqli_error());
while($d=mysqli_fetch_array($det)){
	?>					
	<table class="table">
		<tr>
			<td>Kode Barang</td>
			<td><?php echo $d['id']; ?></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td><?php echo $d['nama_lengkap']; ?></td>
		</tr>
		<tr>
			<td>Jenis</td>
			<td><?php echo $d['kelamin']; ?></td>
		</tr>
		<tr>
			<td>Jenis</td>
			<td><?php echo $d['tmpt_tgl_lahir']; ?></td>
		</tr>
		<tr>
			<td>Jenis</td>
			<td><?php echo $d['alamat']; ?></td>
		</tr>
		<tr>
			<td>Jenis</td>
			<td><?php echo $d['email']; ?></td>
		</tr>
		<tr>
			<td>Jenis</td>
			<td><?php echo $d['no_hp']; ?></td>
		</tr>
	</table>
	<?php 
}
?>
<?php include 'footer.php'; ?>