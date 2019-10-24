<?php 
include 'header.php'; 
?>

<h3><span class="glyphicon glyphicon-briefcase"></span> PENGALAMAN</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Jenis Barang</button>
<br/>
<br/>

<!-- <?php 
$periksa=mysqli_query($koneksi, "select * from education where jumlah <=3");
while($q=mysqli_fetch_array($periksa)){	
	if($q['jumlah']<=3){	
		?>	
		<script>
			$(document).ready(function(){
				$('#pesan_sedia').css("color","red");
				$('#pesan_sedia').append("<span class='glyphicon glyphicon-asterisk'></span>");
			});
		</script>
		<?php
		echo "<div style='padding:5px' class='alert alert-warning'><span class='glyphicon glyphicon-info-sign'></span> Stok  <a style='color:red'>". $q['nama']."</a> yang tersisa sudah kurang dari 3 . silahkan pesan lagi !!</div>";	
	}
}
?> -->

<?php 
$per_hal=10;
$jumlah_record=mysqli_query($koneksi,"SELECT count(*) from tbljenis");
$jum = mysqli_fetch_array($jumlah_record, MYSQLI_NUM);
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
	<a style="margin-bottom:10px" href="lap_barang.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a>
</div>
<form action="cari_jenis_act.php" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari barang di sini .." aria-describedby="basic-addon1" name="cari">	
	</div>
</form>
<br/>
<table class="table table-hover">
	<tr>
		<th class="col-md-1">Kode Jenis</th>
		<th class="col-md-2">Nama Jenis</th>
		<!-- <th class="col-md-1">Sisa</th>		 -->
		<th class="col-md-3">Opsi</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari=mysqli_real_escape_string($koneksi, $_GET['cari']);
		$brg=mysqli_query($koneksi, "select * from tbljenis where Jenis like '%$cari%'");
	}else{
		$brg=mysqli_query($koneksi, "select * from tbljenis limit $start, $per_hal");
	}
	$no=1;
	while($b=mysqli_fetch_array($brg)){
		?>
		<tr>
			<td><?php echo $b['KodeJenis'] ?></td>
			<td><?php echo $b['Jenis'] ?></td>
			<td>
				<a href="edit_jenis.php?kode_jenis=<?php echo $b['KodeJenis']; ?>" class="btn btn-warning">Edit</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='jenis_barang_delete.php?kode_jenis=<?php echo $b['KodeJenis']; ?>' }" class="btn btn-danger">Hapus</a>
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
				<h4 class="modal-title">Tambah Barang Baru</h4>
			</div>
			<div class="modal-body">
				<form action="jenis_barang_act.php" method="post">
					<div class="form-group">
						<label>Kode Jenis</label>
						<?php
                                $query = "SELECT max(KodeJenis) as maxKode FROM tbljenis";
                                $hasil=mysqli_query($koneksi, $query);
                                $data = mysqli_fetch_array($hasil);
                                $kode_jenis = $data['maxKode'];

                                $noUrut = (int) substr($kode_jenis, 3, 3);

                                $noUrut++;

                                $char = "JNS";
                                $kode_jenis = $char . sprintf("%03s", $noUrut);
                            ?>
                            <input name="kode_jenis" type="text" readonly="" class="form-control" value="<?php echo $kode_jenis; ?>">
						
					</div>
					<div class="form-group">
						<label>Nama Jenis</label>
						<input name="namaJenis" type="text" class="form-control" placeholder="Jenis Barang ..">
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