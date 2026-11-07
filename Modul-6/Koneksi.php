<?php
$host = 'localhost';
$username = 'root';
$password = '';
$db = 'penjualan';

$conn = mysqli_connect($host, $username, $password, $db);
if (!$conn){
    die('koneksi gagal' . mysqli_connect_error($conn));
} 

?>