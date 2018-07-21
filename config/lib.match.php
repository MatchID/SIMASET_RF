<?php

function BerhasilSimpan($back, $tmr = 1500) {
  $_tmr = $tmr/1000;
  echo Konfirmasi("Berhasil", 
    "Data berhasil Di proses.<br />
    Tampilan akan kembali ke semula dalam $_tmr detik.
    <hr size=1 color=silver />
    Atau klik: <a href='$back'>[ Kembali ]</a>");
  echo "<script type='text/javascript'>window.onload=setTimeout('window.location=\"$back\"', $tmr);</script>";
}

function BerhasilHapus($back, $tmr = 1500) {
  $_tmr = $tmr/1000;
  echo Konfirmasi("Berhasil", 
    "Data berhasil dihapus.<br />
    Tampilan akan kembali ke semula dalam $_tmr detik.
    <hr size=1 color=silver />
    Atau klik: <a href='$back'>[ Kembali ]</a>");
  echo "<script type='text/javascript'>window.onload=setTimeout('window.location=\"$back\"', $tmr);</script>";
}

function FileSalah($back) {
  echo Konfirmasi("Gagal", 
    "File yang anda pilih tidak diperbolehkan.<br />
    <hr size=1 color=silver />
    klik: <a href='$back'>[ Kembali ]</a>");
  echo "<script type='text/javascript'>window.onload=('window.location=\"$back\"');</script>";
}

function Konfirmasi($jdl, $isi) {
  $Gbr = 'aset/images/gear.gif';
  if (!file_exists($Gbr)) $Gbr = "../".$Gbr;
  Return "<p><center><table class=box cellspacing=1 cellpadding=4>
  <tr><th class=ttl colspan=2>$jdl</th></tr>
  <tr><td><img src='$Gbr'></td>
  <td>$isi</td></tr></table></center></p>";
}

function histori($judul_histori, $deskripsi_histori) {
	$Akun = $_SESSION[Kode_Aset];
	$y = date( "Y" );
	$m = date( "m" );
	$d = date( "d" );
	$Tgl = $y."-".$m."-".$d;
	$Waktu	= date("H:i:s");
	
	mysql_query("insert into rf_aset_histori_sistem set 
				ID_Histori=null,
				ID_Akun='$Akun',
				Judul_Histori='$judul_histori',
				Tanggal_Histori='$Tgl',
				Waktu_Histori='$Waktu',
				Deskripsi_Histori='$deskripsi_histori' ");
}

function masukGambar($nama){
 											$fileName = $_FILES['$nama']['name'];
											$fileSize = $_FILES['$nama']['size'];
											$fileError = $_FILES['$nama']['error'];
											if($fileSize > 0 || $fileError == 0){
											$move = move_uploaded_file($_FILES['$nama']['tmp_name'], 'berkas/'.$fileName);}
											
											$hasil="berkas/$fileName" ;
											return $hasil;
	/*
	harus menggunakan  >>> <form role='form' action='' method='post' enctype='multipart/form-data' id=fom3 > <<<
	pemanggilan menggunakan >>> $foto = masukGambar("NamePost"); <<<
	simpan link foto ke database >>> $foto <<<
	*/
 }

?>
