<?php
require 'koneksi.php';

$id_user = $_SESSION['user']['id'];

// $id = $_POST['id'];
$sampai = $_POST['sampai'];
$pinjam = $_POST['pinjam'];
$id_mobil = $_POST['id'];

$pesanan = mysqli_query($conn, "INSERT INTO tbl_pesanan  SET
pinjam = '$pinjam',
kembali = '$sampai',
id_user = $id_user,
id_mobil = $id_mobil
");

if ($pesanan) {
    $id_pesanan = mysqli_insert_id($conn);
}


$pembayaran = mysqli_query($conn, "INSERT INTO tbl_pembayaran (total, id_user) VALUES (20000, $id_user)");
if ($pembayaran) {
    $id_pembayaran = mysqli_insert_id($conn);
    if ($pembayaran) {
        echo " 
    <script>
    alert('Silahkan Melukan Pembayaran')
    location = 'midtrans/pay.php?id_user=$id_user&&id_pesanan=$id_pesanan&&id_pembayaran=$id_pembayaran'
    </script>
    ";
    }
} else {
    // Output the error if the query failed
    echo "Error: " . mysqli_error($conn);
}
