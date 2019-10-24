 <?php 
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Barang Masuk</h3>
<a class="btn" href="barang_masuk.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
	<form action="edit_jenis_act.php" method="post">
		<table class="table">
			<tr>
				<td>No Nota</td>
                <?php
                    $query = "SELECT max(NoNota) as noNota FROM tblbarangmasuk";
                    $hasil=mysqli_query($koneksi, $query);
                    $data = mysqli_fetch_array($hasil);
                    $no_nota = $data['noNota'];

                    $noUrut = (int) substr($no_nota, 3, 3);

                    $char = "NO";
                    $noNota = $char . sprintf("%03s", $noUrut);
                ?>
				<td><input type="text" class="form-control" name="no_nota" readonly="" placeholder="Masukkan Kode" value="<?php echo $noNota; ?>"></td>
			</tr>
			<tr>
				<td>Nama Barang</td>
				<td>
                    <select class="form-control" name="nama_barang" onchange="cek_database()">
                        <?php 
                            $data = mysqli_query($koneksi, "select * from tblbarang");
                            while($d = mysqli_fetch_array($data)){
                        ?>
                        <option><?php echo $d['nama_barang']; }?></option>
                    </select>
                </td>
			</tr>	
            <tr>
				<td>Harga</td>
				<td><input type="text" class="form-control" name="harga" value="Otomatis mengambil dari tblbarang"></td>
			</tr>	
            <tr>
				<td>Stok awal</td>
				<td><input type="text" class="form-control" name="stok_awal" value="Otomatis mengambil dari tblbarang" disabled></td>
			</tr>	
            <tr>
				<td>Stok masuk</td>
				<td><input type="text" class="form-control" name="stok_masuk" value="Manual"></td>
			</tr>
            <tr>
				<td>Sub Total</td>
				<td><input type="text" class="form-control" name="sub_total" value="Harga x Stok masuk"></td>
			</tr>	
			<tr>
				<td></td>
				<td><input type="submit" class="btn btn-info" value="Simpan"></td>
			</tr>			
		</table>
        <span>MASUKKAN KEDALAM DATABASE tbldetailbrgmasuk</span>
	</form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript">
        function cek_database(){
            var nama_barang = $("#nama_barang").val();
            $.ajax({
                url: 'ajax_cek.php',
                data:"nama_barang="+nama_barang ,
            }).success(function (data) {
                var json = data,
                obj = JSON.parse(json);
                $('#harga').val(obj.harga_net);

                var $jenis_kelamin = $('input:radio[name=jenis_kelamin]');
            if(obj.jenis_kelamin == 'laki-laki'){
                $jenis_kelamin.filter('[value=laki-laki]').prop('checked', true);
            }else{
                $jenis_kelamin.filter('[value=perempuan]').prop('checked', true);
            }
            });
        }
    </script>
<?php include 'footer.php'; ?>