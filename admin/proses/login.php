<?php
require '../koneksi.php';

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = mysqli_query($koneksi, "SELECT * FROM tbl_admin 
    WHERE 
    username = '$username' AND
    password = '$password'
    ");
    
    $cek = mysqli_num_rows($sql);
	
    if($cek == 1){
		$data = mysqli_fetch_assoc($sql);
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
        alert('Login Gagal')
        document.location.href = '../login.php'
        </script>
        ";
    }

}
