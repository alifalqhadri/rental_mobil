<!DOCTYPE html>
<html lang="en">

<?php
require 'koneksi.php';

require 'components/head.php';
?>

<body>

    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <?php
        require 'components/nav.php';
        ?>

        <!-- partial -->

        <div class="container-fluid page-body-wrapper">

            <!-- partial:partials/_sidebar.html -->
            <?php require 'components/side.php';
            ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Tabel Mobil</h4>
                                    <div class="hilang">
                                        <a href="tabel/mobil/tambah.php">
                                            <button type="button" class="btn btn-outline-primary btn-fw">Tambah
                                                Data</button>

                                            <button type="button" onclick="window.print()" class="btn btn-outline-danger btn-fw">PDF</button>
                                        </a>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Harga</th>
                                                    <th>Warna</th>
                                                    <th>Nomor Polisi</th>
                                                    <th>Tahun Beli</th>
                                                    <th>Gambar</th>
                                                    <th>Merk</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $sql = mysqli_query($conn, "SELECT * FROM tbl_mobil
                          JOIN
                          tbl_merk
                          on
                          tbl_mobil.merk = tbl_merk.id_merk
                          ");
                                                while ($d = mysqli_fetch_array($sql)) {
                                                ?>

                                                    <tr>
                                                        <td><?= $d['nama'] ?></td>
                                                        <td>Rp <?= number_format($d['harga'])  ?></td>
                                                        <td><?= $d['warna'] ?></td>
                                                        <td><?= $d['dd'] ?></td>
                                                        <td><?= $d['tahun'] ?></td>
                                                        <td> <img src="assets/img/<?= $d['gambar'] ?>" alt=""></td>
                                                        <td><?= $d['merk'] ?></td>
                                                        <td>
                                                            <a href="tabel/mobil/update.php?id=<?= $d['id'] ?>">
                                                                <label class="badge badge-warning">Update</label>
                                                            </a>
                                                            <a href="tabel/mobil/hapus.php?id=<?= $d['id'] ?>">
                                                                <label class="badge badge-danger">Hapus</label>
                                                            </a>
                                                        </td>
                                                    <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <?php require 'components/footer.php'; ?>
</body>

</html>