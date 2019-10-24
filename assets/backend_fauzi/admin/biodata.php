<?php
    include "config.php";
    include "header.php";
    $jenis = mysqli_query($koneksi, "SELECT * from biodata order by biodata_id asc");
?>
<style>
	body {background-color : #ccffcc; }
	</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Biodata</title>
</head>
<body>
    <h3><span class="glyphicon glyphicon-list-alt"></span> &nbsp BIODATA</h3>
    <button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span> Tambah Barang</button>
    <br/>
    <br/>
    <br/>

    <?php
        $per_hal = 5;
        $jumlah_record = mysqli_query($koneksi, "SELECT COUNT(*) from biodata");
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
                name="cari">
        </div>
    </form>
    <br />
    <table class="table table-hover">
        <tr>
            <th class="col-md-1">Kode</th>
            <th class="col-md-2">name</th>
            <th class="col-md-2">place</th>
            <th class="col-md-2">date</th>
            <th class="col-md-2">address</th>
            <th class="col-md-2">moto</th>
            <th class="col-md-2">email</th>

            <th class="col-md-2">location</th>
            <th class="col-md-2">phone</th>
            <th class="col-md-2">religion</th>
            <th class="col-md-4">Opsi</th>
        </tr>
        <?php
            if (isset($_GET['cari'])) {
                $cari = mysqli_real_escape_string($koneksi, $_GET['cari']);
                $jenis = mysqli_query($koneksi, "select * from biodata where name  like '%$cari%'");
            } 
            else {
                $jenis = mysqli_query($koneksi, "select * from biodata limit $start, $per_hal");
            }
            
            while ($data_barang = mysqli_fetch_array($jenis)) {
        ?>
        <tr>
            <!-- <td><?php echo $no++;?></td> -->
            <td><?php echo $data_barang['biodata_id'] . "."?></td>
            <td><?php echo $data_barang['name'] ?></td>
            <td><?php echo $data_barang['place'] ?></td>
            <td><?php echo $data_barang['date'] ?></td>
            <td><?php echo $data_barang['address'] ?></td>
            <td><?php echo $data_barang['moto'] ?></td>
            <td><?php echo $data_barang['email'] ?></td>
            <td><?php echo $data_barang['location'] ?></td>
            <td><?php echo $data_barang['phone'] ?></td>
            <td><?php echo $data_barang['religion'] ?></td>
            <td>
                <a href="edit_biodata.php?biodata_id=<?php echo $data_barang['biodata_id']; ?>" class="btn btn-warning">Edit</a>
                <a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini??')){ location.href='hapus_biodata.php?biodata_id=<?php echo $data_barang['kode_barang']; ?>' }" class="btn btn-danger">Hapus</a>
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
                    <form action="biodata_insert.php" method="post">
                        <div class="form-group">
                            <label>Kode Barang</label> 

                            <?php
                                $query = "SELECT max(biodata_id) as maxKode FROM biodata";
                                $hasil=mysqli_query($koneksi, $query);
                                $data = mysqli_fetch_array($hasil);
                                $kodeBarang = $data['maxKode'];

                                $noUrut = (int) substr($kodeBarang, 3, 3);

                                $noUrut++;

                                $char = "BRG";
                                $kodeBarang = $char . sprintf("%03s", $noUrut);
                            ?>
                            <input name="biodata_id" type="text" readonly="" class="form-control" placeholder="Kode" value="<?php echo $kodeBarang?>";>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input name="name" type="text" class="form-control" placeholder="name">
                        </div>
                        <div class="form-group">
                            <label>place</label>
                            <input name="place" type="text" class="form-control" placeholder="place">
                        </div>
                        <div class="form-group">
                            <label>date</label>
                            <input name="date" type="text" class="form-control" placeholder="date">
                        </div>
                        <div class="form-group">
                            <label>address</label>
                            <input name="address" type="text" class="form-control" placeholder="address">
                        </div>
                        <div class="form-group">
                            <label>moto</label>
                            <input name="moto" type="text" class="form-control" placeholder="moto">
                        </div>
                        <div class="form-group">
                            <label>email</label>
                            <input name="email" type="text" class="form-control" placeholder="email">
                        </div>
                        <div class="form-group">
                            <label>location</label>
                            <input name="location" type="text" class="form-control" placeholder="location">
                        </div>
                        <div class="form-group">
                            <label>phone</label>
                            <input name="phone" type="text" class="form-control" placeholder="phone">
                        </div>                        
                        <div class="form-group">
                            <label>religion</label>
                            <input name="religion" type="text" class="form-control" placeholder="religion">
                        </div>
                        <div class="form-group">
                            <label>resume</label>
                            <input name="resume" type="text" class="form-control" placeholder="resume">
                        </div>
                        <div class="form-group">
                            <label>sex</label>
                            <input name="sex" type="text" class="form-control" placeholder="sex">
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

