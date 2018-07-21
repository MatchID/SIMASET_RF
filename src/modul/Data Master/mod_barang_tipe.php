<?php 
error_reporting(0);
// untuk akses root Unit Kerja
if (($_SESSION[Kode_Akses_Aset] !== '2') && ($_SESSION[Akses_Aset] == 'Admin')){
if ($_SESSION[Akses_Aset] !== 'user'){
	
	if ($_GET[act] == "tambah_barang_tipe"){
?>
	<!-- Isi Halaman -->
<div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Tambah Sub Ketegori Barang <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
					
                    <form method=post action='' enctype='multipart/form-data' id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Sub Ketegori Barang</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nama" name=nama required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Penomoran Aset</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="no" name=no required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					                      
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Kategori</label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <select required="required" class="form-control" id="ktg" name=ktg>
                            <option value='' selected disabled>Pilih Kategori Barang</option>
							<?php
							$sql2 =mysql_query("select * from rf_aset_kategori order by Nama_Kategori asc");
							while($data2 = mysql_fetch_array($sql2)){						
									echo "<option value=$data2[ID_Kategori]  >$data2[Nama_Kategori] </option>";							
								}						
							?>						
                          </select>
                        </div>
                      </div>
					  
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="?menu=barang_tipe"<button type="cancel" class="btn btn-primary">Batal</button></a>
                          <button type="submit" class="btn btn-success" name=simpan value='Simpan'>Tambah Sub Ketegori Barang</button>
                        </div>
                      </div>

                    </form>
					
                  </div>
                </div>
              </div>
            </div>


<?php

		if(isset($_POST['simpan'])){
			mysql_query("insert into rf_aset_barang_tipe set 
									ID_Tipe=null,
									ID_Kategori='$_POST[ktg]',
									Nama_Tipe='$_POST[nama]',
									ID_Inventaris='$_POST[no]' ");
  
							BerhasilSimpan("?menu=barang_tipe",500);
							histori("Input Tipe Barang", "Tambah Tipe Barang $_POST[nama]");
		}
	}else if ($_GET[act] == "edit_barang_tipe"){
		$sql =mysql_query("select * from rf_aset_barang_tipe left join rf_aset_kategori on rf_aset_barang_tipe.ID_Kategori=rf_aset_kategori.ID_Kategori where rf_aset_barang_tipe.ID_Tipe='$_GET[tipe]'");
			$data = mysql_fetch_array($sql);				
		?> 
	<!-- Isi Halaman -->
<div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Edit Sub Ketegori Barang <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
					
                    <form method=post action='' enctype='multipart/form-data' id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Sub Ketegori</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nama" name=nama required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $data[Nama_Tipe];?>">
                        </div>
                      </div>			

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Penomoran Inventaris</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="no" name=no required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $data[ID_Inventaris];?>">
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Kategori</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select required="required" class="form-control" id="ktg" name=ktg>
                            <option value='' selected disabled>Pilih Kategori Barang</option>
							<?php 
							
							$sql2 =mysql_query("select * from rf_aset_kategori order by Nama_Kategori asc");
							while($data2 = mysql_fetch_array($sql2)){
							if ($data[ID_Kategori]==$data2[ID_Kategori]){ $test = 'selected'; }else{ $test = ''; };?>
							<option value="<?php echo $data2[ID_Kategori]; ?>"  <?php echo $test; ?> ><?php echo $data2[Nama_Kategori];?></option><?php
							}
						?>
                          </select>
                        </div>
                      </div>
					  
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="?menu=barang_tipe"<button type="cancel" class="btn btn-primary">Batal</button></a>
                          <button type="submit" class="btn btn-success" name=edit value='edit'>Edit Sub Ketegori Barang</button>
                        </div>
                      </div>

                    </form>
					
                  </div>
                </div>
              </div>
            </div>
			<?php
		if(isset($_POST['edit'])){
			mysql_query("Update rf_aset_barang_tipe set 
									ID_Tipe='$_REQUEST[tipe]',
									ID_Kategori='$_POST[ktg]',
									Nama_Tipe='$_POST[nama]',
									ID_Inventaris='$_POST[no]'
									where ID_Tipe='$_REQUEST[tipe]'");
  
							BerhasilSimpan("?menu=barang_tipe",500);
							histori("Edit Tipe Barang", "Edit Tipe Barang $_POST[nama]");
		}
	}else if ($_GET[act] == "delete_barang_tipe"){
$sql =mysql_query("select * from rf_aset_barang_tipe where ID_Tipe='$_REQUEST[tipe]'");
$data = mysql_fetch_array($sql);
histori("Delete Tipe Barang", "Hapus Tipe Barang > $data[Nama_Tipe]");

mysql_query("delete from rf_aset_barang_tipe where ID_Tipe='$_REQUEST[tipe]'" );
BerhasilHapus("?menu=barang_tipe",500);
histori("Delete Tipe Barang", "Hapus Tipe Barang $_REQUEST[tipe]");
	}else{
?>


<!-- Judul Halaman -->
<div role='main'>
          <div class=''>
            <div class='page-title'>
              <div class='title_left'>
                <h3>Menu Sub Ketegori Barang</h3>
              </div>
<!-- Batas Judul Halaman -->

<!-- Isi Halaman -->
<div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Data Sub Ketegori Barang <small>Sistem Informasi Manajemen Aset</small></h2>
                    <ul class='nav navbar-right panel_toolbox'>
                    </ul>
                    <div class='clearfix'></div>
                  </div>

                  <div class='x_content'>

                    <a class='btn btn-app' href='?menu=barang_tipe&act=tambah_barang_tipe'><i class='fa fa-plus btn btn-flat'> Sub Ketegori</i></a>

                    <div class='table-responsive'>
                      <table id="datatable-buttons" class='table table-striped table-bordered'>
                        <thead>
                          <tr class='headings'>
                            <th class='column-title'>No</th>
                            <th class='column-title'>Nama Sub Ketegori Barang</th>
                            <th class='column-title'>Kategori</th>
                            <th class='column-title'>Inventaris</th>
                            <th class='column-title no-link last'><span class='nobr'><center>Action</span>
                            </th>
                          </tr>
                        </thead>
						<tbody>
						
						<?php
						$no = 0;
						$q = mysql_query('SELECT *
										FROM rf_aset_barang_tipe inner join rf_aset_kategori where rf_aset_barang_tipe.ID_Kategori=rf_aset_kategori.ID_Kategori ');
						while($w=mysql_fetch_array($q)){
							$no++;
													
						echo "
                          <tr class='even pointer'>
                            <td><center>$no</td>
                            <td>$w[Nama_Tipe]</td>
                            <td>$w[Nama_Kategori]</td>
                            <td>$w[ID_Inventaris]</td>
                            <td class=' last'><a href='?menu=barang_tipe&act=edit_barang_tipe&tipe=$w[ID_Tipe]'><center>Edit</a> | <a href='?menu=barang_tipe&act=delete_barang_tipe&tipe=$w[ID_Tipe]'>Hapus</a>
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