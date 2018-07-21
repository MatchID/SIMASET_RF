<?php 
error_reporting(0);
// untuk akses root modul
if (($_SESSION[Kode_Akses_Aset] == '5') or ($_SESSION[Kode_Akses_Aset] == '2') and ($_SESSION[Level_Aset] !== '4') ){
	
	
	if ($_GET[act] == "detail_aset"){
		if ($_GET[prt] == "cetak"){
				echo "<script>window.open('aset/cetak/pindah/cetak.keadaan-laporan.php?print=unit&unit=".$_REQUEST[unit]."','_blank')</script>";	
		}

?>


<!-- Judul Halaman -->
<div role='main'>
          <div class=''>
            <div class='page-title'>
              <div class='title_left'>
                <h3>Menu Ex Inventaris Aset</h3>
              </div>
<!-- Batas Judul Halaman -->

<!-- Isi Halaman -->
<div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Data Ex Inventaris UIN Raden Fatah Palembang <small>Sistem Informasi Manajemen Aset</small></h2>
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
                            <th>Ex Lokasi</th>
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
										where rf_aset_unit.ID_Unit='$_REQUEST[unit]' and not rf_aset_barang_detail.ID_Hapus = '0'
										");
						
						$no=0;
						
						while($w=mysql_fetch_array($q)){
							
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
                            </td>
                          </tr>
							";
						}else if ($w[ID_Kondisi]== null){
						echo "
                          <tr class='even pointer'>
                            <td>$no</td>
                            <td>$w[Nama_Tipe]</td>
                            <td>$w[Merk_Barang]</td>
                            <td><center>Belum Di Register</td>
                            <td>$w[Tahun_Barang]</td>
                            <td>$w[Nama_Unit]</td>
                            </td>
                          </tr>
							";
						}else{
						echo "
                          <tr class='even pointer'>
                            <td>$no</td>
                            <td>$w[Nama_Tipe]</td>
                            <td>$w[Merk_Barang]</td>
                            <td><center>$w[Inventaris]<br>$w[ID_Inventaris].$w[ID_Brg_Detail]</td>
                            <td>$w[Tahun_Barang]</td>
                            <td>$w[Nama_Unit]</td>
                            </td>
                          </tr>
							";
						}
							
							
				
						}
					  ?>
                        </tbody>
                      </table>
                      
                    </div>
                  </div>
                </div>
              </div>


<?php
		
	}else{
		if ($_GET[prt] == "cetak"){
			echo "<script>window.open('aset/cetak/pindah/cetak.keadaan-laporan.php?','_blank')</script>";
		}

?>


<!-- Judul Halaman -->
<div role='main'>
          <div class=''>
            <div class='page-title'>
              <div class='title_left'>
                <h3>Menu Ex Inventaris Aset</h3>
              </div>
<!-- Batas Judul Halaman -->

<!-- Isi Halaman -->
<div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Data Ex Inventaris UIN Raden Fatah Palembang <small>Sistem Informasi Manajemen Aset</small></h2>
                    <ul class='nav navbar-right panel_toolbox'>
                    </ul>
                    <div class='clearfix'></div>
                  </div>

                  <div class='x_content'>

                    <div class='table-responsive'>
                      <table id="datatable-buttons" class='table table-striped table-bordered'>
					   
                        <thead>
                          <tr>
                            <th><center>No</th>
                            <th><center>Nama Unit Kerja</th>
                            <th><center>Ex Aset UIN Raden Fatah</th>
                            <th><center>Action</th>
                          </tr>
                        </thead>
                        <tbody>
						
						<?php
						
						$q = mysql_query('SELECT *
										FROM rf_aset_unit
										');
						
						$no=0;
						
						while($w=mysql_fetch_array($q)){
							
							$aa1 = mysql_query("Select * from rf_aset_barang_detail left join rf_aset_unit on rf_aset_barang_detail.ID_Unit=rf_aset_unit.ID_Unit
							where rf_aset_barang_detail.ID_Kondisi='1' and not rf_aset_barang_detail.ID_Hapus = '0'");
							$waa1=mysql_num_rows($aa1);
							
							$a2 = mysql_query("Select * from rf_aset_barang_detail left join rf_aset_unit on rf_aset_barang_detail.ID_Unit=rf_aset_unit.ID_Unit
							where rf_aset_unit.ID_Unit=$w[ID_Unit] and not rf_aset_barang_detail.ID_Kondisi='2' and not rf_aset_barang_detail.ID_Hapus = '0'");
							$wa2=mysql_num_rows($a2);
						$no++;
								

						echo "
                          <tr>
                            <td>$no</td>
                            <td>$w[Nama_Unit]</td>
                            <td><center>$wa2 Buah</td>
                            <td><a href='?menu=lap_hapus&act=detail_aset&unit=$w[ID_Unit]'><center>Detail</a></td>
                          </tr>
							";
						}
							
							
				
						
					  ?>
                        </tbody>
                          <tr>
                            <td colspan=2><center><B>Total Ex Aset UIN Raden Fatah</td>
                            <td><center><B><?php echo $waa1; ?> Buah</td>
                            <td><center><B>-</td>
                          </tr>
                      </table>
                      
                    </div>
                  </div>
                </div>
              </div>


<?php
	
	}
}else{
		if (empty(include "src/error/module_403.html")){
			echo "<script>window.location = '../../?r=403'</script>";
		}
    } 
?>   