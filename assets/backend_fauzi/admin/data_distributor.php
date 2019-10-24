<?php
    include "config.php";
    include "header.php";
    $jenis = mysqli_query($koneksi, "SELECT * from tbldistributor order by IDDistributor asc");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Distributor</title>
</head>
<body>
    <h3><span class="glyphicon glyphicon-list-alt"></span> &nbsp Data Distributor</h3>
    <button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span> Tambah Barang</button>
    <br/>
    <br/>
    <br/>

    <?php
        $per_hal = 5;
        $jumlah_record = mysqli_query($koneksi, "SELECT COUNT(*) from tbldistributor");
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

    <form action="cari_distributor.php" method="get">
        <div class="input-group col-md-5 col-md-offset-7">
            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
            <input type="text" class="form-control" placeholder="Cari" aria-describedby="basic-addon1"
                name="cari">
        </div>
    </form>
    <br />
    <table class="table table-hover">
        <tr>
            <th class="col-md-2">Nama</th>
            <th class="col-md-2">Alamat</th>
            <th class="col-md-1">Kota Asal</th>
            <th class="col-md-2">Email</th>
            <th class="col-md-1">Telpon</th>
            <th class="col-md-4">Opsi</th>
        </tr>
        <?php
            if (isset($_GET['cari'])) {
                $cari = mysqli_real_escape_string($koneksi, $_GET['cari']);
                $jenis = mysqli_query($koneksi, "select * from tbldistributor where NamaDistributor like '%$cari%'");
            } 
            else {
                $jenis = mysqli_query($koneksi, "select * from tbldistributor limit $start, $per_hal");
            }
            
            while ($data_barang = mysqli_fetch_array($jenis)) {
        ?>
        <tr>
            <!-- <td><?php echo $no++;?></td> -->
            <td><?php echo $data_barang['NamaDistributor']."."?></td>
            <td><?php echo $data_barang['Alamat'] ?></td>
            <td><?php echo $data_barang['KotaAsal'] ?></td>
            <td><?php echo $data_barang['Email'] ?></td>
            <td><?php echo $data_barang['Telpon'] ?></td>
            <td>
                <a href="det_distributor.php?id_distributor=<?php echo $data_barang['IDDistributor']; ?>" class="btn btn-info">Detail</a>
                <a href="datadistributor_edit.php?id_distributor=<?php echo $data_barang['IDDistributor']; ?>" class="btn btn-warning">Edit</a>
                <a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini??')){ location.href='datadistributor_delete.php?id_distributor=<?php echo $data_barang['IDDistributor']; ?>' }" class="btn btn-danger">Hapus</a>
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
                    <h4 class="modal-title">Tambah Distributor Baru</h4>
                </div>
                <div class="modal-body">
                    <form action="data_distributor_act.php" method="post">

                        <div class="form-group">
                            <label>ID Distributor</label> 

                            <?php
                                $query = "SELECT max(IDDistributor) as maxKode FROM tbldistributor";
                                $hasil=mysqli_query($koneksi, $query);
                                $data = mysqli_fetch_array($hasil);
                                $IDPetugas = $data['maxKode'];

                                $noUrut = (int) substr($IDPetugas, 3, 3);

                                $noUrut++;

                                $char = "DIS";
                                $IDDistributor = $char . sprintf("%03s", $noUrut);
                            ?>
                            <input name="id_distributor" type="text" readonly="" class="form-control" value="<?php echo $IDDistributor?>";>
                        </div>
                        <div class="form-group">
                            <label>Nama Distributor</label>
                            <input name="nama_distributor" type="text" class="form-control" placeholder="Nama Distributor">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input name="Alamat" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>KotaAsal</label>
                            <input name="kota_asal" type="text" class="form-control" placeholder="Kota Asal">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input name="email" type="text" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Telpon</label>
                            <input name="telpon" type="text" class="form-control" placeholder="Telpon">
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
</body>
</html>

