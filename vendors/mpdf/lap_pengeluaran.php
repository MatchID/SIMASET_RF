<script src="../js/jquery.ui.datepicker.js"></script>
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<?php
include_once "../dwo.lib.php";
include_once "../db.mysql.php";
include_once "../connectdb.php";
 
 //include_once "../ClassRC.php";
 
include("mpdf.php");
  
$mpdf=new mPDF('c'); 
$mpdf->mirrorMargins = true;
$mpdf->SetDisplayMode('fullpage','two');

$mpdf->AddPage('P',100);
$tx=lap();
$html ="$tx ";
$mpdf->WriteHTML($html);


function lap(){
	$tgl=date('Y-m-d');
 
$res="$res



<!doctype html>
<html>
<head>

</head>

<title>Laporan Pengeluaran</title>
<body>
  <div align='center'>
    <strong>Perusahaan Kue Kering Cahaya Baru</strong><br />
Jl. Jend. Bambang Utoyo Lr. Sianjur 2 No. 414 Palembang<br />
<br>
  <table align='center' width='200'>
  <tr>
    <th scope='row'>Tanggal</th>
    <td>:</td><td>$tgl</td>
  </tr>
  
</table>
<br>

              <h3 class='box-title'>Data Pengeluaran Perusahaan</h3>
 
  <div class='table-responsive'>
    <table border='1' align='center' class='table table-bordered'>
      <thead>
        <tr>
          <td class=ttl width=20 align=center>No</td>
<td class=ttl >IdPengeluaran</td>
<td class=ttl >Tanggal</td>
<td class=ttl >Keterangan</td>
<td class=ttl >Keterangan2</td>
<td class=ttl >Total Biaya</td>
        </tr>
      </thead>
      <tbody>
         ";

if (empty($_POST[kat])) $wh=""; else $wh="where a.$_POST[kat] like'$_POST[Cari]'";
$r=mysql_query("select * from pengeluaran where IdPengeluaran   $wh "); while($w=mysql_fetch_array($r)){
$n++;
$qry = mysql_query("select SUM(Biaya) as Biaya from pengeluaran");
$data = mysql_fetch_array($qry);
 


$res="$res
<tr bgcolor=$warna>
<td align=center >$n</td>
<td class=ul >$w[IdPengeluaran]</td>
<td class=ul >$w[Tanggal]</td>
<td class=ul >$w[Keterangan]</td>
<td class=ul >$w[Keterangan2]</td>
<td class=ul >$w[Biaya]</td>
</tr>
";
        }
$res="$res
<tr> 
<td >Jumlah Data </td><td>$n </td> 
<td colspan=3>Total Biaya</td>
<td>$data[Biaya]</td>
</tr>
      </ tbody>
    </table>
	<br>
  </div>
  <p align='right'>Pimpinan<br />
      Perusahaan Kue Kering<br />
      Cahaya Baru</p>
    <p align='right'>&nbsp;</p>
    <p align='right'><strong>Hemas Candra</strong><br />
	                                          <br />
                                                     <br />
</div>
</p>
</body>
</html>



";

return $res;
}




$mpdf->Output();
exit;

 

 
?>
 
 
 