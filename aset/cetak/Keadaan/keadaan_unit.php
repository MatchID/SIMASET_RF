<?php
require_once "../../../config/lib.session.php";
include_once "../../../config/lib.match.php";
include_once "../../../config/db.mysql.php";
include_once "../../../config/db.connect.php";
include_once "../../../config/fungsi.indo.php";
 
 //include_once "../ClassRC.php";
 
include("../../../vendors/mpdf/mpdf.php");
  
$mpdf=new mPDF('c');
//$mpdf=new mPDF('c','A4-L'); 
$mpdf->mirrorMargins = true;
$mpdf->SetDisplayMode('fullpage','two');
$mpdf->AddPage('P',100);

$tx=lap();
$html ="$tx ";
$mpdf->WriteHTML($html);
function lap(){  
$tgl=date('Y-m-d');	
$r=mysql_query("select * from rf_aset_barang left join rf_aset_unit on rf_aset_barang.ID_Unit=rf_aset_unit.ID_Unit where rf_aset_barang.ID_Unit='$_REQUEST[unit]'"); 
$w2=mysql_fetch_array($r); 
$res="$res 
<html lang='en'>
  <head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <title>Sistem Informasi Manajemen Aset | Universitas Islam Negeri Raden Fatah Palembang</title>
	
    <!-- Datatables -->
    <link href='../../../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css' rel='stylesheet'>
    <link href='../../../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css' rel='stylesheet'>
    <link href='../../../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css' rel='stylesheet'>
    <link href='../../../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css' rel='stylesheet'>
    <link href='../../../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css' rel='stylesheet'>

  </head>

  <body class='nav-md'>
	
<table width='100%'>
<tr>
<td width='25' align='center'><img src='../../images/uin.png' width='17%'></td>
<td width='50' align='center'><h3>KEMENTERIAN AGAMA RI</h3> <h2>UNIVERSITAS ISLAM NEGERI (UIN) <br>RADEN FATAH PALEMBANG</h2></td>
</tr>
</table>
<div align='center'>
<font size='2'; text-align='center'> Jl. Prof. K. H. Zaenal Abidin Fikry No. 1 Km. 3,5 Palembang 30126 Telp. (0711) 354668 Fax. (0711) 356209 website : http://radenfatah.ac.id</font>
</div><hr>
</hr>

      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class='row invoice-info'>
      <div class='col-sm-4 invoice-col' align='center'>
       DAFTAR INVENTARIS<br><b style='text-transform:uppercase'>".$w2[Nama_Unit]."<br><b>UIN RADEN FATAH PALEMBANG
      </div>
      <!-- /.col -->
      <div class='col-sm-4 invoice-col'>
         
        <address>
          
        </address>
      </div>
      <!-- /.col -->
      <div class='col-sm-4 invoice-col'>
	  <br>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class='row'>
      <div class='col-xs-12 table-responsive'>
        <table border='1' width='100%' height='54' cellspacing='0' class='table table-striped'  >
          <thead>
                          <tr>
                            <th rowspan=2>No</th>
                            <th rowspan=2>Nama Aset</th>
                            <th rowspan=2>Merk</th>
                            <th rowspan=2>No Inventaris</th>
                            <th rowspan=2>Tahun</th>
                            <th colspan=2>Harga (Rp)</th>
                            <th colspan=3>Keadaan</th>
                            <th rowspan=2>Keterangan</th>
                          </tr>
						  <tr>
                            <th scope=col><center>Satuan</th>
                            <th scope=col><center>Total</th>
                            <th scope=col><center>Normal</th>
                            <th scope=col><center>Rusak</th>
                            <th scope=col><center>Diperbaiki</th>
							</tr>
          </thead>
          <tbody>
        ";
						
						$q = mysql_query("SELECT *
										FROM rf_aset_barang left join rf_aset_kategori on rf_aset_barang.ID_Kategori=rf_aset_kategori.ID_Kategori
										left join rf_aset_unit on rf_aset_barang.ID_Unit=rf_aset_unit.ID_Unit
										left join rf_aset_barang_tipe on rf_aset_barang.ID_Tipe=rf_aset_barang_tipe.ID_Tipe
										where rf_aset_unit.ID_Unit='$_REQUEST[unit]'
										");
						
						$no=0;
						
						while($w=mysql_fetch_array($q)){
							
							
							$aa = mysql_query("Select * from rf_aset_barang_detail left join rf_aset_unit on rf_aset_barang_detail.ID_Unit=rf_aset_unit.ID_Unit where rf_aset_barang_detail.ID_Unit='$_REQUEST[unit]' and rf_aset_barang_detail.ID_Hapus = '0'");
							$waa=mysql_num_rows($aa);
							
							$aa1 = mysql_query("Select * from rf_aset_barang_detail left join rf_aset_unit on rf_aset_barang_detail.ID_Unit=rf_aset_unit.ID_Unit
							where rf_aset_barang_detail.ID_Kondisi='1' and rf_aset_barang_detail.ID_Unit='$_REQUEST[unit]' and rf_aset_barang_detail.ID_Hapus = '0'");
							$waa1=mysql_num_rows($aa1);
							
							$aa2 = mysql_query("Select * from rf_aset_barang_detail left join rf_aset_unit on rf_aset_barang_detail.ID_Unit=rf_aset_unit.ID_Unit
							where rf_aset_barang_detail.ID_Kondisi='2' and rf_aset_barang_detail.ID_Unit='$_REQUEST[unit]' and rf_aset_barang_detail.ID_Hapus = '0'");
							$waa2=mysql_num_rows($aa2);
							
							$aa3 = mysql_query("Select * from rf_aset_barang_detail left join rf_aset_unit on rf_aset_barang_detail.ID_Unit=rf_aset_unit.ID_Unit
							where rf_aset_barang_detail.ID_Kondisi='3' and rf_aset_barang_detail.ID_Unit='$_REQUEST[unit]' and rf_aset_barang_detail.ID_Hapus = '0'");
							$waa3=mysql_num_rows($aa3);							
							
							
							$a1 = mysql_query("Select * from rf_aset_barang_detail where ID_Tipe=$w[ID_Tipe] and ID_Barang=$w[ID_Barang] and ID_Unit=$w[ID_Unit] and rf_aset_barang_detail.ID_Hapus = '0' ORDER BY ID_Brg_Detail ASC LIMIT 1 ");
							$wa1=mysql_fetch_array($a1);
							
							$a2 = mysql_query("Select * from rf_aset_barang_detail where ID_Tipe=$w[ID_Tipe] and ID_Barang=$w[ID_Barang] and ID_Unit=$w[ID_Unit] and rf_aset_barang_detail.ID_Hapus = '0' ORDER BY ID_Brg_Detail DESC LIMIT 1 ");
							$wa2=mysql_fetch_array($a2);
							
							
							
							$az = mysql_query("Select * from rf_aset_barang_detail left join rf_aset_unit on rf_aset_barang_detail.ID_Unit=rf_aset_unit.ID_Unit
							left join rf_aset_barang on rf_aset_barang_detail.ID_Barang=rf_aset_barang.ID_Barang
							where rf_aset_unit.ID_Unit=$w[ID_Unit] and rf_aset_barang.ID_Barang=$w[ID_Barang] and rf_aset_barang_detail.ID_Hapus = '0' ");
							$wa12=mysql_num_rows($az);
							
							$az1 = mysql_query("Select * from rf_aset_barang_detail left join rf_aset_unit on rf_aset_barang_detail.ID_Unit=rf_aset_unit.ID_Unit
							left join rf_aset_barang on rf_aset_barang_detail.ID_Barang=rf_aset_barang.ID_Barang
							where rf_aset_unit.ID_Unit=$w[ID_Unit] and rf_aset_barang_detail.ID_Kondisi='1' and rf_aset_barang.ID_Barang=$w[ID_Barang] and rf_aset_barang_detail.ID_Hapus = '0' ");
							$wa112=mysql_num_rows($az1);
							
							$az2 = mysql_query("Select * from rf_aset_barang_detail left join rf_aset_unit on rf_aset_barang_detail.ID_Unit=rf_aset_unit.ID_Unit
							left join rf_aset_barang on rf_aset_barang_detail.ID_Barang=rf_aset_barang.ID_Barang
							where rf_aset_unit.ID_Unit=$w[ID_Unit] and rf_aset_barang_detail.ID_Kondisi='2' and rf_aset_barang.ID_Barang=$w[ID_Barang] and rf_aset_barang_detail.ID_Hapus = '0' ");
							$wa212=mysql_num_rows($az2);
							
							$az3 = mysql_query("Select * from rf_aset_barang_detail left join rf_aset_unit on rf_aset_barang_detail.ID_Unit=rf_aset_unit.ID_Unit
							left join rf_aset_barang on rf_aset_barang_detail.ID_Barang=rf_aset_barang.ID_Barang
							where rf_aset_unit.ID_Unit=$w[ID_Unit] and rf_aset_barang_detail.ID_Kondisi='3' and rf_aset_barang.ID_Barang=$w[ID_Barang] and rf_aset_barang_detail.ID_Hapus = '0' ");
							$wa312=mysql_num_rows($az3);
						
							$satuan = number_format ($w[Harga_Satuan], 0, ',', '.');
						
							$jumlah = number_format ($wa12 * $w[Harga_Satuan], 0, ',', '.');
							$jumlah2a = $wa12 * $w[Harga_Satuan];
							
							$jumlah2[] = $jumlah2a;
						
						
						$no++;
						if ($wa1 == null){
							$reg = "Belum Di Register";
$res="$res 
                          <tr class='even pointer'>
                            <td>$no</td>
                            <td>$w[Nama_Tipe]</td>
                            <td>$w[Merk_Barang]</td>
                            <td>$reg</td>
                            <td>$w[Tahun_Barang]</td>
                            <td>$satuan</td>
                            <td>$jumlah</td>
                            <td>$wa112 Buah</td>
                            <td>$wa212 Buah</td>
                            <td>$wa312 Buah</td>
                            <td>$w[Deskripsi_Barang]</td>
                            </td>
                          </tr>
							";
						}else{
							$reg =$wa1[Inventaris]." <br> ". $w[ID_Inventaris].".<b> ".$wa1[ID_Brg_Detail]." - ".$wa2[ID_Brg_Detail]."</b>";
$res="$res 
                          <tr class='even pointer'>
                            <td>$no</td>
                            <td>$w[Nama_Tipe]</td>
                            <td>$w[Merk_Barang]</td>
                            <td><center>$reg</td>
                            <td>$w[Tahun_Barang]</td>
                            <td>$satuan</td>
                            <td>$jumlah</td>
                            <td>$wa112 Buah</td>
                            <td>$wa212 Buah</td>
                            <td>$wa312 Buah</td>
                            <td>$w[Deskripsi_Barang]</td>
                            </td>
                          </tr>
							";
						}
                          
 }
 
 $total = number_format (array_sum($jumlah2), 0, ',', '.');

$cekrektor = mysql_query('SELECT * FROM rf_aset_pejabat where Status_Pejabat=1 and Jabatan_Pejabat=Rektor');
$rektor=mysql_fetch_array($cekrektor);

$cekbmn = mysql_query("SELECT * FROM rf_aset_pejabat where Status_Pejabat='1' and Jabatan_Pejabat='Kasubag BMN' ");
$bmn=mysql_fetch_array($cekbmn);

$cekumum = mysql_query("SELECT * FROM rf_aset_pejabat where Status_Pejabat='1' and Jabatan_Pejabat='Kabag Umum'");
$umum=mysql_fetch_array($cekumum);

   $res="$res        
          
           
          </tbody>
        </table>
		<br>
		<table width='40%'>
<tr>
<td>Total Seluruh Aset Normal</td>
<td>: ".$waa1." Unit</td>
</tr>

<tr>
<td>Total Seluruh Aset Rusak</td>
<td>: ".$waa2." Unit</td>
</tr>

<tr>
<td>Total Seluruh Aset Dalam Perbaikan</td>
<td>: ".$waa3." Unit</td>
</tr>
<tr>
<td>Total Seluruh Aset</td>
<td>: ".$waa." Unit</td>
</tr>
<tr>
<td>Total Aset</td>
<td>: Rp. ".$total.",-</td>
</tr>

</table>
<br><br><br>
		<table width='100%'>
  <tr>
    <td width='68%'>&nbsp;</td>
    <td style='text-transform:uppercase'><center>Mengetahui,<br>".$bmn[Jabatan_Pejabat]."&nbsp;</td>
  </tr>
  <tr>
    <td width='68%'>&nbsp;</td>
    <td style='text-transform:uppercase'><center><br><br><br><br><br><b><u>".$bmn[Nama_Pejabat]."</b><br>NIP : ".$bmn[NIP]."&nbsp;</td>
  </tr>
</table>
        " ;
			 return $res;
			 }



$mpdf->Output();
exit;

?>  