<?php 
include 'header.php'; 
include 'config.php';?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Tambahkan Supplier</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Barang</button>
<br/>
<br/>

<?php 
$per_hal=10;
$jumlah_record=mysqli_query($koneksi,"SELECT count(*) from supplier");
// $jum=mysqli_query($koneksi, '$jumlah_record');
$jum = mysqli_fetch_array($jumlah_record, MYSQLI_NUM);
$halaman=ceil($jum[0] / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>
<!-- <div class="col-md-12">
	<a style="margin-bottom:10px" href="lap_barang.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a>
</div> -->
<form action="cari_act.php" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari barang di sini .." aria-describedby="basic-addon1" name="cari">	
	</div>
</form>
<br/>
<table class="table table-hover">
	<tr>
		<th class="col-md-1">No</th>
		<th class="col-md-4">Nama Suplier</th>
		<th class="col-md-3">Alamat Supplier</th>
		<th class="col-md-1">Telp Supplier</th>
		<!-- <th class="col-md-1">Sisa</th>		 -->
		<th class="col-md-3">Opsi</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari=mysqli_real_escape_string($koneksi, $_GET['cari']);
		$sup=mysqli_query($koneksi, "select * from supplier where nama_supp like '$cari' or alamat_supp like '$cari'");
	}else{
		$sup=mysqli_query($koneksi, "select * from supplier limit $start, $per_hal");
	}
	$no=1;
	while($b=mysqli_fetch_array($sup)){
		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['name_supp'] ?></td>
			<td><?php echo ($b['alamat_supp']) ?></td>
			<td><?php echo $b['telp_supp'] ?></td>
			<td>
				<a href="det_supplier.php?id=<?php echo $b['id_supp']; ?>" class="btn btn-info">Detail</a>
				<a href="edit.php?id=<?php echo $b['id_supp']; ?>" class="btn btn-warning">Edit</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus.php?id=<?php echo $b['id_supp']; ?>' }" class="btn btn-danger">Hapus</a>
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
<!-- modal input -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Supplier Baru</h4>
			</div>
			<div class="modal-body">
				<form action="tmb_sup_act.php" method="post">
					<div class="form-group">
						<label>Nama Supplier</label>
						<input name="nama" type="text" class="form-control" placeholder="Nama Supplier ..">
					</div>
					<div class="form-group">
						<label>Alamat Supplier</label>
						<input name="alamat" type="text" class="form-control" placeholder="Alamat Supplier ..">
					</div>
					<div class="form-group">
						<label>Telp Supplier</label>
						<input name="telp" type="text" class="form-control" placeholder="Telp Suplier ..">
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