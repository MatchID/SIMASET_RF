<?php 
error_reporting(0);
// untuk akses root modul
if (($_SESSION[Kode_Akses_Aset] == '5') or ($_SESSION[Kode_Akses_Aset] == '2') and ($_SESSION[Level_Aset] !== '4') ){
	
	
	if ($_GET[act] == "cetak"){
				echo "<script>window.open('aset/cetak/permintaan/cetak.permintaan-laporan.php','_blank')</script>";
	}
?>


<!-- Judul Halaman -->
<div role='main'>
          <div class=''>
            <div class='page-title'>
              <div class='title_left'>
                <h3>Menu Permohonan Aset</h3>
              </div>
<!-- Batas Judul Halaman -->

<!-- Isi Halaman -->
<div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Data Inventaris UIN Raden Fatah Palembang <small>Sistem Informasi Manajemen Aset</small></h2>
                    <ul class='nav navbar-right panel_toolbox'>
                    </ul>
                    <div class='clearfix'></div>
                  </div>

                  <div class='x_content'>

                    <div class='table-responsive'>
                      <table id="datatable-buttons" class='table table-striped table-bordered'>
					  
                          <a href="?menu=lap_pengajuan&act=cetak&ra=" button type="cancel" class="btn btn-primary">Cetak Laporan</button></a>
						  
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
						
						<?php
						
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
							where ID_Unit=$w[ID_Unit] ");
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
								

						echo "
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
						
					  ?>
                        </tbody>
						<?php 
						echo "
                          <tr>
                            <td colspan=2><center>Total</td>
                            <td><center>$waa1 Buah</td>
                            <td><center>$waas Buah</td>
                            <td><center>$waa2 Buah</td>
                            <td><center>$waa3 Buah</td>
                            <td><center>$waa Buah</td>
                          </tr>
							";?>
                      </table>
                      
                    </div>
                  </div>
                </div>
              </div>


<?php
	
}else{
		if (empty(include "src/error/module_403.html")){
			echo "<script>window.location = '../../?r=403'</script>";
		}
    } 
?>   