<?php 
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Petugas</h3>
<a class="btn" href="tambah_petugas.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$id_ptg=mysqli_real_escape_string($koneksi, $_GET['IDPetugas']);


$det=mysqli_query($koneksi, "select * from tblpetugas where IDPetugas='$id_ptg'")or die(mysqli_error());
while($d=mysqli_fetch_array($det)){
	?>					
	<table class="table">
		<tr>
			<td>ID Petugas</td>
			<td><?php echo $d['IDPetugas']; ?></td>
		</tr>
		<tr>
			<td>Nama Petugas</td>
			<td><?php echo $d['NamaPetugas']; ?></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td><?php echo $d['Alamat']; ?></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><?php echo $d['Email']; ?></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><?php echo $d['password']; ?>,-</td>
		</tr>
		<tr>
			<td>Telpon</td>
			<td><?php echo $d['Telpon']; ?></td>
		</tr>
	</table>
	<?php 
}
?>
<?php include 'footer.php'; ?>