<?php 
error_reporting(0);
// untuk akses root Unit Kerja
if (($_SESSION[Kode_Akses_Aset] !== '0') || ($_SESSION[Kode_Akses_Aset] == '1')){
	
	
	if ($_GET[act] == "edit_aset"){
		$q = mysql_query("SELECT *
										FROM rf_aset_barang left join rf_aset_kategori on rf_aset_barang.ID_Kategori=rf_aset_kategori.ID_Kategori
										left join rf_aset_unit on rf_aset_barang.ID_Unit=rf_aset_unit.ID_Unit
										left join rf_aset_barang_tipe on rf_aset_barang.ID_Tipe=rf_aset_barang_tipe.ID_Tipe 
										left join rf_aset_barang_detail on rf_aset_barang.ID_Barang=rf_aset_barang_detail.ID_Barang
										where rf_aset_barang_detail.id='$_GET[aset]' and rf_aset_barang_detail.ID_Hapus = '0'
										");
	$w=mysql_fetch_array($q);				
		?> 
	<!-- Isi Halaman -->
<div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Penghapusan Aset <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
					
                    <form method=post action='' enctype='multipart/form-data' id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Dokumen Permohonan Penghapusan</label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <select required="required" class="form-control" id="doc" name=doc>
                            <option value='' selected disabled>Pilih Dokumen</option>
							<?php
							$sql2 =mysql_query("select * from rf_aset_doc left join rf_aset_unit on rf_aset_doc.ID_Unit=rf_aset_unit.ID_Unit where rf_aset_doc.ID_Jenis_Doc='3' and rf_aset_doc.ID_Status_Doc='6' order by Judul_Doc asc");
							while($data2 = mysql_fetch_array($sql2)){						
									echo "<option value=$data2[ID_Doc]  >$data2[Judul_Doc] - $data2[Nama_Unit]</option>";							
								}						
							?>						
                          </select>
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Barang</span>
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <input type="text" disabled id="nama" name=nama required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $w[Nama_Tipe];?>">
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Merk Barang</span>
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <input type="text" disabled id="merk" name=merk required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $w[Merk_Barang];?>">
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tahun</span>
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <input type="text" disabled id="tahun" name=tahun required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $w[Tahun_Barang];?>">
                        </div>
                      </div>
					                      
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori Barang</span>
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <input type="text" disabled id="tahun" name=tahun required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $w[Nama_Kategori];?>">
                        </div>
                      </div>
					                      
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Unit Lokasi</span>
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <input type="text" disabled id="tahun" name=tahun required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $w[Nama_Unit];?>">
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nomer Inventaris Barang</span>
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <input type="text" disabled id="nomor" name=nomor required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $w[Inventaris]." - ".$w[ID_Inventaris].".".$w[ID_Brg_Detail];?>">
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Deskripsi Barang</span>
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <textarea disabled id="deskripsi" name=deskripsi required="required" class="form-control" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                            data-parsley-validation-threshold="10"> <?php echo $w[Deskripsi_Barang];?></textarea>
                        </div>
                      </div>
					  
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="?menu=hapus_aset&act=sub_aset&unit=<?php echo $_REQUEST[unit]; ?>"<button type="cancel" class="btn btn-primary">Batal</button></a>
                          <button type="submit" class="btn btn-success" name=hapus value='hapus'>Hapus Aset</button>
                        </div>
                      </div>

                    </form>
					
                  </div>
                </div>
              </div>
            </div>
	
			<?php
		if(isset($_POST['hapus'])){
		$q = mysql_query("SELECT *
										FROM rf_aset_barang left join rf_aset_kategori on rf_aset_barang.ID_Kategori=rf_aset_kategori.ID_Kategori
										left join rf_aset_unit on rf_aset_barang.ID_Unit=rf_aset_unit.ID_Unit
										left join rf_aset_barang_tipe on rf_aset_barang.ID_Tipe=rf_aset_barang_tipe.ID_Tipe 
										left join rf_aset_barang_detail on rf_aset_barang.ID_Barang=rf_aset_barang_detail.ID_Barang
										where rf_aset_barang_detail.id='$_REQUEST[aset]'
										");
	$w=mysql_fetch_array($q);
	
			mysql_query("Update rf_aset_barang_detail set 
									id='$_REQUEST[aset]',
									ID_Hapus='$_POST[doc]'
									where id='$_REQUEST[aset]'");
									
		//mysql_query("delete from rf_aset_barang_detail where id='$_REQUEST[aset]'" );
									
							BerhasilSimpan("?menu=hapus_aset&act=sub_aset&unit=$w[ID_Unit]",500);
							histori("Hapus Aset", "Hapus Aset UIN RF $w[Nama_Tipe] pada $w[Nama_Unit_Sub]");
		}
	}else if ($_GET[act] == "sub_aset"){
?>


<!-- Judul Halaman -->
<div role='main'>
          <div class=''>
            <div class='page-title'>
              <div class='title_left'>
                <h3>Menu Penghapusan Aset</h3>
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
                            <th><center>Action</th>
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
								
						echo "
                          <tr class='even pointer'>
                            <td>$no</td>
                            <td>$w[Nama_Tipe]</td>
                            <td>$w[Merk_Barang]</td>
                            <td><center>$w[Inventaris]<br>$w[ID_Inventaris].$w[ID_Brg_Detail]</td>
                            <td>$w[Tahun_Barang]</td>
                            <td>$w[Nama_Unit]</td>
                            <td class=' last'> <a href='?menu=hapus_aset&act=edit_aset&aset=$w[id]&unit=$_REQUEST[unit]'><center>Penghapusan</a> 
                            </td>
                          </tr>
							";
							
							
				
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
                <h3>Menu Penghapusan Aset</h3>
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
                            <th><center>No</th>
                            <th><center>Nama Unit Kerja</th>
                            <th><center>Jumlah Aset</th>
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
                            <td><center>$wa Buah</td>
                            <td class=' last'> <a href='?menu=hapus_aset&act=sub_aset&unit=$w[ID_Unit]'><center>Detail Unit Aset</a>
                            </td>
                          </tr>
							";
						}
							
							
				
						
					  ?>
                        </tbody>
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