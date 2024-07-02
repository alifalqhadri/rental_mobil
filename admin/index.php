<!DOCTYPE html>
<html lang="en">

<?php
    require 'koneksi.php';
    require 'components/head.php';

    if(!isset($_SESSION['login'])){
      echo "
      <script>
      alert('Silahkan Login Terlebih Dahulu')
      location = 'login.php'
      </script>
      ";
    }
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
            <div class="col-xl-12 grid-margin stretch-card flex-column">
                <h5 class="mb-2 text-titlecase mb-4">Welcome Admin</h5>
              <div class="row">
                
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php require 'components/footer.php'; ?>
</body>

</html>

