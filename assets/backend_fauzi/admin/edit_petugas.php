<?php 
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Petugas</h3>
<a class="btn" href="tambah_petugas.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$id_ptg=mysqli_real_escape_string($koneksi, $_GET['IDPetugas']);
$det=mysqli_query($koneksi, "select * from tblpetugas where IDPetugas='$id_ptg'")or die(mysqli_error());
while($d=mysqli_fetch_array($det)){
?>					
	<form action="edit_petugas_act.php" method="post">
		<table class="table">
			<tr>
				<td>ID Petugas</td>
				<td><input type="text" class="form-control" name="id_petugas" readonly="" value="<?php echo $d['IDPetugas']; ?>"></td>
			</tr>
			<tr>
				<td>Nama Petugas</td>
                <?php
					$det=mysqli_query($koneksi, "select * from tblpetugas where IDPetugas='$id_ptg'")or die(mysqli_error());
					while($d=mysqli_fetch_array($det)){
				?>
				<td><input type="text" class="form-control" name="nama_petugas" value="<?php echo $d['NamaPetugas']; }?>"></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>
                <?php
					$det=mysqli_query($koneksi, "select * from tblpetugas where IDPetugas='$id_ptg'")or die(mysqli_error());
					while($d=mysqli_fetch_array($det)){
				?>
				<input type="text" class="form-control" name="alamat" value="<?php echo $d['Alamat']; }?>"></td>
				</td>
			</tr>
			<tr>
				<td>Email</td>
				<?php
					$det=mysqli_query($koneksi, "select * from tblpetugas where IDPetugas='$id_ptg'")or die(mysqli_error());
					while($d=mysqli_fetch_array($det)){
				?>
				<td><input type="text" class="form-control" name="email" value="<?php echo $d['Email']; }?>"></td>
			</tr>
			<tr>
				<td>Password</td>
				<?php
					$det=mysqli_query($koneksi, "select * from tblpetugas where IDPetugas='$id_ptg'")or die(mysqli_error());
					while($d=mysqli_fetch_array($det)){
				?>
				<td><input type="text" class="form-control" name="password" value="<?php echo $d['password']; }?>"></td>
			</tr>
			<tr>
				<td>Telpon</td>
				<?php
					$det=mysqli_query($koneksi, "select * from tblpetugas where IDPetugas='$id_ptg'")or die(mysqli_error());
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
	<?php 
}
?>