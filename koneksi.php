<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "rental_mobil";

$conn = mysqli_connect($server, $username, $password, $database);
$koneksi = mysqli_connect($server, $username, $password, $database);
session_start();


if (mysqli_connect_errno()) {
	echo "failed to connect to mysql" . mysqli_connect_errno();
	exit();
}

// if ($conn) {
// 	echo "Koneksi Success";
// }
