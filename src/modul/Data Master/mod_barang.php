<?php 
error_reporting(0);
// untuk akses root Unit Kerja
if (($_SESSION[Kode_Akses_Aset] !== '2') && ($_SESSION[Akses_Aset] == 'Admin')){
if ($_SESSION[Akses_Aset] !== 'user'){
	
	if ($_GET[act] == "tambah_barang"){
?>
	<!-- Isi Halaman -->
<div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Tambah Barang <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
					
                    <form method=post action='' enctype='multipart/form-data' id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
					               
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Dokumen Pengadaan</label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <select required="required" class="form-control" id="doc" name=doc>
                            <option value='' selected disabled>Pilih Dokumen</option>
							<?php
							$sql2 =mysql_query("select * from rf_aset_doc left join rf_aset_unit on rf_aset_doc.ID_Unit=rf_aset_unit.ID_Unit where rf_aset_doc.ID_Jenis_Doc='1' and rf_aset_doc.ID_Status_Doc='6' order by Judul_Doc asc");
							while($data2 = mysql_fetch_array($sql2)){						
									echo "<option value=$data2[ID_Doc]  >$data2[Judul_Doc] - $data2[Nama_Unit]</option>";							
								}						
							?>						
                          </select>
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Sub Kategori Barang</label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <select required="required" class="form-control" id="nama" name=nama>
                            <option value='' selected disabled>Pilih Nama Barang</option>
							<?php
							$sql2 =mysql_query("select * from rf_aset_barang_tipe order by Nama_Tipe asc");
							while($data2 = mysql_fetch_array($sql2)){						
									echo "<option value=$data2[ID_Tipe]  >$data2[Nama_Tipe] </option>";							
								}						
							?>						
                          </select>
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Merk Barang</span>
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <input type="text" id="merk" name=merk required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tahun</span>
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <input type="text" id="tahun" name=tahun required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					                      
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Unit Lokasi</label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <select required="required" class="form-control" id="lokasi" name=lokasi>
                            <option value='' selected disabled>Pilih Unit Lokasi</option>
							<?php
							$sql2 =mysql_query("select * from rf_aset_unit order by Nama_Unit asc");
							while($data2 = mysql_fetch_array($sql2)){						
									echo "<option value=$data2[ID_Unit]  >$data2[Nama_Unit] </option>";							
								}						
							?>						
                          </select>
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jumlah Barang</span>
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <input type="text" id="jumlah" name=jumlah required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Deskripsi Barang</span>
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <textarea id="deskripsi" name=deskripsi required="required" class="form-control" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                            data-parsley-validation-threshold="10"></textarea>
                        </div>
                      </div>
					  
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="?menu=barang"<button type="cancel" class="btn btn-primary">Batal</button></a>
                          <button type="submit" class="btn btn-success" name=simpan value='Simpan'>Tambah Barang</button>
                        </div>
                      </div>

                    </form>
					
                  </div>
                </div>
              </div>
            </div>


<?php

		if(isset($_POST['simpan'])){
			
			$ktg = mysql_query("select * from rf_aset_kategori inner join rf_aset_barang_tipe on rf_aset_kategori.ID_Kategori=rf_aset_barang_tipe.ID_Kategori where rf_aset_barang_tipe.ID_Tipe='$_POST[nama]'");
			$dataktg = mysql_fetch_array($ktg);
			
			
			mysql_query("insert into rf_aset_barang set 
									ID_Barang=null,
									ID_Kategori='$dataktg[ID_Kategori]',
									ID_Unit='$_POST[lokasi]',
									ID_Tipe='$_POST[nama]',
									Merk_Barang='$_POST[merk]',
									Tahun_Barang='$_POST[tahun]',
									Jumlah_Barang='$_POST[jumlah]',
									Deskripsi_Barang='$_POST[deskripsi]',
									ID_Doc='$_POST[doc]' ");
							
							BerhasilSimpan("?menu=barang",500);
							histori("Input Barang", "Tambah Barang $_POST[nama]");
			
			
			
			
		}
	}else if ($_GET[act] == "edit_barang"){
		$sql =mysql_query("select * from rf_aset_barang where ID_Barang='$_GET[barang]'");
			$data = mysql_fetch_array($sql);				
		?> 
	<!-- Isi Halaman -->
<div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Edit Barang <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
					
                    <form method=post action='' enctype='multipart/form-data' id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
					        					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Sub Kategori Barang</label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <select required="required" class="form-control" id="nama" name=nama>
                            <option value='' selected disabled>Pilih Nama Barang</option>						
							<?php
							$sql2 =mysql_query("select * from rf_aset_barang_tipe order by Nama_Tipe asc");
							while($data2 = mysql_fetch_array($sql2)){	
							if ($data[ID_Tipe]==$data2[ID_Tipe]){ $test = 'selected'; }else{ $test = ''; };?>							
									<option value="<?php echo $data2[ID_Tipe]; ?>"  <?php echo $test; ?> ><?php echo $data2[Nama_Tipe]; ?> </option>							
							<?php	}						
							?>				
                          </select>
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Merk Barang</span>
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <input type="text" id="merk" name=merk required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $data[Merk_Barang]; ?>">
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tahun</span>
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <input type="text" id="tahun" name=tahun required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $data[Tahun_Barang]; ?>">
                        </div>
                      </div>
					                      
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Sub Unit Lokasi</label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <select required="required" class="form-control" id="lokasi" name=lokasi>
                            <option value='' selected disabled>Pilih Sub Unit Lokasi</option>							
							<?php
							$sql2 =mysql_query("select * from rf_aset_unit order by Nama_Unit asc");
							while($data2 = mysql_fetch_array($sql2)){	
							if ($data[ID_Unit]==$data2[ID_Unit]){ $test = 'selected'; }else{ $test = ''; };?>							
									<option value="<?php echo $data2[ID_Unit]; ?>"  <?php echo $test; ?> ><?php echo $data2[Nama_Unit]; ?> </option>							
							<?php	}						
							?>						
                          </select>
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jumlah Barang</span>
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <input type="text" disabled id="jumlah" name=jumlah required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $data[Jumlah_Barang]; ?>">
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Deskripsi Barang</span>
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <textarea id="deskripsi" name=deskripsi required="required" class="form-control" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                            data-parsley-validation-threshold="10"> <?php echo $data[Deskripsi_Barang]; ?></textarea>
                        </div>
                      </div>
					  
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="?menu=barang"<button type="cancel" class="btn btn-primary">Batal</button></a>
                          <button type="submit" class="btn btn-success" name=edit value='edit'>Edit Barang</button>
                        </div>
                      </div>

                    </form>
					
                  </div>
                </div>
              </div>
            </div>
			<?php
		if(isset($_POST['edit'])){
			
			$ktg = mysql_query("select * from rf_aset_kategori inner join rf_aset_barang_tipe on rf_aset_kategori.ID_Kategori=rf_aset_barang_tipe.ID_Kategori where rf_aset_barang_tipe.ID_Tipe='$_POST[nama]'");
			$dataktg = mysql_fetch_array($ktg);
			
			mysql_query("Update rf_aset_barang set 
									ID_Barang='$_REQUEST[barang]',
									ID_Kategori='$dataktg[ID_Kategori]',
									ID_Unit='$_POST[lokasi]',
									ID_Tipe='$_POST[nama]',
									Merk_Barang='$_POST[merk]',
									Tahun_Barang='$_POST[tahun]',
									Deskripsi_Barang='$_POST[deskripsi]',
									ID_Doc='$_POST[doc]'
									where ID_Barang='$_REQUEST[barang]'");
  
							BerhasilSimpan("?menu=barang",500);
							histori("Edit Barang", "Edit Barang $_POST[nama]");
		}
	}else if ($_GET[act] == "delete_barang"){
		$sql =mysql_query("select * from rf_aset_barang where ID_Barang='$_GET[barang]'");
			$data = mysql_fetch_array($sql);				
		?> 
	<!-- Isi Halaman -->
<div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Edit Aset <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
					
                    <form method=post action='' enctype='multipart/form-data' id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
					                      
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Barang</label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <select required="required" class="form-control" id="nama" name=nama>
                            <option value='' selected disabled>Pilih Nama Barang</option>						
							<?php
							$sql2 =mysql_query("select * from rf_aset_barang_tipe order by Nama_Tipe asc");
							while($data2 = mysql_fetch_array($sql2)){	
							if ($data[ID_Tipe]==$data2[ID_Tipe]){ $test = 'selected'; }else{ $test = ''; };?>							
									<option value="<?php echo $data2[ID_Tipe]; ?>"  <?php echo $test; ?> ><?php echo $data2[Nama_Tipe]; ?> </option>							
							<?php	}						
							?>				
                          </select>
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Merk Barang</span>
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <input type="text" id="merk" name=merk required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $data[Merk_Barang]; ?>">
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tahun</span>
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <input type="text" id="tahun" name=tahun required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $data[Tahun_Barang]; ?>">
                        </div>
                      </div>
					                      
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Sub Unit Lokasi</label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <select required="required" class="form-control" id="lokasi" name=lokasi>
                            <option value='' selected disabled>Pilih Sub Unit Lokasi</option>							
							<?php
							$sql2 =mysql_query("select * from rf_aset_unit_sub order by Nama_Unit_Sub asc");
							while($data2 = mysql_fetch_array($sql2)){	
							if ($data[ID_Unit_Sub]==$data2[ID_Unit_Sub]){ $test = 'selected'; }else{ $test = ''; };?>							
									<option value="<?php echo $data2[ID_Unit_Sub]; ?>"  <?php echo $test; ?> ><?php echo $data2[Nama_Unit_Sub]; ?> </option>							
							<?php	}						
							?>						
                          </select>
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jumlah Barang</span>
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <input type="text" disabled id="jumlah" name=jumlah required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $data[Jumlah_Barang]; ?>">
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Deskripsi Barang</span>
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <textarea id="deskripsi" name=deskripsi required="required" class="form-control" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                            data-parsley-validation-threshold="10"> <?php echo $data[Deskripsi_Barang]; ?></textarea>
                        </div>
                      </div>
					  
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="?menu=barang"<button type="cancel" class="btn btn-primary">Batal</button></a>
                          <button type="submit" class="btn btn-success" name=hapus value='hapus'>Hapus Barang</button>
                        </div>
                      </div>

                    </form>
					
                  </div>
                </div>
              </div>
            </div>
			<?php
			
		if(isset($_POST['hapus'])){
mysql_query("delete from rf_aset_barang where ID_Barang='$_REQUEST[barang]'" );
BerhasilHapus("?menu=barang",500);
histori("Delete Barang", "Hapus Barang $_REQUEST[barang]");
	}
	}else{
?>


<!-- Judul Halaman -->
<div role='main'>
          <div class=''>
            <div class='page-title'>
              <div class='title_left'>
                <h3>Menu Barang</h3>
              </div>
<!-- Batas Judul Halaman -->

<!-- Isi Halaman -->
<div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Data Barang <small>Sistem Informasi Manajemen Aset</small></h2>
                    <ul class='nav navbar-right panel_toolbox'>
                    </ul>
                    <div class='clearfix'></div>
                  </div>

                  <div class='x_content'>

                    <a class='btn btn-app' href='?menu=barang&act=tambah_barang'><i class='fa fa-plus btn btn-flat'> Barang</i></a>

                    <div class='table-responsive'>
                      <table id="datatable-buttons" class='table table-striped table-bordered'>
                        <thead>
                          <tr class='headings'>
                            <th class='column-title'>No</th>
                            <th class='column-title'>Nama Sub Ketgori Barang</th>
                            <th class='column-title'>Merk Barang</th>
                            <th class='column-title'>Tahun</th>
                            <th class='column-title'>Kategori Barang</th>
                            <th class='column-title'>Unit Lokasi</th>
                            <th class='column-title'>Jumlah Barang</th>
                            <th class='column-title'>Deskripsi</th>
                            <th class='column-title no-link last'><span class='nobr'><center>Action</span>
                            </th>
                          </tr>
                        </thead>
						<tbody>
						
						<?php
						$no = 0;
						$q = mysql_query('SELECT *
										FROM rf_aset_barang left join rf_aset_kategori on rf_aset_barang.ID_Kategori=rf_aset_kategori.ID_Kategori
										left join rf_aset_barang_tipe on rf_aset_barang.ID_Tipe=rf_aset_barang_tipe.ID_Tipe
										left join rf_aset_unit on rf_aset_barang.ID_Unit=rf_aset_unit.ID_Unit
										
										');
						while($w=mysql_fetch_array($q)){
							$no++;
													
						echo "
                          <tr class='even pointer'>
                            <td><center>$no</td>
                            <td>$w[Nama_Tipe]</td>
                            <td>$w[Merk_Barang]</td>
                            <td>$w[Tahun_Barang]</td>
                            <td>$w[Nama_Kategori]</td>
                            <td>$w[Nama_Unit]</td>
                            <td>$w[Jumlah_Barang] Buah</td>
                            <td>$w[Deskripsi_Barang]</td>
                            <td class=' last'><a href='?menu=barang&act=edit_barang&barang=$w[ID_Barang]'><center>Edit</a> | <a href='?menu=barang&act=delete_barang&barang=$w[ID_Barang]'>Hapus</a>
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
}else{
      if (empty(include "src/error/module_403.html")){
			echo "<script>window.location = '../../?r=403'</script>";
                    }
    } 
?>   