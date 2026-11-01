<?php
$servername = "localhost";
$user = "root";
$password = "";
$db   = "penjualan";

$koneksi = mysqli_connect($servername, $user, $password, $db);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>