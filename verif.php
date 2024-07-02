<?php
include 'koneksi.php';

// $id = $_GET['id'];
$email = $_GET['gmail'];

$query = mysqli_query($koneksi , "UPDATE tbl_akun SET status ='1' WHERE email = '$email' " );

if($query){
    echo "
    <script>
    alert('Selamat Sudah Verif')
    document.location.href='login.php';
    </script>
    ";
}