<?php include 'header.php'; 
?>

<h3><span class="glyphicon glyphicon-briefcase"></span> experiencce </h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2">
<span class="glyphicon glyphicon-pencil" style="margin-right: 5px;" ></span>Tambah Penerbit</button>
<br/>
<br/>
<style>
	body {background-color : #ccffcc; }
	</style>
<?php 
$per_hal=10;
$jumlah_record=mysqli_query($koneksi,"SELECT COUNT(*) from experience");
$jum= mysqli_fetch_array($jumlah_record, MYSQLI_NUM);
$halaman=ceil($jum[0] / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>
<div class="col-md-12">
	<table class="col-md-2">
		<tr>
			<td>Jumlah Record</td>		
			<td><?php echo $jum[0]; ?></td>
		</tr>
		<tr>
			<td>Jumlah Halaman</td>	
			<td><?php echo $halaman; ?></td>
		</tr>
	</table> 
</div>
<form action="cari_pnrbt.php" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari Nama Penerbit di sini .." aria-describedby="basic-addon1" name="cari_pnrbt">	
	</div>
</form>
<br/>
<table class="table table-hover">
	<tr>
		<th class="col-md-0"><center>No</center></th>
		<th class="col-md-1"><center>Kode exp</center></th>
		<th class="col-md-2"><center>Nama </center></th>
		<th class="col-md-3"><center>Alamat </center></th>
		<th class="col-md-2"><center>keterangan</center></th>
		
		<th class="col-md-4"><center>Opsi</center></th>
	</tr>
	<?php 
	if(isset($_GET['cari_pnrbt'])){
		$cari=mysqli_real_escape_string($koneksi, $_GET['cari_pnrbt']);
		$brg=mysqli_query($koneksi,"select * from experience where nama like '%$cari%'");
	}else{
		$brg=mysqli_query($koneksi,"select * from experience limit $start, $per_hal");
	}
	$no=1;
	while($b=mysqli_fetch_array($brg)){

		?>
		<tr>
			<td><center><?php echo $no++ ?></center></td>
			<td><center><?php echo $b['experiencce_id'] ?></center></td>
			<td><center><?php echo $b['nama'] ?></center></td>
			<td><center><?php echo $b['tahun'] ?></center></td>
			<td><center><?php echo $b['keterangan'] ?></center></td>
		
			<td>
			<center>
				<a href="edit_exp.php?experiencce_id=<?php echo $b['experiencce_id']; ?>" class="btn btn-warning">Edit</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ 
				   location.href='hapus_exp.php?experiencce_id=<?php echo $b['experiencce_id']; ?>' }" class="btn btn-danger">Hapus</a>
			</center>
			</td>
		</tr>		
		<?php 
	}
	?>
	
</table>
<ul class="pagination">			
			<?php 
			for($x=1;$x<=$halaman;$x++){
				?>
				<li><a href="?page=<?php echo $x ?>"><?php echo $x ?></a></li>
				<?php
			}
			?>						
		</ul>
		<?php
		$query = "SELECT max(experiencce_id) as maxKode FROM experience";
		$hasil = mysqli_query($koneksi, $query);
		$data  = mysqli_fetch_array($hasil);
		$kategori_kode = $data['maxKode'];
		$noUrut = (int) substr($kategori_kode, 3, 3);
		$noUrut++;
		$char = "E-";
		$newID = $char . sprintf("%03s", $noUrut);
		?>
<!-- modal input -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Penerbit Baru</h4>
			</div>
			<div class="modal-body">
				<form action="tmb_exp_act.php" method="post">
					<div class="form-group">
						<label>Kode Penerbit</label>
						<input name="experiencce_id" type="text"  readonly="" class="form-control" value="<?php echo $newID;?>">
					</div>
					<div class="form-group">
						<label>Nama Penerbit</label>
						<input name="nama" type="text" class="form-control" placeholder="Nama Penerbit ..">
					</div>
					<div class="form-group">
						<label>Alamat Penerbit</label>
						<input name="tahun" type="text" class="form-control" placeholder="Alamat Penerbit ..">
					</div>
					<div class="form-group">
						<label>Telepon</label>
						<input name="keterangan" type="text" class="form-control" placeholder="Telepon ..">
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<input type="submit" class="btn btn-primary" value="Simpan">
				</div>
			</form>
		</div>
	</div>
</div>



<?php 
include 'footer.php';

?>