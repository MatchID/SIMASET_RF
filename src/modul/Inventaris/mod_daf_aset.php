<?php 
error_reporting(0);
// untuk akses root Unit Kerja
if (($_SESSION[Kode_Akses_Aset] == '0') || ($_SESSION[Kode_Akses_Aset] == '1')){
	
	
	if ($_GET[act] == "edit_aset"){
		$sql =mysql_query("select * from rf_aset_barang where ID_Barang='$_GET[aset]'");
			$data = mysql_fetch_array($sql);				
		?> 
	<!-- Isi Halaman -->
	
			<?php
		if(isset($_POST['edit'])){
			mysql_query("Update rf_aset_barang set 
									ID_Barang='$_REQUEST[barang]',
									Nama_Kategori='$_POST[nama]'
									where ID_Barang='$_REQUEST[barang]'");
									
								
									
									
									
  
							BerhasilSimpan("?menu=barang",500);
							histori("Edit Register Aset", "Edit Register Aset $_POST[nama]");
		}
	}else if ($_GET[act] == "delete_aset"){
//mysql_query("delete from rf_aset_kategori_barang where ID_Barang='$_REQUEST[aset]'" );
BerhasilHapus("?menu=reg_aset",500);
histori("Delete Register Aset", "Hapus Register Aset $_REQUEST[aset]");
	}else if ($_GET[act] == "detail_aset"){
?>


<!-- Judul Halaman -->
<div role='main'>
          <div class=''>
            <div class='page-title'>
              <div class='title_left'>
                <h3>Menu Detail Aset</h3>
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
										where rf_aset_unit.ID_Unit='$_REQUEST[unit]' and rf_aset_barang_detail.ID_Hapus = '0'
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
                            <td>$w[Nama_Kondisi]</td>
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
                            <td>Belum Ada</td>
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
                            <td>$w[Nama_Kondisi]</td>
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
?>


<!-- Judul Halaman -->
<div role='main'>
          <div class=''>
            <div class='page-title'>
              <div class='title_left'>
                <h3>Menu Data Aset</h3>
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
                            <th rowspan=2><center>No</th>
                            <th rowspan=2><center>Nama Unit Kerja</th>
                            <th colspan=4><center>Aset UIN Raden Fatah</th>
                            <th rowspan=2><center>Action</th>
                          </tr>
						  <tr>
                            <th scope=col><center>Normal</th>
                            <th scope=col><center>Rusak</th>
                            <th scope=col><center>Diperbaiki</th>
                            <th scope=col><center>Total</th>
							</tr>
                        </thead>
                        <tbody>
						
						<?php
						
						$q = mysql_query('SELECT *
										FROM rf_aset_unit
										');
						
						$no=0;
						
						while($w=mysql_fetch_array($q)){
							
							$aa = mysql_query("Select * from rf_aset_barang_detail left join rf_aset_unit on rf_aset_barang_detail.ID_Unit=rf_aset_unit.ID_Unit where rf_aset_barang_detail.ID_Hapus = '0'");
							$waa=mysql_num_rows($aa);
							
							$aa1 = mysql_query("Select * from rf_aset_barang_detail left join rf_aset_unit on rf_aset_barang_detail.ID_Unit=rf_aset_unit.ID_Unit
							where rf_aset_barang_detail.ID_Kondisi='1' and rf_aset_barang_detail.ID_Hapus = '0'");
							$waa1=mysql_num_rows($aa1);
							
							$aa2 = mysql_query("Select * from rf_aset_barang_detail left join rf_aset_unit on rf_aset_barang_detail.ID_Unit=rf_aset_unit.ID_Unit
							where rf_aset_barang_detail.ID_Kondisi='2' and rf_aset_barang_detail.ID_Hapus = '0'");
							$waa2=mysql_num_rows($aa2);
							
							$aa3 = mysql_query("Select * from rf_aset_barang_detail left join rf_aset_unit on rf_aset_barang_detail.ID_Unit=rf_aset_unit.ID_Unit
							where rf_aset_barang_detail.ID_Kondisi='3' and rf_aset_barang_detail.ID_Hapus = '0'");
							$waa3=mysql_num_rows($aa3);
							
							$a = mysql_query("Select * from rf_aset_barang_detail left join rf_aset_unit on rf_aset_barang_detail.ID_Unit=rf_aset_unit.ID_Unit
							where rf_aset_unit.ID_Unit=$w[ID_Unit] and rf_aset_barang_detail.ID_Hapus = '0'");
							$wa=mysql_num_rows($a);
							
							$a1 = mysql_query("Select * from rf_aset_barang_detail left join rf_aset_unit on rf_aset_barang_detail.ID_Unit=rf_aset_unit.ID_Unit
							where rf_aset_unit.ID_Unit=$w[ID_Unit] and rf_aset_barang_detail.ID_Kondisi='1' and rf_aset_barang_detail.ID_Hapus = '0'");
							$wa1=mysql_num_rows($a1);
							
							$a2 = mysql_query("Select * from rf_aset_barang_detail left join rf_aset_unit on rf_aset_barang_detail.ID_Unit=rf_aset_unit.ID_Unit
							where rf_aset_unit.ID_Unit=$w[ID_Unit] and rf_aset_barang_detail.ID_Kondisi='2' and rf_aset_barang_detail.ID_Hapus = '0'");
							$wa2=mysql_num_rows($a2);
							
							$a3 = mysql_query("Select * from rf_aset_barang_detail left join rf_aset_unit on rf_aset_barang_detail.ID_Unit=rf_aset_unit.ID_Unit
							where rf_aset_unit.ID_Unit=$w[ID_Unit] and rf_aset_barang_detail.ID_Kondisi='3' and rf_aset_barang_detail.ID_Hapus = '0'");
							$wa3=mysql_num_rows($a3);
							
						$no++;
								

						echo "
                          <tr>
                            <td>$no</td>
                            <td>$w[Nama_Unit]</td>
                            <td><center>$wa1 Buah</td>
                            <td><center>$wa2 Buah</td>
                            <td><center>$wa3 Buah</td>
                            <td><center>$wa Buah</td>
                            <td><a href='?menu=daf_aset&act=detail_aset&unit=$w[ID_Unit]'><center>Detail</a></td>
                          </tr>
							";
						}
							
							
				
						
					  ?>
                        </tbody>
                          <tr>
                            <td colspan=2><center><B>Total Aset UIN Raden Fatah</td>
                            <td><center><B><?php echo $waa1; ?> Buah</td>
                            <td><center><B><?php echo $waa2; ?> Buah</td>
                            <td><center><B><?php echo $waa3; ?> Buah</td>
                            <td colspan=2><center><B><?php echo $waa; ?> Buah</td>
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