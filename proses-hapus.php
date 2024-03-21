<?php
// Panggil koneksi database
require_once "config/database.php";

if (isset($_GET['id'])) {

	$id = $_GET['id'];
	
	// perintah query untuk menghapus data pada tabel tbl_ajar
	$query = mysqli_query($db, "DELETE FROM tbl_ajar WHERE id='$id'");

	// cek hasil query
	if ($query) {
		// jika berhasil tampilkan pesan berhasil delete data
		header('location: index.php?alert=4');
	} else {
		// jika gagal tampilkan pesan kesalahan
		header('location: index.php?alert=1');
	}	
}							
?>