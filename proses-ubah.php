<?php
// Panggil koneksi database
require_once "config/database.php";

if (isset($_POST['simpan'])) {
	if (isset($_POST['id'])) {
		$id           = $_POST['id'];
		$nama_guru           = mysqli_real_escape_string($db, trim($_POST['nama_guru']));
		$mapel          = mysqli_real_escape_string($db, trim($_POST['mapel']));
		$kelas  = mysqli_real_escape_string($db, trim($_POST['kelas']));
		$ruangan  = mysqli_real_escape_string($db, trim($_POST['ruangan']));
		$hari  = mysqli_real_escape_string($db, trim($_POST['hari']));
		$jam_mulai  = mysqli_real_escape_string($db, trim($_POST['jam_mulai']));
		$jam_selesai  = mysqli_real_escape_string($db, trim($_POST['jam_selesai']));


		// perintah query untuk mengubah data pada tabel tbl_ajar
		$query = mysqli_query($db, "UPDATE tbl_ajar SET nama_guru 	= '$nama_guru',
														mapel 		= '$mapel',
														kelas 		= '$kelas',
														ruangan 	= '$ruangan',
														hari 		= '$hari',
														jam_mulai 	= '$jam_mulai',
														jam_selesai = '$jam_selesai'
												  WHERE id 			= '$id'");

		// cek query
		if ($query) {
			// jika berhasil tampilkan pesan berhasil update data
			header('location: index.php?alert=3');
		} else {
			// jika gagal tampilkan pesan kesalahan
			header('location: index.php?alert=1');
		}
	}
}
