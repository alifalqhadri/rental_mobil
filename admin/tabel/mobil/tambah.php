<!DOCTYPE html>
<html lang="en">

<?php
    require '../../koneksi.php';
    require '../head.php';
?>

<body>

    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <?php 
    require '../nav.php';
    ?>

        <!-- partial -->

        <div class="container-fluid page-body-wrapper">

            <!-- partial:partials/_sidebar.html -->
            <?php require '../side.php'; 
      ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Tambah Data</h4>
                                    <?php
                   $sql2 = mysqli_query($koneksi , "SELECT * FROM tbl_merk");
                  ?>
                                    <form method="POST" action="prosesTambah.php" enctype="multipart/form-data"
                                        class="forms-sample">

                                        <div class="form-group">
                                            <label for="exampleInputName1">Nama</label>
                                            <input type="text" class="form-control" name="nama" id="exampleInputName1"
                                                placeholder="Nama">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Harga</label>
                                            <input type="text" class="form-control" name="harga" id="exampleInputName1"
                                                placeholder="Harga">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Warna</label>
                                            <input type="text" class="form-control" name="warna" id="exampleInputName1"
                                                placeholder="Warna">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Nomor Polisi</label>
                                            <input type="text" class="form-control" name="dd" id="exampleInputName1"
                                                placeholder="No DD">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Tahun Keluar</label>
                                            <input type="date" class="form-control" name="tahun" id="exampleInputName1"
                                                placeholder="Tahun">
                                                </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">nomor mesin</label>
                                            <input type="date" class="form-control" name="nomor mesin" id="exampleInputName1"
                                                placeholder="nomormesin">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Gambar</label>
                                            <input type="file" class="form-control" name="gambar" id="exampleInputName1"
                                                placeholder="Pesan">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Merk</label>
                                            <select name="merk" id="" class="form-control">
                                                <?php 
                            while($d = mysqli_fetch_array($sql2)){
                            ?>
                                                <option value="<?= $d['id_merk'] ?>">
                                                    <?= $d['merk'] ?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>



                                        <button type="submit" name="tambah" class="btn btn-primary mr-2">Tambah</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <?php require '../footer.php'; ?>
</body>

</html>