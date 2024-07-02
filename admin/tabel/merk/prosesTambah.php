<?php

require '../../koneksi.php';

if(isset($_POST['tambah'])){
    $merk = $_POST['merk'];
  
    

    $sql = mysqli_query($koneksi , "INSERT INTO tbl_merk SET
    merk = '$merk'
    ");

    if($sql){
        echo "
        <script>
        alert('Berhasil Tambah Data')
        </script>
        ";
        header('Location:../../merk.php ');
    }else{
        echo "
        <script>
        alert('Gagal Tambah Data')
        </script>
        ";
    }
}
