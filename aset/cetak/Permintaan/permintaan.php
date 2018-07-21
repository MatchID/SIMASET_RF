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
$r=mysql_query("select * from rf_aset_barang where Tahun_Barang='2017'  "); 
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
       DAFTAR PERMOHONAN ASET<br><b>UIN RADEN FATAH PALEMBANG
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
                            <th rowspan=2><center>No</th>
                            <th rowspan=2><center>Nama Unit Kerja</th>
                            <th colspan=4><center>Permohonan Aset UIN Raden Fatah</th>
                            <th rowspan=2><center>Total</th>
                          </tr>
						  
						  <tr>
                            <th scope=col><center>Baru</th>
                            <th scope=col><center>Perbaikan</th>
                            <th scope=col><center>Pemindahan</th>
                            <th scope=col><center>Penghapusan</th>
						  </tr>
          </thead>
          <tbody>
        ";
						
						$q = mysql_query('SELECT *
										FROM rf_aset_unit
										');
						
						$no=0;
						
						while($w=mysql_fetch_array($q)){
							
							$aa = mysql_query("Select * from rf_aset_doc 
							where not rf_aset_doc.ID_Unit='0'");
							$waa=mysql_num_rows($aa);
							
							$aa1 = mysql_query("Select * from rf_aset_doc
							where rf_aset_doc.ID_Jenis_Doc='1' and not rf_aset_doc.ID_Unit='0'");
							$waa1=mysql_num_rows($aa1);
							
							$aa2 = mysql_query("Select * from rf_aset_doc
							where rf_aset_doc.ID_Jenis_Doc='4' and not rf_aset_doc.ID_Unit='0'");
							$waa2=mysql_num_rows($aa2);
							
							$aa3 = mysql_query("Select * from rf_aset_doc
							where rf_aset_doc.ID_Jenis_Doc='3' and not rf_aset_doc.ID_Unit='0'");
							$waa3=mysql_num_rows($aa3);
							
							$aas = mysql_query("Select * from rf_aset_doc 
							where rf_aset_doc.ID_Jenis_Doc='2' and not rf_aset_doc.ID_Unit='0'");
							$waas=mysql_num_rows($aas);
							
							
							$a = mysql_query("Select * from rf_aset_doc 
							where ID_Unit=$w[ID_Unit]");
							$wa=mysql_num_rows($a);
							
							$a1 = mysql_query("Select * from rf_aset_doc
							where rf_aset_doc.ID_Unit=$w[ID_Unit] and rf_aset_doc.ID_Jenis_Doc='1'");
							$wa1=mysql_num_rows($a1);
							
							$a2 = mysql_query("Select * from rf_aset_doc
							where rf_aset_doc.ID_Unit=$w[ID_Unit] and rf_aset_doc.ID_Jenis_Doc='4'");
							$wa2=mysql_num_rows($a2);
							
							$a3 = mysql_query("Select * from rf_aset_doc
							where rf_aset_doc.ID_Unit=$w[ID_Unit] and rf_aset_doc.ID_Jenis_Doc='3'");
							$wa3=mysql_num_rows($a3);
							
							$as = mysql_query("Select * from rf_aset_doc 
							where ID_Unit=$w[ID_Unit] and rf_aset_doc.ID_Jenis_Doc='2'");
							$was=mysql_num_rows($as);
							
						$no++;
		
		$res="$res
		<tr>
                            <td>$no</td>
                            <td>$w[Nama_Unit]</td>
                            <td><center>$wa1 Buah</td>
                            <td><center>$was Buah</td>
                            <td><center>$wa2 Buah</td>
                            <td><center>$wa3 Buah</td>
                            <td><center>$wa Buah</td>
                          </tr>
						";
                          
 }

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
<td>Total Permohonan Aset Baru</td>
<td>: ".$waa1." Unit</td>
</tr>

<tr>
<td>Total Permohonan Perbaikan Aset</td>
<td>: ".$waas." Unit</td>
</tr>

<tr>
<td>Total Permohonan Pemindahan Aset</td>
<td>: ".$waa2." Unit</td>
</tr>

<tr>
<td>Total Permohonan Penghapusan Aset</td>
<td>: ".$waa3." Unit</td>
</tr>
<tr>
<td>Total Seluruh Permohonan Aset</td>
<td>: ".$waa." Unit</td>
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