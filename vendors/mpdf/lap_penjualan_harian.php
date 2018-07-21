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
$r=mysql_query("select * from penjualan2 where Nota='$_GET[Nota]'  "); 
$w2=mysql_fetch_array($r); 
$res="$res 


<!doctype html>
<html>
<head>

</head>

<title>Laporan Penjualan</title>
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

              <h3 class='box-title'>Data Penjualan</h3>
 
  <div class='table-responsive'>
    <table border='1' align='center' class='table table-bordered'>
      <thead>
        <tr>
<td class=ttl width=20 align=center>No</td>
<td class=ttl >Nota</td>
<td class=ttl >Nama Kasir</td>
<td class=ttl >IdPelanggan</td>
<td class=ttl >Nama Pelanggan</td>
<td class=ttl >Tanggal</td>
<td class=ttl >SubTotal</td>
        </tr>
      </thead>
      <tbody>
         ";


 $r=mysql_query("select * from penjualan2 where Nota='$_GET[Nota]'  "); 
 while($w=mysql_fetch_array($r)){
	 $a=$a+$w[SubTotal];
$n++;
$qry = mysql_query("select SUM(SubTotal) as SubTotal from penjualan2");
$data = mysql_fetch_array($qry);
$res="$res
<tr bgcolor=$warna>
<td align=center >$n</td>
<td class=ul >$w[Nota]</td>
<td class=ul >$w[Username]</td>
<td class=ul >$w[IdPelanggan]</td>
<td class=tt >$w[NamaPelanggan]</td>
<td class=ul >$w[Tanggal]</td>
<td class=ul >$w[SubTotal]</td>
</tr>
";
        }
$res="$res
<tr> 
<td >Jumlah Data </td><td align='center'>$n </td> 
<td colspan=4>Total Penjualan</td>
<td>$data[SubTotal]</td>
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
 
 
 