<?php 
error_reporting(0);
// untuk akses root Unit Kerja
if(($_SESSION[Kode_Menu_Aset] == '2') or ($_SESSION[Kode_Menu_Aset] == '4') or ($_SESSION[Kode_Menu_Aset] == '6')){
	//echo "Kode Menu Aset : ".$_SESSION[Kode_Menu_Aset].", Kode Akses Aset : ".$_SESSION[Kode_Akses_Aset].", Akses Aset : ".$_SESSION[Akses_Aset].", Status Aset : ".$_SESSION[Status_Aset].", Kode Aset : ".$_SESSION[Kode_Aset].", Nama Aset : ".$_SESSION[Nama_Aset].", Username Aset : ".$_SESSION[Username_Aset].", Level Aset : ".$_SESSION[Level_Aset].", Nama Level : ".$_SESSION[Jabatan_Aset].", Unit Level : ".$_SESSION[Unit_Aset]." === benar";
	
?>
<!-- Judul Halaman -->
<div role='main'>
          <div class=''>
            <div class='page-title'>
              <div class='title_left'>
                <h3>Menu Daftar Aset</h3>
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
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Aset</th>
                            <th>Merk</th>
                            <th>No Inventaris</th>
                            <th>Tahun</th>
                            <th>Lokasi</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
						
						<?php
						
						$q = mysql_query("SELECT *
										FROM rf_aset_barang left join rf_aset_kategori on rf_aset_barang.ID_Kategori=rf_aset_kategori.ID_Kategori
										left join rf_aset_unit on rf_aset_barang.ID_Unit=rf_aset_unit.ID_Unit
										left join rf_aset_barang_tipe on rf_aset_barang.ID_Tipe=rf_aset_barang_tipe.ID_Tipe
										left join rf_aset_barang_detail on rf_aset_barang.ID_Barang=rf_aset_barang_detail.ID_Barang
										left join rf_aset_kondisi on rf_aset_barang_detail.ID_Kondisi=rf_aset_kondisi.ID_Kondisi
										where rf_aset_unit.ID_Unit='$_SESSION[ID_Unit_Aset]' and rf_aset_barang_detail.ID_Hapus = '0'
										");
						
						$no=0;
							
						while($w=mysql_fetch_array($q)){
							
							$a = mysql_query("Select * from rf_aset_barang_detail left join rf_aset_unit on rf_aset_barang_detail.ID_Unit=rf_aset_unit.ID_Unit
							where rf_aset_unit.ID_Unit=$w[ID_Unit] and rf_aset_barang_detail.ID_Hapus = '0'");
							$totala=mysql_num_rows($a);
							
							$aa = mysql_query("Select * from rf_aset_barang_detail left join rf_aset_unit on rf_aset_barang_detail.ID_Unit=rf_aset_unit.ID_Unit
							where rf_aset_unit.ID_Unit=$w[ID_Unit] and rf_aset_barang_detail.ID_Hapus = '0' and rf_aset_barang_detail.ID_Kondisi='1'");
							$totals=mysql_num_rows($aa);
							
							$ar = mysql_query("Select * from rf_aset_barang_detail left join rf_aset_unit on rf_aset_barang_detail.ID_Unit=rf_aset_unit.ID_Unit
							where rf_aset_unit.ID_Unit=$w[ID_Unit] and rf_aset_barang_detail.ID_Hapus = '0' and rf_aset_barang_detail.ID_Kondisi='2'");
							$totalr=mysql_num_rows($ar);
							
							$ap = mysql_query("Select * from rf_aset_barang_detail left join rf_aset_unit on rf_aset_barang_detail.ID_Unit=rf_aset_unit.ID_Unit
							where rf_aset_unit.ID_Unit=$w[ID_Unit] and rf_aset_barang_detail.ID_Hapus = '0' and rf_aset_barang_detail.ID_Kondisi='3'");
							$totalp=mysql_num_rows($ap);
							
						$no++;
								

						if ($w[ID_Kondisi]== '2'){
						echo "
                          <tr class='even pointer'>
                            <td>$no</td>
                            <td>$w[Nama_Tipe]</td>
                            <td>$w[Merk_Barang]</td>
                            <td><center>$w[Inventaris]<br>$w[ID_Inventaris].$w[ID_Brg_Detail]</td>
                            <td>$w[Tahun_Barang]</td>
                            <td>$w[Nama_Unit]</td>
                            <td>$w[Nama_Kondisi]</td>
                            <td>Telah Dilaporkan</td>
                            </td>
                          </tr>
							";
						}else if ($w[ID_Kondisi]== '1'){
						echo "
                          <tr class='even pointer'>
                            <td>$no</td>
                            <td>$w[Nama_Tipe]</td>
                            <td>$w[Merk_Barang]</td>
                            <td><center>$w[Inventaris]<br>$w[ID_Inventaris].$w[ID_Brg_Detail]</td>
                            <td>$w[Tahun_Barang]</td>
                            <td>$w[Nama_Unit]</td>
                            <td>$w[Nama_Kondisi]</td>
                            <td>-</td>
                            </td>
                          </tr>
							";
						}else if ($w[ID_Kondisi]== null){}else{
						echo "
                          <tr class='even pointer'>
                            <td>$no</td>
                            <td>$w[Nama_Tipe]</td>
                            <td>$w[Merk_Barang]</td>
                            <td><center>$w[Inventaris]<br>$w[ID_Inventaris].$w[ID_Brg_Detail]</td>
                            <td>$w[Tahun_Barang]</td>
                            <td>$w[Nama_Unit]</td>
                            <td>$w[Nama_Kondisi]</td>
                            <td>Telah Diproses</td>
                            </td>
                          </tr>
							";
						}
							
							
				
						}
					  ?>
                        </tbody>
					<?php
						echo "<tr><td colspan=7></td></tr>
                          <tr>
                            <td colspan=3>Total Aset Normal</td>
                            <td colspan=5>$totals Buah</td>
                          </tr>
                          <tr>
                            <td colspan=3>Total Aset Rusak</td>
                            <td colspan=5>$totalr Buah</td>
                          </tr>
                          <tr>
                            <td colspan=3>Total Aset Diperbaiki</td>
                            <td colspan=5>$totalp Buah</td>
                          </tr>
                          <tr>
                            <td colspan=3>Total Aset</td>
                            <td colspan=5>$totala Buah</td>
                          </tr>
							";
					
					?>
						
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