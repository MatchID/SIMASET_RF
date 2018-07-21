<?php 
error_reporting(0);
// untuk akses root modul
if ($_SESSION[Akses_Aset] == super){
	
	if ($_GET[act] == "tambah_menu"){
?>
	<!-- Isi Halaman -->
<div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Tambah Menu <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
					
                    <form method=post action='' enctype='multipart/form-data' id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Judul Menu</span>
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <input type="text" id="judul" name=judul required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Link Menu</span>
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <input type="text" id="link" name=link required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Lokasi Menu</label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <select required="required" class="form-control" id="modul" name=modul>
                            <option value='' selected disabled>Pilih Lokasi Modul</option>
							<?php
                            $sql =mysql_query("select * from rf_aset_menu order by ID_Menu asc");
								while($data2 = mysql_fetch_array($sql)){							
									echo "<option value=$data2[ID_Menu]  >$data2[Judul_Menu] </option>";							
								}						
							?>
                          </select>
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Icon Menu</label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <input type="text" id="icon" name=icon required="required"  class="form-control col-md-7 col-xs-12" value="<?php echo $_GET[ico];?>"> <a href="?menu=icon&mn=menu" target="_blank"><i>Contoh Nama Icon</i></a>
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">File Menu  <span class="required">*</span> .php
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type=file name=file required="required">
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">File Tambahan</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type=file name=file2[] multiple>
                        </div>
                      </div>
					  
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="?menu=modul&gos=menu"<button type="cancel" class="btn btn-primary">Batal</button></a>
                          <button type="submit" class="btn btn-success" name=simpan value='Simpan'>Tambah Menu</button>
                        </div>
                      </div>

                    </form>
					
                  </div>
                </div>
              </div>
            </div>


<?php

		if(isset($_POST['simpan'])){
			
			$cekfolder = mysql_query("SELECT *
										FROM rf_aset_menu where ID_Menu ='$_POST[modul]'");
			$folderlink=mysql_fetch_array($cekfolder);			
					
			if (!file_exists('src/modul/$folderlink[Judul_Menu]')){
				mkdir('src/modul/'.$folderlink[Judul_Menu],0777,true);
			}
	
			$name        = $_POST['file'];
			$nama_file	 = $_FILES['file'] ['name']; // Nama File
			$folder      = "src/modul/".$folderlink[Judul_Menu]."/"; //folder tujuan upload
			$valid       = array('php','php'); //Format File yang di ijinkan Masuk ke server
	
	
	
			// Perintah untuk mengecek ekstensi file
			$ext = pathinfo($nama_file, PATHINFO_EXTENSION);
			if(in_array($ext, $valid)){ 

             
					$filenya = "mod_".$_POST['link'].".".$ext;
					$gmbr  = $folder.$filenya;
             
					$tmp = $_FILES['file']['tmp_name'];					

					if(move_uploaded_file($tmp, $folder.$filenya)){ 
								 
							mysql_query("insert into rf_aset_menu_sub set 
									ID_Sub_Menu=null,
									ID_Menu='$_POST[modul]',
									Judul_Sub='$_POST[judul]',
									Icon_Sub='$_POST[icon]',
									Link_Sub='$_POST[link]' ");
							
							
								$file2cek = count($_FILES['file2'] ['tmp_name']);
								for ($i=0; $i<$file2cek; $i++){
									$file2string	 = $_FILES['file2'] ['name'] [$i];
								}
							if ($file2string !== ""){
								$file2nama = count($_FILES['file2'] ['tmp_name']);
								for ($i=0; $i<$file2nama; $i++){
									$name2        = $_POST['file2'] [$i];
									$nama_file2	 = $_FILES['file2'] ['name'] [$i]; // Nama File
									$folder      = "src/modul/".$folderlink[Judul_Menu]."/"; //folder tujuan upload
									$valid2       = array('php','php'); //Format File yang di ijinkan Masuk ke server
			
									// Perintah untuk mengecek ekstensi file
									$ext = pathinfo($nama_file2, PATHINFO_EXTENSION);
									if(in_array($ext, $valid2)){ 

             
										$filenya2 = "mod_".$nama_file2;
										$gmbr2  = $folder2.$filenya2;
             
										$tmp2 = $_FILES['file2']['tmp_name'] [$i];

										if(move_uploaded_file($tmp2, $folder2.$filenya2)){ 
  
											BerhasilSimpan("?menu=modul&gos=menu",500);
											histori("Input Menu", "Tambah Menu $_POST[judul] Sistem");
					
										}else{
											echo "Upload File Tambahan Gagal";
										}
									}else{
										FileSalah("?menu=modul&act=tambah_menu");
									}
								}
							}else{
								BerhasilSimpan("?menu=modul&gos=menu",500);
								histori("Input Menu", "Tambah Menu $_POST[judul] Sistem");
							}
							
							
					
					}else{
					echo "Upload Gagal";
					}
			}else{
				FileSalah("?menu=modul&act=tambah_menu");
			}

		}
	}else if ($_GET[act] == "tambah_modul"){
?>
	<!-- Isi Halaman -->
<div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Tambah Modul <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
					
                    <form method=post action='' enctype='multipart/form-data' id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Judul Modul</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="judul" name=judul required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Icon Modul</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="icon" name=icon required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $_GET[ico];?>"> <a href="?menu=icon&mn=modul" target="_blank"><i>Contoh Nama Icon</i></a>
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Hak Akses</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select required="required" class="form-control" id="level" name=level>
                            <option value='' selected disabled>Pilih Level Akses</option>
							<option value='0'  >Administrator Sistem</option>
							<option value='1'  >Administrator</option>
							<option value='2'  >Admin</option>
							<option value='3'  >Rektor</option>
							<option value='4'  >User</option>
                          </select>
                        </div>
                      </div>
					  
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="?menu=modul"<button type="cancel" class="btn btn-primary">Batal</button></a>
                          <button type="submit" class="btn btn-success" name=simpan value='Simpan'>Tambah Modul</button>
                        </div>
                      </div>

                    </form>
					
                  </div>
                </div>
              </div>
            </div>


<?php

		if(isset($_POST['simpan'])){
			mysql_query("insert into rf_aset_menu set 
									ID_Menu=null,
									Judul_Menu='$_POST[judul]',
									Link='#',
									Modul=null,
									Icon='$_POST[icon]',
									Level='$_POST[level]' ");
  
							BerhasilSimpan("?menu=modul",500);
							histori("Input Modul", "Tambah Modul $_POST[judul] Sistem");
		}
	}else if ($_GET[act] == "edit_modul"){
			if ( $_GET[modul] !== "1" ){
		$sql =mysql_query("select * from rf_aset_menu where ID_Menu='$_GET[modul]'");
			$data = mysql_fetch_array($sql);				
		?> 
	<!-- Isi Halaman -->
<div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Edit Modul <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
					
                    <form method=post action='' enctype='multipart/form-data' id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Judul Modul</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="judul" name=judul required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $data[Judul_Menu];?>">
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Icon Modul</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="icon" name=icon required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $data[Icon];?>">
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Hak Akses</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select required="required" class="form-control" id="level" name=level>
                            <option value='' selected disabled>Pilih Level Akses</option>
							<?php 
							
							$sql2 =mysql_query("select DISTINCT Level from rf_aset_menu order by Level asc");
							while($data2 = mysql_fetch_array($sql2)){
							if ($data[Level]==$data2[Level]){ $test = 'selected'; }else{ $test = ''; };?>
							<option value="<?php echo $data2[Level]; ?>"  <?php echo $test; ?> ><?php if($data2[Level] == "0"){ echo "Administrator Sistem";}
							else if($data2[Level] == "1"){ echo "Administrator";}
							else if($data2[Level] == "2"){ echo "Admin";}
							else if($data2[Level] == "3"){ echo "Rektor";}
							else if($data2[Level] == "4"){ echo "User";}?></option><?php
															
						}
						?>
                          </select>
                        </div>
                      </div>
					  
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="?menu=modul"<button type="cancel" class="btn btn-primary">Batal</button></a>
                          <button type="submit" class="btn btn-success" name=edit value='edit'>Edit Modul</button>
                        </div>
                      </div>

                    </form>
					
                  </div>
                </div>
              </div>
            </div>
			<?php
		if(isset($_POST['edit'])){
			mysql_query("Update rf_aset_menu set 
									ID_Menu='$_REQUEST[modul]',
									Judul_Menu='$_POST[judul]',
									Link='#',
									Modul=null,
									Icon='$_POST[icon]',
									Level='$_POST[level]'
									where ID_Menu='$_REQUEST[modul]'");
  
							BerhasilSimpan("?menu=modul",500);
							histori("Edit Modul", "Edit Modul $_POST[judul] Sistem");
		}
			}else{
				echo "<script>window.location = '?menu=modul'</script>";
			}
	}else if ($_GET[act] == "delete_modul"){
		if($_GET[modul] !== "1"){
		$cekfile = mysql_query("select * from rf_aset_menu where ID_Menu='$_REQUEST[modul]'");
		$filecek = mysql_fetch_array($cekfile);	
		$folder      = "src/modul/".$filecek[Judul_Menu]; //folder tujuan upload
			//hapus file lama
		rmdir($folder);	
		
$sql =mysql_query("select * from rf_aset_menu where ID_Menu='$_REQUEST[modul]'");
$data = mysql_fetch_array($sql);
histori("Delete Modul Sistem", "Hapus Modul Sistem > $data[Judul_Menu]");

mysql_query("delete from rf_aset_menu where ID_Menu='$_REQUEST[modul]'" );
BerhasilHapus("?menu=modul",500);
		}else{
				echo "<script>window.location = '?menu=modul'</script>";
		}
	}else if ($_GET[gos] == "menu"){
?>


<!-- Judul Halaman -->
<div role='main'>
          <div class=''>
            <div class='page-title'>
              <div class='title_left'>
                <h3>Menu Modul Sistem</h3>
              </div>
<!-- Batas Judul Halaman -->

<!-- Isi Halaman -->
<div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Data Menu <small>Sistem Informasi Manajemen Aset</small></h2>
                    <ul class='nav navbar-right panel_toolbox'>
                    </ul>
                    <div class='clearfix'></div>
                  </div>

                  <div class='x_content'>

                    <a class='btn btn-app' href='?menu=modul&act=tambah_menu'><i class='fa fa-plus btn btn-flat'> Menu</i></a>
                    <a class='btn btn-app' href='?menu=modul'><i class='fa btn btn-flat'> Modul</i></a>

                    <div class='table-responsive'>
                      <table class='table table-striped jambo_table bulk_action'>
                        <thead>
                          <tr class='headings'>
                            <th class='column-title'>Nama Menu</th>
                            <th class='column-title'>Lokasi Modul</th>
                            <th class='column-title'>Icon Menu</th>
                            <th class='column-title no-link last'><span class='nobr'><center>Action</span>
                            </th>
                            <th class='bulk-actions' colspan='7'>
                              <a class='antoo' style='color:#fff; font-weight:500;'>Bulk Actions ( <span class='action-cnt'> </span> ) <i class='fa fa-chevron-down'></i></a>
                            </th>
                          </tr>
                        </thead>
						
						<?php
						
						$q = mysql_query('SELECT *
										FROM rf_aset_menu_sub left join rf_aset_menu on rf_aset_menu_sub.ID_Menu = rf_aset_menu.ID_Menu ');
						while($w=mysql_fetch_array($q)){
						
						echo "
                        <tbody>
                          <tr class='even pointer'>
                            <td>$w[Judul_Sub]</td>
                            <td>$w[Judul_Menu]</td>
                            <td><i class='fa $w[Icon_Sub]'></i>  $w[Icon_Sub]</td>";
							if ($w[ID_Menu] == "1"){
						echo"
							<td class=' last'><center><a href='?menu=modul&act=edit_menu&menumodul=$w[ID_Sub_Menu]'>Edit</a>
                         
                            </td>
                          </tr>
					  ";
							}else{
						echo"
							<td class=' last'><center><a href='?menu=modul&act=edit_menu&menumodul=$w[ID_Sub_Menu]'>Edit</a> | <a href='?menu=modul&act=delete_menu&menumodul=$w[ID_Sub_Menu]'>Hapus</a>
                         
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
		
	
	}else if ($_GET[act] == "edit_menu"){	
	//$sql =mysql_query("select * from rf_aset_menu_sub left join rf_aset_menu on rf_aset_menu_sub.ID_Menu = rf_aset_menu.ID_Menu where rf_aset_menu_sub.ID_Sub_Menu='$_GET[menumodul]'");
			
		$sql = mysql_query("Select * from rf_aset_menu_sub left join rf_aset_menu on rf_aset_menu_sub.ID_Menu = rf_aset_menu.ID_Menu where ID_Sub_Menu='$_GET[menumodul]'");
			$data = mysql_fetch_array($sql);	
			
			?>
	<!-- Isi Halaman -->
<div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Edit Menu <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
					
                    <form method=post action='' enctype='multipart/form-data' id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Judul Menu</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="judul" name=judul required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $data[Judul_Sub];?>">
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Link Menu</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="link" name=link required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $data[Link_Sub];?>">
                        </div>
                      </div>
					  
					  <?php 
						if(($_GET[menumodul] == "1") || ($_GET[menumodul] == "2")){
						  ?>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Lokasi Menu</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select required="required" class="form-control" id="modul" name=modul disabled>
                            <option value='' selected disabled>Pilih Lokasi Modul</option>
							<?php 
							
							$sql2 =mysql_query("select * from rf_aset_menu order by ID_Menu asc");
							while($data2 = mysql_fetch_array($sql2)){
							if ($data[ID_Menu]==$data2[ID_Menu]){ $test = 'selected'; }else{ $test = ''; };?>
							<option value="<?php echo $data2[ID_Menu]; ?>"  <?php echo $test; ?> ><?php echo $data2[Judul_Menu]; ?></option><?php
							}
							?>
							
							
                          </select>
                        </div>
                      </div>
					  
					  <?php 
					  }else{
					?>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Lokasi Menu</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select required="required" class="form-control" id="modul" name=modul>
                            <option value='' selected disabled>Pilih Lokasi Modul</option>
							<?php 
							
							$sql2 =mysql_query("select * from rf_aset_menu order by ID_Menu asc");
							while($data2 = mysql_fetch_array($sql2)){
							if ($data[ID_Menu]==$data2[ID_Menu]){ $test = 'selected'; }else{ $test = ''; };?>
							<option value="<?php echo $data2[ID_Menu]; ?>"  <?php echo $test; ?> ><?php echo $data2[Judul_Menu]; ?></option><?php
							}
							?>
							
							
                          </select>
                        </div>
                      </div>
					
					<?php
					  }
					  ?>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Icon Menu</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="icon" name=icon required="required"  class="form-control col-md-7 col-xs-12" value="<?php echo $data[Icon_Sub];?>">
                        </div>
                      </div>
					  
					  <?php 
						if($data[ID_Menu] == "1"){
						  ?>		  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">File Menu Baru  <span class="required">*</span> .php
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type=file name=file disabled>
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">File Tambahan</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type=file name=file2[] multiple disabled>
                        </div>
                      </div>
					  <?php
						}else{
					  ?>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">File Menu Baru  <span class="required">*</span> .php
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type=file name=file>
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">File Tambahan</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type=file name=file2[] multiple>
                        </div>
                      </div>
					  
					  <?php
						}
						?>
					  
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="?menu=modul&gos=menu"<button type="cancel" class="btn btn-primary">Batal</button></a>
                          <button type="submit" class="btn btn-success" name=edit value='edit'>Edit Menu</button>
                        </div>
                      </div>

                    </form>
					
                  </div>
                </div>
              </div>
            </div>
	
<?php	
		if(isset($_POST['edit'])){
			
			$cekfolder = mysql_query("SELECT *
										FROM rf_aset_menu where ID_Menu ='$_POST[modul]'");
			$folderlink=mysql_fetch_array($cekfolder);			
					
			if (!file_exists('src/modul/$folderlink[Judul_Menu]')){
				mkdir('src/modul/'.$folderlink[Judul_Menu],0777,true);
			}

	$filephp = $_FILES['file'] ['name'];
	if (($filephp !== "") and ($filephp !== null)){
		
		$cekfile = mysql_query("Select * from rf_aset_menu_sub where ID_Sub_Menu='$_REQUEST[menumodul]'");
		$filecek = mysql_fetch_array($cekfile);
		$filelama = "mod_".$filecek[Link_Sub].".php";		
		
		if(isset($_POST['edit'])){
	
			$name        = $_POST['file'];
			$nama_file	 = $_FILES['file'] ['name']; // Nama File
			$folder      = "src/modul/".$folderlink[Judul_Menu]."/"; //folder tujuan upload
			$valid       = array('php','php'); //Format File yang di ijinkan Masuk ke server
			
			//hapus file lama
			unlink($folder.$filelama);
	
			// Perintah untuk mengecek ekstensi file
			$ext = pathinfo($nama_file, PATHINFO_EXTENSION);
			if(in_array($ext, $valid)){ 

             
					$filenya = "mod_".$_POST['link'].".".$ext;
					$gmbr  = $folder.$filenya;
             
					$tmp = $_FILES['file']['tmp_name'];

					if(move_uploaded_file($tmp, $folder.$filenya)){ 
								 
						mysql_query("Update rf_aset_menu_sub set 
									ID_Sub_Menu='$_REQUEST[menumodul]',
									ID_Menu='$_POST[modul]',
									Judul_Sub='$_POST[judul]',
									Icon_Sub='$_POST[icon]',
									Link_Sub='$_POST[link]'
									where ID_Sub_Menu='$_REQUEST[menumodul]'");
  
  
						$file2cek = count($_FILES['file2'] ['tmp_name']);
						for ($i=0; $i<$file2cek; $i++){
							$file2string	 = $_FILES['file2'] ['name'] [$i];
						}
						if ($file2string !== ""){
							$file2nama = count($_FILES['file2'] ['tmp_name']);
							for ($i=0; $i<$file2nama; $i++){
								$name2        = $_POST['file2'] [$i];
								$nama_file2	 = $_FILES['file2'] ['name'] [$i]; // Nama File
								$folder2      = "src/modul/".$folderlink[Judul_Menu]."/"; //folder tujuan upload
								$valid2       = array('php','php'); //Format File yang di ijinkan Masuk ke server
			
								// Perintah untuk mengecek ekstensi file
								$ext = pathinfo($nama_file2, PATHINFO_EXTENSION);
								if(in_array($ext, $valid2)){ 

             
									$filenya2 = "mod_".$nama_file2;
									$gmbr2  = $folder2.$filenya2;
             
									$tmp2 = $_FILES['file2']['tmp_name'] [$i];

									if(move_uploaded_file($tmp2, $folder2.$filenya2)){ 
										BerhasilSimpan("?menu=modul&gos=menu",500);
										histori("Edit Menu", "Edit Menu $_POST[judul] Sistem");
					
									}else{
										echo "Upload File Tambahan Gagal";
									}
								}else{
									FileSalah("?menu=modul&act=edit_menu");
								}
							}
						}else{ 
							BerhasilSimpan("?menu=modul&gos=menu",500);
							histori("Edit Menu", "Edit Menu $_POST[judul] Sistem");
						}
					
					}else{
					echo "Upload Gagal";
					}
			}else{
				FileSalah("?menu=modul&act=edit_menu");
			}
		}
	}else{
			mysql_query("Update rf_aset_menu_sub set 
									ID_Sub_Menu='$_REQUEST[menumodul]',
									ID_Menu='$_POST[modul]',
									Judul_Sub='$_POST[judul]',
									Icon_Sub='$_POST[icon]',
									Link_Sub='$_POST[link]'
									where ID_Sub_Menu='$_REQUEST[menumodul]'");
  
							BerhasilSimpan("?menu=modul&gos=menu",500);
							histori("Edit Menu", "Edit Menu $_POST[judul] Sistem");
	}
		}
	}else if ($_GET[act] == "delete_menu"){
		
		if(($_GET[menumodul] !== "1") and ($_GET[menumodul] !== "2")){
		$cekfile = mysql_query("Select * from rf_aset_menu_sub left join rf_aset_menu on rf_aset_menu_sub.ID_Menu = rf_aset_menu.ID_Menu where ID_Sub_Menu='$_REQUEST[menumodul]'");
		$filecek = mysql_fetch_array($cekfile);
		$filelama = "mod_".$filecek[Link_Sub].".php";	
		$folder      = "src/modul/".$filecek[Judul_Menu]."/"; //folder tujuan upload
			//hapus file lama
		unlink($folder.$filelama);	
		
		$sql =mysql_query("select * from rf_aset_menu_sub where ID_Sub_Menu='$_REQUEST[menumodul]'");
		$data = mysql_fetch_array($sql);
		histori("Delete Menu Sistem", "Hapus Menu Sistem > $data[Judul_Sub]");

		
		mysql_query("delete from rf_aset_menu_sub where ID_Sub_Menu='$_REQUEST[menumodul]'" );
		BerhasilHapus("?menu=modul&gos=menu",500);
		}else{
			echo "<script>window.location = '?menu=modul&gos=menu'</script>";
		}		
	}else{
?>


<!-- Judul Halaman -->
<div role='main'>
          <div class=''>
            <div class='page-title'>
              <div class='title_left'>
                <h3>Menu Modul Sistem</h3>
              </div>
<!-- Batas Judul Halaman -->

<!-- Isi Halaman -->
<div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Data Modul <small>Sistem Informasi Manajemen Aset</small></h2>
                    <ul class='nav navbar-right panel_toolbox'>
                    </ul>
                    <div class='clearfix'></div>
                  </div>

                  <div class='x_content'>

                    <a class='btn btn-app' href='?menu=modul&act=tambah_modul'><i class='fa fa-plus btn btn-flat'> Modul</i></a>
                    <a class='btn btn-app' href='?menu=modul&gos=menu'><i class='fa btn btn-flat'> Menu</i></a>

                    <div class='table-responsive'>
                      <table class='table table-striped jambo_table bulk_action'>
                        <thead>
                          <tr class='headings'>
                            <th class='column-title'>Nama Modul</th>
                            <th class='column-title'>Hak Akses Modul</th>
                            <th class='column-title'>Icon Modul</th>
                            <th class='column-title no-link last'><span class='nobr'><center>Action</span>
                            </th>
                            <th class='bulk-actions' colspan='7'>
                              <a class='antoo' style='color:#fff; font-weight:500;'>Bulk Actions ( <span class='action-cnt'> </span> ) <i class='fa fa-chevron-down'></i></a>
                            </th>
                          </tr>
                        </thead>
						
						<?php
						
						$q = mysql_query('SELECT *
										FROM rf_aset_menu');
						while($w=mysql_fetch_array($q)){
							
							if ($w[Level] == "0"){$level =  "Administrator Sistem";}
							else if($w[Level] == "1"){$level = "Administrator";}
							else if($w[Level] == "2"){$level = "Admin";}
							else if($w[Level] == "3"){$level = "Rektor";}
							else if($w[Level] == "4"){$level = "User";}
						
						echo "
                        <tbody>
                          <tr class='even pointer'>
                            <td>$w[Judul_Menu]</td>
                            <td>$level</td>
                            <td><i class='fa $w[Icon]'></i>  $w[Icon]</td>";
							if ($w[ID_Menu] == "1"){
						echo"
                            <td class=' last'>
                            </td>
                          </tr>
							";								
							}else{
						echo"
                            <td class=' last'><a href='?menu=modul&act=edit_modul&modul=$w[ID_Menu]'><center>Edit</a> | <a href='?menu=modul&act=delete_modul&modul=$w[ID_Menu]'>Hapus</a>
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