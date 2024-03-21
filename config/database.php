<?php
// deklarasi parameter koneksi database
$server   = "localhost";
$username = "root";
$password = "root";
$database = "jadwal_ajar";

// koneksi database
$db = mysqli_connect($server, $username, $password, $database);

// cek koneksi
if (!$db) {
    die('Koneksi Database Gagal : ' . mysqli_connect_error());
}
?>