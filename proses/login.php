<?php
require '../koneksi.php';

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = mysqli_query($koneksi, "SELECT * FROM tbl_akun 
    WHERE 
    email = '$email' AND
    password = '$password'
    ");
    $cek = mysqli_num_rows($sql);
    $data = mysqli_fetch_assoc($sql);
	
    if($email == $data['email'] && $password == $data['password'] ){
        if($data['status'] == 1){

            $_SESSION['user'] = $data;
            $_SESSION['login'] = true;
            echo "
            <script>
            alert('Login Berhasil')
            document.location.href = '../index.php'
            </script>
            ";
        }else{
            echo "
            <script>
            alert('Belum Verifikasi')
            document.location.href = '../login.php'
            </script>
            ";    
        }
    }else{
        echo "
        <script>
        alert('Login Gagal')
        document.location.href = '../login.php'
        </script>
        ";
    }

}
