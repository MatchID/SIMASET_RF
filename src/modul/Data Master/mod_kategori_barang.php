<?php 
error_reporting(0);
// untuk akses root Unit Kerja
if (($_SESSION[Kode_Akses_Aset] !== '2') && ($_SESSION[Akses_Aset] == 'Admin')){
if ($_SESSION[Akses_Aset] !== 'user'){
	
	if ($_GET[act] == "tambah_kategori_barang"){
?>
	<!-- Isi Halaman -->
<div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Tambah Kategori Barang <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
					
                    <form method=post action='' enctype='multipart/form-data' id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Kategori Barang</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nama" name=nama required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="?menu=kategori_barang"<button type="cancel" class="btn btn-primary">Batal</button></a>
                          <button type="submit" class="btn btn-success" name=simpan value='Simpan'>Tambah Kategori Barang</button>
                        </div>
                      </div>

                    </form>
					
                  </div>
                </div>
              </div>
            </div>


<?php

		if(isset($_POST['simpan'])){
			mysql_query("insert into rf_aset_kategori set 
									ID_Kategori=null,
									Nama_Kategori='$_POST[nama]' ");
  
							BerhasilSimpan("?menu=kategori_barang",500);
							histori("Input Kategori Barang", "Tambah Kategori Barang $_POST[nama]");
		}
	}else if ($_GET[act] == "edit_kategori_barang"){
		$sql =mysql_query("select * from rf_aset_kategori where ID_Kategori='$_GET[kategori]'");
			$data = mysql_fetch_array($sql);				
		?> 
	<!-- Isi Halaman -->
<div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Edit Kategori Barang <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
					
                    <form method=post action='' enctype='multipart/form-data' id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Kategori</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nama" name=nama required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $data[Nama_Kategori];?>">
                        </div>
                      </div>
					  
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="?menu=kategori_barang"<button type="cancel" class="btn btn-primary">Batal</button></a>
                          <button type="submit" class="btn btn-success" name=edit value='edit'>Edit Kategori Barang</button>
                        </div>
                      </div>

                    </form>
					
                  </div>
                </div>
              </div>
            </div>
			<?php
		if(isset($_POST['edit'])){
			mysql_query("Update rf_aset_kategori set 
									ID_Kategori='$_REQUEST[kategori]',
									Nama_Kategori='$_POST[nama]'
									where ID_Kategori='$_REQUEST[kategori]'");
  
							BerhasilSimpan("?menu=kategori_barang",500);
							histori("Edit Kategori Barang", "Edit Kategori Barang $_POST[nama]");
		}
	}else if ($_GET[act] == "delete_kategori_barang"){
$sql =mysql_query("select * from rf_aset_kategori where ID_Kategori='$_REQUEST[kategori]'");
$data = mysql_fetch_array($sql);
histori("Delete Kategori Barang", "Hapus Kategori Barang > $data[Nama_Kategori]");

mysql_query("delete from rf_aset_kategori where ID_Kategori='$_REQUEST[kategori]'" );
BerhasilHapus("?menu=kategori_barang",500);
histori("Delete Kategori Barang", "Hapus Kategori Barang $_REQUEST[kategori]");
	}else{
?>


<!-- Judul Halaman -->
<div role='main'>
          <div class=''>
            <div class='page-title'>
              <div class='title_left'>
                <h3>Menu Kategori Barang</h3>
              </div>
<!-- Batas Judul Halaman -->

<!-- Isi Halaman -->
<div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Data Kategori Barang <small>Sistem Informasi Manajemen Aset</small></h2>
                    <ul class='nav navbar-right panel_toolbox'>
                    </ul>
                    <div class='clearfix'></div>
                  </div>

                  <div class='x_content'>

                    <a class='btn btn-app' href='?menu=kategori_barang&act=tambah_kategori_barang'><i class='fa fa-plus btn btn-flat'> Kategori</i></a>

                    <div class='table-responsive'>
                      <table id="datatable-buttons" class='table table-striped table-bordered'>
                        <thead>
                          <tr class='headings'>
                            <th class='column-title'>No</th>
                            <th class='column-title'>Nama Kategori Barang</th>
                            <th class='column-title no-link last'><span class='nobr'><center>Action</span>
                            </th>
                          </tr>
                        </thead>
						<tbody>
						
						<?php
						$no=0;
						$q = mysql_query('SELECT *
										FROM rf_aset_kategori ');
						while($w=mysql_fetch_array($q)){
							$no++;
													
						echo "
                          <tr class='even pointer'>
                            <td><center>$no</td>
                            <td>$w[Nama_Kategori]</td>
                            <td class=' last'><a href='?menu=kategori_barang&act=edit_kategori_barang&kategori=$w[ID_Kategori]'><center>Edit</a> | <a href='?menu=kategori_barang&act=delete_kategori_barang&kategori=$w[ID_Kategori]'>Hapus</a>
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