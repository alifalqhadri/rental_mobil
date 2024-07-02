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
                                     <h4 class="card-title">Update Data</h4>
                                     <?php
                $id = $_GET['id'];
                $sql = mysqli_query($koneksi , "SELECT * FROM tbl_mobil WHERE id = $id");
                $d = mysqli_fetch_assoc($sql);
                ?>
                                     <form method="POST" action="prosesUpdate.php" enctype="multipart/form-data"
                                         class="forms-sample">
                                         <input type="text" hidden class="form-control" name="id" id="exampleInputName1"
                                             value="<?= $d['id'] ?>" placeholder="Merk">
                                         <input type="text" hidden class="form-control" name="fotoLama"
                                             id="exampleInputName1" value="<?= $d['gambar'] ?>" placeholder="Merk">

                                         <div class="form-group">
                                             <label for="exampleInputName1">Nama</label>
                                             <input type="text" class="form-control" name="nama"
                                                 value="<?= $d['nama'] ?>" id="exampleInputName1" placeholder="Nama">
                                         </div>
                                         <div class="form-group">
                                             <label for="exampleInputName1">Harga</label>
                                             <input type="text" class="form-control" value="<?= $d['harga'] ?>"
                                                 name="harga" id="exampleInputName1" placeholder="Harga">
                                         </div>
                                         <div class="form-group">
                                             <label for="exampleInputName1">Warna</label>
                                             <input type="text" class="form-control" name="warna"
                                                 value="<?= $d['warna'] ?>" id="exampleInputName1" placeholder="Warna">
                                         </div>
                                         <div class="form-group">
                                             <label for="exampleInputName1">Nomor Polisi</label>
                                             <input type="text" class="form-control" name="dd" value="<?= $d['dd'] ?>"
                                                 id="exampleInputName1" placeholder="No DD">
                                         </div>
                                         <div class="form-group">
                                             <label for="exampleInputName1">Tahun Keluar</label>
                                             <input type="date" class="form-control" name="tahun"
                                                 value="<?= $d['tahun'] ?>" id="exampleInputName1" placeholder="Tahun">
                                                 </div>
                                         <div class="form-group">
                                             <label for="exampleInputName1">nomor mesin</label>
                                             <input type="date" class="form-control" name="nomor mesin"
                                                 value="<?= $d['tahun'] ?>" id="exampleInputName1" placeholder="nomor mesin">
                                         </div>
                                         <div class="form-group">
                                             <label for="exampleInputName1">Gambar</label>
                                             <input type="file" class="form-control" name="gambar"
                                                 value="<?= $d['gambar'] ?>" id="exampleInputName1" placeholder="Pesan">
                                         </div>

                                         <div class="form-group">
                                             <label for="">Merk</label>
                                             <select name="merk" id="" class="form-control">
                                                 <?php 
                         $sql2 = mysqli_query($koneksi , "SELECT * FROM tbl_merk");
                        while($data = mysqli_fetch_assoc($sql2)){
                          $selected = ($data['id_merk'] == $d['merk']) ? "selected" : "";
                        ?>
                                                 <option value="<?= $data['id_merk'] ?>" <?= $selected ?>>
                                                     <?= $data['merk'] ?> </option>
                                                 <?php } ?>
                                             </select>
                                         </div>

                                         <button type="submit" name="edit" class="btn btn-primary mr-2">Update</button>
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