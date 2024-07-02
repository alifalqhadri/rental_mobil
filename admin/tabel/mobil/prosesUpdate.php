<?php
require '../../koneksi.php';

if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $warna = $_POST['warna'];
    $dd = $_POST['dd'];
    $harga = $_POST['harga'];
    $tahun = $_POST['tahun'];
    $id_merk = $_POST['merk'];

    $fotoLama = $_POST['fotoLama'];
    //Pengecekan kondisi user menekan tombol gambar atau tidak
    if($_FILES['gambar']['error'] == 4){
        $gambar = $fotoLama;
    } else{
        $gambar = upload();
    }


    $sql = mysqli_query($koneksi , "UPDATE tbl_mobil SET
    nama = '$nama',
    warna = '$warna',
    dd = '$dd',
    tahun = '$tahun',
    harga = '$harga',
    gambar = '$gambar',
    merk = '$id_merk'
    WHERE
    id = $id
    ");

if($sql){
    header('Location:../../mobil.php ');
}else{
}
}

function upload(){
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFIle = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //cek apakah ada gambar yg di upload
    if( $error === 4 ) {
        echo "<script>
            alert('pilih gambar terlrbih dahulu');
            </script>";

        return false;
    }

    // cek apakah yg di upload adalah gambar
    $ekstensiGambarValid = ['jpg', 'png', 'jpeg'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    // if( !in_array($ekstensiGambar, $ekstensiGambarValid)){
    //     echo "<script>
    //         alert('bukan gambar yang anda uoload');
    //         </script>";

    //     return false;
    // }

    //cek ukuran file jika besar
    if ( $ukuranFIle > 2000000 ) {
        echo "<script>
            alert('ukuran gambar terlalu besar');
            </script>";

        return false;      
    }

    //lolos pengecekan, gambar siap upload
    //generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.'; 
    $namaFileBaru .= $ekstensiGambar; 

    move_uploaded_file($tmpName, '../../assets/img/' . $namaFileBaru);

    return $namaFileBaru;
}