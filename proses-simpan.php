<?php
// Panggil koneksi database
require_once "config/database.php";

// date_default_timezone_set('Asia/Jakarta');
// $nama_hari = array(
//     'Minggu',
//     'Senin',
//     'Selasa',
//     'Rabu',
//     'Kamis',
//     'Jumat',
//     'Sabtu'
// );
// $indeks_hari = date('w');
// echo "Hari ini adalah " . $nama_hari[$indeks_hari];
// die();

if (isset($_POST['simpan'])) {
	$nama_guru           = mysqli_real_escape_string($db, trim($_POST['nama_guru']));
	$mapel          = mysqli_real_escape_string($db, trim($_POST['mapel']));
	$kelas  = mysqli_real_escape_string($db, trim($_POST['kelas']));
	$ruangan  = mysqli_real_escape_string($db, trim($_POST['ruangan']));
	$hari  = mysqli_real_escape_string($db, trim($_POST['hari']));
	$jam_mulai  = mysqli_real_escape_string($db, trim($_POST['jam_mulai']));
	$jam_selesai  = mysqli_real_escape_string($db, trim($_POST['jam_selesai']));

	// perintah query untuk menyimpan data ke tabel tbl_ajar
	$query = mysqli_query($db, "INSERT INTO tbl_ajar(nama_guru,
													 mapel,
													 kelas,
													 ruangan,
													 hari,
													 jam_mulai,
													 jam_selesai)
											  VALUES('$nama_guru',
													 '$mapel',
													 '$kelas',
													 '$ruangan',
													 '$hari',
													 '$jam_mulai',
													 '$jam_selesai')");

	// cek hasil query
	if ($query) {
		// jika berhasil tampilkan pesan berhasil insert data
		header('location: index.php?alert=2');
	} else {
		// jika gagal tampilkan pesan kesalahan
		header('location: index.php?alert=1');
	}
}
