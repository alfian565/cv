<?php
    include "config.php";
    include "header.php";
    $jenis = mysqli_query($koneksi, "SELECT * from tblpetugas order by IDPetugas asc");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Petugas</title>
</head>
<body>
    <h3><span class="glyphicon glyphicon-list-alt"></span> &nbsp Data Petugas</h3>
    <button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span> Tambah Petugas</button>
    <br/>
    <br/>
    <br/>

    <?php
        $per_hal = 5;
        $jumlah_record = mysqli_query($koneksi, "SELECT COUNT(*) from tblpetugas");
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

    <form action="cari_petugas.php" method="get">
        <div class="input-group col-md-5 col-md-offset-7">
            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
            <input type="text" class="form-control" placeholder="Cari" aria-describedby="basic-addon1"
                name="cari">
        </div>
    </form>
    <br />
    <table class="table table-hover">
        <tr>
            <th class="col-md-1">ID Petugas</th>
            <th class="col-md-2">Nama Petugas</th>
            <th class="col-md-2">Alamat</th>
            <th class="col-md-2">Email</th>
            <th class="col-md-2">password</th>
            <th class="col-md-1">Telpon</th>
			<th class="col-md-1">Level</th>
            <th class="col-md-4">Opsi</th>
        </tr>
        <?php
            if (isset($_GET['cari'])) {
                $cari = mysqli_real_escape_string($koneksi, $_GET['cari']);
                $petugas= mysqli_query($koneksi, "select * from tblpetugas where NamaPetugas like '%$cari%'");
            } 
            else {
                $petugas = mysqli_query($koneksi, "select * from tblpetugas limit $start, $per_hal");
            }
            
            while ($data_petugas = mysqli_fetch_array($petugas)) {
        ?>
        <tr>
            <!-- <td><?php echo $no++;?></td> -->
            <td><?php echo $data_petugas['IDPetugas'] . "."?></td>
            <td><?php echo $data_petugas['NamaPetugas'] ?></td>
            <td><?php echo $data_petugas['Alamat'] ?></td>
            <td><?php echo $data_petugas['Email'] ?></td>
            <td><?php echo $data_petugas['password'] ?></td>
            <td><?php echo $data_petugas['Telpon'] ?></td>
            <td><?php echo $data_petugas['Level'] ?></td>
			<td>
                <a href="det_petugas.php?IDPetugas=<?php echo $data_petugas['IDPetugas']; ?>" class="btn btn-info">Detail</a>
                <a href="edit_petugas.php?IDPetugas=<?php echo $data_petugas['IDPetugas']; ?>" class="btn btn-warning">Edit</a>
                <a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini??')){ location.href='hapus_ptg.php?IDPetugas=<?php echo $data_petugas['IDPetugas']; ?>' }" class="btn btn-danger">Hapus</a>
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
                    <h4 class="modal-title">Tambah Petugas</h4>
                </div>
                <div class="modal-body">
                    <form action="tambah_petugas_act.php" method="post">
                        <div class="form-group">
                            <label>ID Petugas</label> 

                            <?php
                                $query = "SELECT max(IDPetugas) as maxKode FROM tblpetugas";
                                $hasil=mysqli_query($koneksi, $query);
                                $data = mysqli_fetch_array($hasil);
                                $IDPetugas = $data['maxKode'];

                                $noUrut = (int) substr($IDPetugas, 3, 3);

                                $noUrut++;

                                $char = "PTG";
                                $IDPetugas = $char . sprintf("%03s", $noUrut);
                            ?>
                            <input name="id_Petugas" type="text" readonly="" class="form-control" placeholder="ID Petugas" value="<?php echo $IDPetugas?>";>
                        </div>
                        <div class="form-group">
                            <label>Nama Petugas</label>
                            <input name="nama_petugas" type="text" class="form-control" placeholder="Nama Petugas">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input name="alamat" type="text" class="form-control" placeholder="Alamat">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input name="email" type="text" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input name="password" type="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label>Telpon</label>
                            <input name="telpon" type="text" class="form-control" placeholder="Telpon">
                        </div>
						<div class="form-group">
                            <label>Level</label>
                            <input name="Level" type="text" class="form-control" placeholder="Level">
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

