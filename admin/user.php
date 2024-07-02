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
                  <h4 class="card-title">Tabel Pengguna</h4>
                  <div class="hilang">
                  <a href="tabel/pengguna/tambah.php">
                      <button type="button" class="btn btn-outline-primary btn-fw">Tambah Data</button>
                  </a>
                  </div>
                  
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Nama</th>
                          <th>Username</th>
                          <th>Gmail</th>
                          <th>Alamat</th>
                          <th>Password</th>
                          <th>Foto</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                          <?php
                          $sql = mysqli_query($conn , "SELECT * FROM tbl_akun");
                          while ($d = mysqli_fetch_array($sql)){
                          ?>

                        <tr>
                          <td><?= $d['nama_user'] ?></td>
                          <td><?= $d['username'] ?></td>
                          <td><?= $d['email'] ?></td>
                          <td><?= $d['alamat'] ?></td>
                          <td><?= $d['password'] ?></td>
                          <td> <img src="assets/img/<?= $d['foto'] ?>" alt=""> </td>
                          <td>
                            <a href="tabel/pengguna/update.php?id=<?= $d['id'] ?>">
                                <label class="badge badge-warning">Update</label>
                            </a>
                            <a href="tabel/pengguna/hapus.php?id=<?= $d['id'] ?>">
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

