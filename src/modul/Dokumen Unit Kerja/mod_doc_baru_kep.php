<?php 
error_reporting(0);
// untuk akses root Unit Kerja
if (($_SESSION[Kode_Akses_Aset] !== '2') && ($_SESSION[Kode_Akses_Aset] !== '1') && ($_SESSION[Kode_Akses_Aset] !== '0')){
	//echo "Kode Menu Aset : ".$_SESSION[Kode_Menu_Aset].", Kode Akses Aset : ".$_SESSION[Kode_Akses_Aset].", Akses Aset : ".$_SESSION[Akses_Aset].", Status Aset : ".$_SESSION[Status_Aset].", Kode Aset : ".$_SESSION[Kode_Aset].", Nama Aset : ".$_SESSION[Nama_Aset].", Username Aset : ".$_SESSION[Username_Aset].", Level Aset : ".$_SESSION[Level_Aset].", Nama Level : ".$_SESSION[Jabatan_Aset].", Unit Level : ".$_SESSION[Unit_Aset]." === benar";
	
		if (($_SESSION[Level_Aset] == '7') || ($_SESSION[Level_Aset] == '3') || ($_SESSION[Level_Aset] == '5')  || ($_SESSION[Level_Aset] == '1')){
			if(($_SESSION[Kode_Menu_Aset] == '2')  || ($_SESSION[Kode_Menu_Aset] == '0')){
				//tu fakultas
			include "src/modul/Dokumen Unit Kerja/mod_tu-unit-kerja.php";
			}
		}
		
		if ($_GET[act] == "download_doc"){
			$q = mysql_query("SELECT *
										FROM rf_aset_doc where ID_Doc='$_GET[doc]'");
			$w=mysql_fetch_array($q);
			
				echo "<script>window.open('aset/doc_aset_uin/".$w[File_Doc]."','_blank')</script>";
			
		}
}else{
      if (empty(include "src/error/module_403.html")){
			echo "<script>window.location = '../../?r=403'</script>";
	}
}
?>   