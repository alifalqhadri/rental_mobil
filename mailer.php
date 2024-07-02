<?php 
require "koneksi.php";


use PHPMailer\PHPMailer\PHPMailer ; 
use PHPMailer\PHPMailer\Exception ; 

$email = $_POST['email'];
$username = $_POST['username'];


$kode = "<a href='http://localhost/rental/verif.php?gmail=$email'>Verif Di Sini</a>";
    

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST['daftar'])){


    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host= 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'fahrulshevavanjovie@gmail.com';
    $mail->Password = 'hqdj btwg fsnx apyo';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom("admin@gmail.com");

    $mail->addAddress($email);

    $mail->isHTML(true);

    $mail->Subject = "Verifikasi";

    $mail->Body = "Haloo $username, Silahkan verif di sini  $kode";

    $cekemail = $email; // Ganti dengan email yang diinputkan dari form
    $sql = mysqli_query($conn , "SELECT * FROM tbl_akun WHERE email='$cekemail'");
    
    

    if(mysqli_num_rows($sql) > 0 ){
        echo "
        <script>
        alert('Email Sudah Terdaftar')
        document.location.href='registrasi.php';
        </script>
        "; 
    }else{
    
    $mail->send();
    // Masukan Data Ke Database
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $password = $_POST['password'];

    mysqli_query($koneksi , "INSERT INTO tbl_akun SET
    nama_user = '$nama',
    username = '$username',
    alamat = '$alamat',
    password = '$password',
    email = '$email'
    ");

    echo "
    <script>
    alert('Email berhasil di kirim, silahkan mengeceknya')
    location = 'login.php'
    </script>
    ";
    }



    

}
