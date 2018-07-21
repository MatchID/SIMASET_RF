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
										where rf_aset_barang_detail.id='$_GET[aset]'
										");
	$w=mysql_fetch_array($q);				
		?> 
	<!-- Isi Halaman -->
<div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Perbaikan Aset <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
					
                    <form method=post action='' enctype='multipart/form-data' id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

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
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Proses Keadaan Aset</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select required="required" class="form-control" id="kondisi" name=kondisi>
							<?php 
							if ($w[ID_Kondisi] == '2'){
								$sql2 =mysql_query("select * from rf_aset_kondisi where ID_Kondisi='3' order by Nama_Kondisi asc ");
								while($data2 = mysql_fetch_array($sql2)){
								?>
									<option value='' selected disabled>Masukkan Proses</option>
									<option value="<?php echo $data2[ID_Kondisi]; ?>" ><?php echo $data2[Nama_Kondisi];?></option><?php
								}
							}else if($w[ID_Kondisi] == '3'){
								$sql2 =mysql_query("select * from rf_aset_kondisi where not ID_Kondisi='2' and not ID_Kondisi='3' order by Nama_Kondisi asc ");
								while($data2 = mysql_fetch_array($sql2)){
								?>
									<option value='' selected disabled>Selesaikan Proses</option>
									<option value="<?php echo $data2[ID_Kondisi]; ?>" >Telah Di Perbaiki</option><?php
								}
							}
							
						?>
                          </select>
                        </div>
                      </div>
					  
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="?menu=perbaikan_aset"<button type="cancel" class="btn btn-primary">Batal</button></a>
						  <?php if ($w[ID_Kondisi] == '2'){?>
                          <button type="submit" class="btn btn-success" name=edit value='edit'>Perbaiki Aset</button>
						  <?php }else{?>
                          <button type="submit" class="btn btn-success" name=edit value='edit'>Update Aset</button>
						  <?php }?>
                        </div>
                      </div>

                    </form>
					
                  </div>
                </div>
              </div>
            </div>
	
			<?php
		if(isset($_POST['edit'])){
	
			mysql_query("Update rf_aset_barang_detail set 
									id='$_REQUEST[aset]',
									ID_Kondisi='$_POST[kondisi]'
									where id='$_REQUEST[aset]'");
									
		$q = mysql_query("SELECT *
										FROM rf_aset_barang left join rf_aset_kategori on rf_aset_barang.ID_Kategori=rf_aset_kategori.ID_Kategori
										left join rf_aset_unit on rf_aset_barang.ID_Unit=rf_aset_unit.ID_Unit
										left join rf_aset_barang_tipe on rf_aset_barang.ID_Tipe=rf_aset_barang_tipe.ID_Tipe 
										left join rf_aset_barang_detail on rf_aset_barang.ID_Barang=rf_aset_barang_detail.ID_Barang
										left join rf_aset_kondisi on rf_aset_barang_detail.ID_Kondisi=rf_aset_kondisi.ID_Kondisi
										where rf_aset_barang_detail.id='$_GET[aset]'
										");
	$w=mysql_fetch_array($q);
  
							BerhasilSimpan("?menu=perbaikan_aset",500);
							histori("Edit Kondisi Aset", "Edit Kondisi Aset $w[Nama_Tipe] ke $w[Nama_Kondisi]");
		}
	}else if ($_GET[act] == "edit2_aset"){
		$q = mysql_query("SELECT *
										FROM rf_aset_barang left join rf_aset_kategori on rf_aset_barang.ID_Kategori=rf_aset_kategori.ID_Kategori
										left join rf_aset_unit on rf_aset_barang.ID_Unit=rf_aset_unit.ID_Unit
										left join rf_aset_barang_tipe on rf_aset_barang.ID_Tipe=rf_aset_barang_tipe.ID_Tipe 
										left join rf_aset_barang_detail on rf_aset_barang.ID_Barang=rf_aset_barang_detail.ID_Barang
										where rf_aset_barang_detail.id='$_GET[aset]'
										");
	$w=mysql_fetch_array($q);				
		?> 
	<!-- Isi Halaman -->
<div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Perbaikan Aset <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
					
                    <form method=post action='' enctype='multipart/form-data' id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

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
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Proses Keadaan Aset</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select required="required" class="form-control" id="kondisi" name=kondisi>
							<?php 
							if ($w[ID_Kondisi] == '2'){
								$sql2 =mysql_query("select * from rf_aset_kondisi where ID_Kondisi='3' order by Nama_Kondisi asc ");
								while($data2 = mysql_fetch_array($sql2)){
								?>
									<option value='' selected disabled>Masukkan Proses</option>
									<option value="<?php echo $data2[ID_Kondisi]; ?>" ><?php echo $data2[Nama_Kondisi];?></option><?php
								}
							}else if($w[ID_Kondisi] == '3'){
								$sql2 =mysql_query("select * from rf_aset_kondisi where not ID_Kondisi='2' and not ID_Kondisi='3' order by Nama_Kondisi asc ");
								while($data2 = mysql_fetch_array($sql2)){
								?>
									<option value='' selected disabled>Selesaikan Proses</option>
									<option value="<?php echo $data2[ID_Kondisi]; ?>" >Telah Di Perbaiki</option><?php
								}
							}
							
						?>
                          </select>
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">File Kuwitansi 
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <input type=file name=file required="required">
                        </div>
                      </div>
					  
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="?menu=perbaikan_aset"<button type="cancel" class="btn btn-primary">Batal</button></a>
						  <?php if ($w[ID_Kondisi] == '2'){?>
                          <button type="submit" class="btn btn-success" name=edit value='edit'>Perbaiki Aset</button>
						  <?php }else{?>
                          <button type="submit" class="btn btn-success" name=edit value='edit'>Update Aset</button>
						  <?php }?>
                        </div>
                      </div>

                    </form>
					
                  </div>
                </div>
              </div>
            </div>
	
			<?php
		if(isset($_POST['edit'])){
	
			mysql_query("Update rf_aset_barang_detail set 
									id='$_REQUEST[aset]',
									ID_Kondisi='$_POST[kondisi]'
									where id='$_REQUEST[aset]'");
									
		$q = mysql_query("SELECT *
										FROM rf_aset_barang left join rf_aset_kategori on rf_aset_barang.ID_Kategori=rf_aset_kategori.ID_Kategori
										left join rf_aset_unit on rf_aset_barang.ID_Unit=rf_aset_unit.ID_Unit
										left join rf_aset_barang_tipe on rf_aset_barang.ID_Tipe=rf_aset_barang_tipe.ID_Tipe 
										left join rf_aset_barang_detail on rf_aset_barang.ID_Barang=rf_aset_barang_detail.ID_Barang
										left join rf_aset_kondisi on rf_aset_barang_detail.ID_Kondisi=rf_aset_kondisi.ID_Kondisi
										where rf_aset_barang_detail.id='$_GET[aset]'
										");
										
	$w=mysql_fetch_array($q);
			
			$akun2 = mysql_query("select * from rf_aset_akun where ID_Akun=$_SESSION[Kode_Aset]");
			$akun = mysql_fetch_array($akun2);
			
			$hari		 = date('d');
			$bulan		 = date('m');
			$tahun		 = date('Y');
			
			
			$waktu		 = time('h:m');
			
			$tanggal	 = $tahun.$bulan.$hari;
			$name        = $_POST['file'];
			$nama_file	 = $_FILES['file'] ['name']; // Nama File
			$folder      = "aset/doc_aset_uin/".$folderlink[Judul_Menu]."/"; //folder tujuan upload
			$valid       = array('docx','doc','pdf'); //Format File yang di ijinkan Masuk ke server
	
	
	
			// Perintah untuk mengecek ekstensi file
			$ext = pathinfo($nama_file, PATHINFO_EXTENSION);
			if(in_array($ext, $valid)){ 

             
					$filenya = $akun[ID_Unit].$tanggal.$waktu.".".$ext;
					$gmbr  = $folder.$filenya;
             
					$tmp = $_FILES['file']['tmp_name'];					

					if(move_uploaded_file($tmp, $folder.$filenya)){
						
						
			
							mysql_query("Update rf_aset_perbaikan set 
									ID_Perbaikan='$w[ID_Perbaikan]',
									Kwitansi_Perbaikan='$filenya'
									where ID_Perbaikan='$w[ID_Perbaikan]'");
					
					}else{
					echo "Upload Gagal";
					}
			}else{
				FileSalah("?menu=doc_baru&act=edit_doc");
			}
			
  
							BerhasilSimpan("?menu=perbaikan_aset",500);
							histori("Edit Kondisi Aset", "Edit Kondisi Aset $w[Nama_Tipe] ke $w[Nama_Kondisi]");
		}
	}else if ($_GET[act] == "delete_aset"){
//mysql_query("delete from rf_aset_kategori_barang where ID_Barang='$_REQUEST[aset]'" );
BerhasilHapus("?menu=reg_aset",500);
histori("Delete Register Aset", "Hapus Register Aset $_REQUEST[aset]");
	}else{
?>


<!-- Judul Halaman -->
<div role='main'>
          <div class=''>
            <div class='page-title'>
              <div class='title_left'>
                <h3>Menu Perbaikan Aset</h3>
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
										where not rf_aset_barang_detail.ID_Kondisi='1' 
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
                            <td class=' last'><a href='?menu=perbaikan_aset&act=edit_aset&aset=$w[id]'><center>Proses Perbaikan</a>
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
                            <td class=' last'> <a href='?menu=perbaikan_aset&act=edit2_aset&aset=$w[id]'><center>Update Aset</a> 
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