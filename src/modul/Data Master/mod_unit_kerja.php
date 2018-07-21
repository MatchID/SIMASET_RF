<?php 
error_reporting(0);
// untuk akses root Unit Kerja
if (($_SESSION[Kode_Akses_Aset] !== '2') && ($_SESSION[Akses_Aset] == 'Admin')){
if ($_SESSION[Akses_Aset] !== 'user'){
	
	if ($_GET[act] == "tambah_unit_kerja"){
?>
	<!-- Isi Halaman -->
<div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Tambah Unit Kerja <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
					
                    <form method=post action='' enctype='multipart/form-data' id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Unit Kerja</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nama" name=nama required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="?menu=unit_kerja" button type="cancel" class="btn btn-primary">Batal</button></a>
                          <button type="submit" class="btn btn-success" name=simpan value='Simpan'>Tambah Unit Kerja</button>
                        </div>
                      </div>

                    </form>
					
                  </div>
                </div>
              </div>
            </div>


<?php

		if(isset($_POST['simpan'])){
			mysql_query("insert into rf_aset_unit set 
									ID_Unit=null,
									Nama_Unit='$_POST[nama]' ");
  
							BerhasilSimpan("?menu=unit_kerja",500);
							histori("Input Unit Kerja", "Tambah Unit Kerja $_POST[nama]");
		}
	}else if ($_GET[act] == "edit_unit_kerja"){
		$sql =mysql_query("select * from rf_aset_unit where ID_Unit='$_GET[unit]'");
			$data = mysql_fetch_array($sql);				
		?> 
	<!-- Isi Halaman -->
<div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Edit Unit Kerja <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
					
                    <form method=post action='' enctype='multipart/form-data' id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Unit Kerja</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nama" name=nama required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $data[Nama_Unit];?>">
                        </div>
                      </div>
					  
					  
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="?menu=unit_kerja"<button type="cancel" class="btn btn-primary">Batal</button></a>
                          <button type="submit" class="btn btn-success" name=edit value='edit'>Edit Unit Kerja</button>
                        </div>
                      </div>

                    </form>
					
                  </div>
                </div>
              </div>
            </div>
			<?php
		if(isset($_POST['edit'])){
			mysql_query("Update rf_aset_unit set 
									ID_Unit='$_REQUEST[unit]',
									Nama_Unit='$_POST[nama]'
									where ID_Unit='$_REQUEST[unit]'");
  
							BerhasilSimpan("?menu=unit_kerja",500);
							histori("Input Unit Kerja", "Tambah Unit Kerja $_POST[nama]");
		}
	}else if ($_GET[act] == "delete_unit_kerja"){
$sql =mysql_query("select * from rf_aset_unit where ID_Unit='$_REQUEST[unit]'");
$data = mysql_fetch_array($sql);
histori("Delete Unit Kerja", "Hapus Unit Kerja > $data[Nama_Unit]");

mysql_query("delete from rf_aset_unit where ID_Unit='$_REQUEST[unit]'" );
BerhasilHapus("?menu=unit_kerja",500);
	}else{
?>


<!-- Judul Halaman -->
<div role='main'>
          <div class=''>
            <div class='page-title'>
              <div class='title_left'>
                <h3>Menu Unit Kerja</h3>
              </div>
<!-- Batas Judul Halaman -->

<!-- Isi Halaman -->
<div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Data Unit Kerja <small>Sistem Informasi Manajemen Aset</small></h2>
                    <ul class='nav navbar-right panel_toolbox'>
                    </ul>
                    <div class='clearfix'></div>
                  </div>

                  <div class='x_content'>

                    <a class='btn btn-app' href='?menu=unit_kerja&act=tambah_unit_kerja'><i class='fa fa-plus btn btn-flat'> Unit Kerja</i></a>

                    <div class='table-responsive'>
                      <table id="datatable-buttons" class='table table-striped table-bordered'>
                        <thead>
                          <tr class='headings'>
                            <th class='column-title'>No</th>
                            <th class='column-title'>Nama Unit Kerja</th>
                            <th class='column-title'>Jumlah Aset</th>
                            <th class='column-title no-link last'><span class='nobr'><center>Action</span>
                            </th>
                          </tr>
                        </thead>
                        <tbody>
						
						<?php
						$no=0;
						$q = mysql_query('SELECT *
										FROM rf_aset_unit');
						while($w=mysql_fetch_array($q)){
							$no++;
							$qq = mysql_query('SELECT *
										FROM rf_aset_barang_detail where ID_Unit='.$w[ID_Unit].'');
							$ww= mysql_num_rows($qq);
													
						echo "
                          <tr class='even pointer'>
                            <td><center>$no</td>
                            <td>$w[Nama_Unit]</td>
                            <td>$ww Unit</td>
                            <td class=' last'><a href='?menu=unit_kerja&act=edit_unit_kerja&unit=$w[ID_Unit]'><center>Edit</a> | <a href='?menu=unit_kerja&act=delete_unit_kerja&unit=$w[ID_Unit]'>Hapus</a>
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