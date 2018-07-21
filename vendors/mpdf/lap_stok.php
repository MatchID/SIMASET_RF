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

<title>Laporan Stok Produk</title>
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

              <h3 class='box-title'>Data Stok Produk Perusahaan</h3>
 
  <div class='table-responsive'>
    <table border='1' align='center' class='table table-bordered'>
      <thead>
        <tr>
         <td class=ttl width=20 align=center>No</td>
<td class=ttl >Id  Produk</td>
<td class=ttl >Nama Produk</td>
<td class=ttl >Jenis Produk</td>
<td class=ttl >Harga Produk</td>
<td class=ttl >Jumlah Produk</td>
        </tr>
      </thead>
      <tbody>
         ";

if (empty($_POST[kat])) $wh=""; else $wh="where a.$_POST[kat] like'$_POST[Cari]'";
$r=mysql_query("select * from produk where IdProduk   $wh "); while($w=mysql_fetch_array($r)){
$n++;
$qry = mysql_query("select SUM(JumlahProduk) as JumlahProduk from produk");
$data = mysql_fetch_array($qry);
 


$res="$res
<tr bgcolor=$warna>
<td align=center >$n</td>
<td class=ul >$w[IdProduk]</td>
<td class=ul >$w[NamaProduk]</td>
<td class=ul >$w[JenisProduk]</td>
<td class=ul >$w[HargaProduk]</td>
<td class=ul >$w[JumlahProduk]</td>
</tr>
";
        }
$res="$res
<tr> 
<td >Jumlah Data </td><td>$n </td> 
<td colspan=3>Jumlah Produk</td>
<td>$data[JumlahProduk]</td>
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
 
 
 