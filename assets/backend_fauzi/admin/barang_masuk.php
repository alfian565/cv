<?php
    include "config.php";
    include "header.php";

    $query_petugas = mysqli_query($koneksi, "select * from tblpetugas where Email='$user'");
    while($petugas=mysqli_fetch_array($query_petugas)){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Barang Masuk</title>
</head>
<body>
    <h3><span class="glyphicon glyphicon-list-alt"></span> &nbsp Barang Masuk</h3>
    <button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span> Tambah</button>
    <br/>
    <br/>
    <br/>

    <?php
        $per_hal = 5;
        $jumlah_record = mysqli_query($koneksi, "SELECT COUNT(*) from tblbarangmasuk");
        $jum = mysqli_fetch_array($jumlah_record, MYSQLI_NUM);
        $halaman = ceil($jum[0] / $per_hal);
        $page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
        $start = ($page - 1) * $per_hal;
    ?>

    <table class="col-md-2">
            <tr>
                <td>Jumlah Record</td>
                <td><?php echo ": ".$jum[0]; ?></td>
            </tr>
            <tr>
                <td>Jumlah Halaman</td>
                <td><?php echo ": ".$halaman; ?></td>
            </tr>
    </table>

    <form action="cari_barang.php" method="get">
        <div class="input-group col-md-5 col-md-offset-7">
            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
            <input type="text" class="form-control" placeholder="Cari" aria-describedby="basic-addon1"
                name="search">
        </div>
    </form>
    <br />
    <table class="table table-hover">
        <tr>
            <th class="col-md-1">No Nota</th>
            <th class="col-md-2">Tanggal Masuk</th>
            <th class="col-md-2">ID Distributor</th>
            <th class="col-md-2">ID Petugas</th>
            <th class="col-md-4">Opsi</th>
        </tr>
        <?php
            if (isset($_GET['cari'])) {
                $cari = mysqli_real_escape_string($koneksi, $_GET['cari']);
                $jenis = mysqli_query($koneksi, "select * from tblbarangmasuk where NoNota like '%$cari%'");
            } 
            else {
                $jenis = mysqli_query($koneksi, "select * from tblbarangmasuk limit $start, $per_hal");
            }
            
            while ($data_barang = mysqli_fetch_array($jenis)) {
        ?>
        <tr>
            <td><?php echo $data_barang['NoNota']?></td>
            <td><?php echo $data_barang['TglMasuk'] . "."?></td>
            <td><?php echo $data_barang['IDDistributor'] ?></td>
            <td><?php echo $data_barang['IDPetugas'] ?></td>
            <td>
                <a href="det_barang.php?kode_barang=<?php echo $data_barang['kode_barang']; ?>" class="btn btn-info">Detail</a>
                <a href="edit.php?kode_barang=<?php echo $data_barang['kode_barang']; ?>" class="btn btn-warning">Edit</a>
                <a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini??')){ location.href='hapus.php?kode_barang=<?php echo $data_barang['kode_barang']; ?>' }" class="btn btn-danger">Hapus</a>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>

    <ul class="pagination">
        <?php
        for ($x = 1; $x <= $halaman; $x++) {
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
                    <form action="barang_masuk_act.php" method="post">
                        <div class="form-group">
                            <label>No Nota</label> 

                            <?php
                                $query = "SELECT max(NoNota) as maxNota FROM tblbarangmasuk";
                                $hasil=mysqli_query($koneksi, $query);
                                $data = mysqli_fetch_array($hasil);
                                $noNota = $data['maxNota'];
                                
                                $noUrut = (int) substr($noNota, 3, 3);

                                $noUrut++;

                                $char = "NO";
                                $noNota = $char . sprintf("%03s", $noUrut);
                            ?>
                            <input name="no_nota" type="text" readonly="" class="form-control" placeholder="No Nota" value="<?php echo $noNota?>";>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Masuk</label>
                            <input name="tanggal_masuk" type="date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>ID Distributor</label>
                            <select name="id_distributor" type="text" class="form-control">
                                <?php 
                                    $query = mysqli_query($koneksi, "select * from tbldistributor");
                                    while($data_distributor = mysqli_fetch_array($query)){
                                ?>
                                <option value=" <?php echo $data_distributor['IDDistributor']; ?> "><?php echo $data_distributor['NamaDistributor']; }?></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>ID Petugas</label>
                            <input name="id_petugas" type="text" class="form-control" readonly="" value="<?php echo $petugas['IDPetugas']; }?>">
                        </div>
                        <!-- <div class="form-group">
                            <label>Stok</label>
                            <input name="stok" type="text" class="form-control" placeholder="Stok">
                        </div> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <input type="submit" class="btn btn-primary" value="Simpan">
                </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>