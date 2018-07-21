<?php
session_start();
//fungsi untuk outomatis logout

function login_validate_aset() {
	//ukuran waktu dalam detik
	$timer=1800;
	//untuk menambah masa validasi
	$_SESSION["expires_aset"] = time() + $timer;
}

function login_check_aset() {
	//mengambil nilai session pertama
	$exp_time = $_SESSION["expires_aset"];
	
	//jika waktu sistem lebih kecil dari nilai waktu session
	if (time() < $exp_time) {
		//panggil fungsi dan tambah waktu session
		login_validate_aset();
		return true; 
	}
	else{
		//jika waktu session lebih kecil dari waktu session atau lewat batas
		//unset session
		unset($_SESSION["expires_aset"]);
		return false; 
	histori("Logout", "Keluar Paksa Dari Sistem Karena Habis Waktu");
	}
}

?>