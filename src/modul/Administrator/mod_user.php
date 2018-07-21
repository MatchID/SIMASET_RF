<?php 
error_reporting(0);
// untuk akses root user
if ($_SESSION[Akses_Aset] == super){
	
	if ($_GET[act] == "tambah_user"){
?>
	<!-- Isi Halaman -->
<div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Tambah User <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
					
                    <form method=post action='' enctype='multipart/form-data' id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama User</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nama" name=nama required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Username</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="un" name=un required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Password</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="ps" name=ps required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					                      
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Hak Akses</label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <select required="required" class="form-control" id="level" name=level>
                            <option selected disabled>Pilih Level Akses</option>
							<?php
							$sql2 =mysql_query("select * from rf_aset_level where not ID_Level='5' and  not ID_Level='7' order by Inisial_Level asc");
							while($data2 = mysql_fetch_array($sql2)){						
									echo "<option value=$data2[ID_Level]  >$data2[Inisial_Level] </option>";							
								}						
							?>
                          </select>
                        </div>
                      </div>
					                      
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Lokasi Kerja</label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <select required="required" class="form-control" id="lokasi" name=lokasi>
                            <option selected disabled>Pilih Lokasi</option>
							<?php
							$sql2 =mysql_query("select * from rf_aset_unit order by Nama_Unit asc");
							while($data2 = mysql_fetch_array($sql2)){						
									echo "<option value=$data2[ID_Unit]  >$data2[Nama_Unit] </option>";							
								}						
							?>					
                          </select>
                        </div>
                      </div>
					  
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="?menu=user" button type="cancel" class="btn btn-primary">Batal</button></a>
                          <button type="submit" class="btn btn-success" name=simpan value='Simpan'>Tambah User</button>
                        </div>
                      </div>

                    </form>
					
                  </div>
                </div>
              </div>
            </div>


<?php

		if(isset($_POST['simpan'])){
			mysql_query("insert into rf_aset_akun set 
									ID_Akun=null,
									ID_Level='$_POST[level]',
									ID_Unit='$_POST[lokasi]',
									Nama_Akun='$_POST[nama]',
									Username='$_POST[un]',
									Password=md5('$_POST[ps]'),
									Online='0' ");
  
							BerhasilSimpan("?menu=user",500);
							histori("Input User", "Tambah User $_POST[nama] ke dalam Sistem");
		}
	}else if ($_GET[act] == "edit_user"){
		$sql =mysql_query("select * from rf_aset_akun where ID_Akun='$_GET[user]'");
			$data = mysql_fetch_array($sql);				
		?> 
	<!-- Isi Halaman -->
<div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Edit User <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
					
                    <form method=post action='' enctype='multipart/form-data' id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama User</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nama" name=nama required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $data[Nama_Akun];?>">
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Username</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="us" name=us required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $data[Username];?>">
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Passswrod</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="ps" name=ps class="form-control col-md-7 col-xs-12"><i>* Kosongkan jika tidak akan diganti</i>
                        </div>
                      </div>
					  
					  <?php
					  if ($data[ID_Akun] !== "1"){ ?>					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Hak Akses</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select required="required" class="form-control" id="level" name=level>
                            <option value='' selected disabled>Pilih Level Akses</option>
							<?php 
							
							$sql2 =mysql_query("select * from rf_aset_level order by Inisial_Level asc");
							while($data2 = mysql_fetch_array($sql2)){
							if ($data[ID_Level]==$data2[ID_Level]){ $test = 'selected'; }else{ $test = ''; };?>
							<option value="<?php echo $data2[ID_Level]; ?>"  <?php echo $test; ?> ><?php echo $data2[Inisial_Level];?></option><?php
							}
						?>
                          </select>
                        </div>
                      </div>
					  					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Lokasi Kerja</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select required="required" class="form-control" id="lokasi" name=lokasi>
                            <option value='' selected disabled>Pilih Lokasi</option>
							<?php 
							
							$sql2 =mysql_query("select * from rf_aset_unit order by Nama_Unit asc");
							while($data2 = mysql_fetch_array($sql2)){
							if ($data[ID_Unit]==$data2[ID_Unit]){ $test = 'selected'; }else{ $test = ''; };?>
							<option value="<?php echo $data2[ID_Unit]; ?>"  <?php echo $test; ?> ><?php echo $data2[Nama_Unit];?></option><?php
							}
						?>
                          </select>
                        </div>
                      </div>
					  <?php
					  }
					  ?>
					  
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="?menu=user"<button type="cancel" class="btn btn-primary">Batal</button></a>
                          <button type="submit" class="btn btn-success" name=edit value='edit'>Edit User</button>
                        </div>
                      </div>

                    </form>
					
                  </div>
                </div>
              </div>
            </div>
			<?php
		if(isset($_POST['edit'])){
				$pss =mysql_query("select * from rf_aset_akun where ID_Akun='$_REQUEST[user]'");
				$ps2 = mysql_fetch_array($pss);
			if(!isset($_POST['level'])){
				$lv = $ps2['ID_Level'];
			}else{
				$lv = $_POST['level'];				
			}
			if($_POST['ps'] == null){
				$ps = $ps2['Password'];
				echo $ps;
			}else{
				$ps = md5($_POST['ps']);
			}
			mysql_query("Update rf_aset_akun set 
									ID_Akun='$_REQUEST[user]',
									ID_Level='$lv',
									ID_Unit='$_POST[lokasi]',
									Nama_Akun='$_POST[nama]',
									Username='$_POST[us]',
									Password='$ps'
									where ID_Akun='$_REQUEST[user]'");
  
							BerhasilSimpan("?menu=user",500);
							histori("Edit User", "Edit User $_POST[nama]");
		}
	}else if ($_GET[act] == "delete_user"){
$sql =mysql_query("select * from rf_aset_akun where ID_Akun='$_REQUEST[user]'");
$data = mysql_fetch_array($sql);
histori("Delete User Sistem", "Hapus User Sistem > $data[Nama_Akun]");

mysql_query("delete from rf_aset_akun where ID_Akun='$_REQUEST[user]'" );
BerhasilHapus("?menu=user",500);
	}else{
?>


<!-- Judul Halaman -->
<div role='main'>
          <div class=''>
            <div class='page-title'>
              <div class='title_left'>
                <h3>Menu User Sistem</h3>
              </div>
<!-- Batas Judul Halaman -->

<!-- Isi Halaman -->
<div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Data User <small>Sistem Informasi Manajemen Aset</small></h2>
                    <ul class='nav navbar-right panel_toolbox'>
                    </ul>
                    <div class='clearfix'></div>
                  </div>

                  <div class='x_content'>

                    <a class='btn btn-app' href='?menu=user&act=tambah_user'><i class='fa fa-plus btn btn-flat'> User</i></a>

                    <div class='table-responsive'>
                      <table id="datatable-buttons" class='table table-striped table-bordered'>
                        <thead>
                          <tr class='headings'>
                            <th class='column-title'>No</th>
                            <th class='column-title'>Nama User</th>
                            <th class='column-title'>Hak Akses User</th>
                            <th class='column-title'>Lokasi Akun</th>
                            <th class='column-title no-link last'><span class='nobr'><center>Action</span>
                            </th>
                            <th class='bulk-actions' colspan='7'>
                              <a class='antoo' style='color:#fff; font-weight:500;'>Bulk Actions ( <span class='action-cnt'> </span> ) <i class='fa fa-chevron-down'></i></a>
                            </th>
                          </tr>
                        </thead>
						<tbody>
						
						<?php
						$no=0;
						$q = mysql_query('SELECT *
										FROM rf_aset_akun left join rf_aset_level on rf_aset_akun.ID_Level=rf_aset_level.ID_Level
										left join rf_aset_unit on rf_aset_akun.ID_Unit=rf_aset_unit.ID_Unit');
						while($w=mysql_fetch_array($q)){
							$no++;
													
						echo "
                          <tr class='even pointer'>
                            <td>$no</td>
                            <td>$w[Nama_Akun]</td>
                            <td>$w[Inisial_Level]</td>
                            <td>$w[Nama_Unit]</td>";
							
							if ($w[ID_Akun] == "1"){
						echo"
                            <td class=' last'><a href='?menu=user&act=edit_user&user=$w[ID_Akun]'><center>Edit</a>
                            </td>
                          </tr>
							";								
							}else{
						echo"
                            <td class=' last'><a href='?menu=user&act=edit_user&user=$w[ID_Akun]'><center>Edit</a> | <a href='?menu=user&act=delete_user&user=$w[ID_Akun]'>Hapus</a>
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
	}
}else{
      if (empty(include "src/error/module_403.html")){
			echo "<script>window.location = '../../?r=403'</script>";
                    }
    } 
?>   