<?php
		
	if (isset($_GET[fil])){
?>		


<!-- Judul Halaman -->
<div role='main'>
          <div class=''>
            <div class='page-title'>
              <div class='title_left'>
                <h3>Menu Permohonan</h3>
              </div>
<!-- Batas Judul Halaman -->

<!-- Isi Halaman -->
<div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Data Permohonan Tahun <?php echo $_GET[fil]; ?> <small><?php echo $_SESSION[Jabatan_Aset]." ".$_SESSION[Unit_Aset]; ?></small></h2>
                    <ul class='nav navbar-right panel_toolbox'>
                    </ul>
                    <div class='clearfix'></div>
                  </div>

                  <div class='x_content'>

                    <a class='btn btn-app' href='?menu=doc_baru_kep&act=tambah_doc'><i class='fa fa-plus btn btn-flat'> Permohonan</i></a>

                    <div class='table-responsive'>
                      <table id="datatable-buttons" class='table table-striped table-bordered'>
                        <thead>
                          <tr class='headings'>
                            <th class='column-title'>Judul Permohonan</th>
                            <th class='column-title'>Jenis Permohonan</th>
                            <th class='column-title'>Asal Permohonan</th>
                            <th class='column-title'>Tanggal Pengajuan</th>
                            <th class='column-title'>Status Permohonan</th>
                            <th class='column-title no-link last'><span class='nobr'><center>Action</span></th>
                          </tr>
                        </thead>
                        <tbody>
						
						<?php
						
			$akun2 = mysql_query("select * from rf_aset_akun where ID_Akun=$_SESSION[Kode_Aset]");
			$akun = mysql_fetch_array($akun2);
						
						$q = mysql_query("SELECT *
										FROM rf_aset_doc left join rf_aset_unit on rf_aset_doc.ID_Unit=rf_aset_unit.ID_Unit
										left join rf_aset_status_doc on rf_aset_doc.ID_Status_Doc=rf_aset_status_doc.ID_Status_Doc
										left join rf_aset_jenis_doc on rf_aset_doc.ID_Jenis_Doc=rf_aset_jenis_doc.ID_Jenis_Doc where rf_aset_doc.ID_Unit='$akun[ID_Unit]' and rf_aset_doc.Tanggal_Pengajuan BETWEEN '$_GET[fil]-01-01' and '$_GET[fil]-12-31' and not rf_aset_doc.ID_Jenis_Doc='2'");
						while ($w=mysql_fetch_array($q)){
						
						if (($w[ID_Status_Doc] !== null) && ($w[ID_Status_Doc] !== '2')) {
							$status=$w[Deskripsi_Status_Doc];
							$act = "<a href='?menu=doc_baru_kep&act=download_doc&doc=$w[ID_Doc]'><center>Detail</a>";
						}elseif ($w[ID_Status_Doc] == '2'){
							$status="Sudah Di Acc Dekan";
							$act = "<a href='?menu=doc_baru_kep&act=download_doc&doc=$w[ID_Doc]'><center>Detail</a> | <a href='?menu=doc_baru_kep&act=pengajuan_doc&doc=$w[ID_Doc]'>Ajukan Ke Rektorat</a>";
						}else{
							$status = "Belum Di Proses";
							$act = "<a href='?menu=doc_baru_kep&act=download_doc&doc=$w[ID_Doc]'><center>Detail</a> | <a href='?menu=doc_baru_kep&act=edit_doc&doc=$w[ID_Doc]'>Perbaharui</a>";
						}
							
							$a = mysql_query("Select * from rf_aset_doc
							where ID_Unit=$w[ID_Unit] and not ID_Jenis_Doc = '2'");
							$totala=mysql_num_rows($a);
							
							$aa = mysql_query("Select * from rf_aset_doc
							where ID_Unit=$w[ID_Unit] and not ID_Jenis_Doc = '2' and ID_Jenis_Doc='1'");
							$totals=mysql_num_rows($aa);
							
							$ar = mysql_query("Select * from rf_aset_doc
							where ID_Unit=$w[ID_Unit] and not ID_Jenis_Doc = '2' and ID_Jenis_Doc='3'");
							$totalr=mysql_num_rows($ar);
							
							$ap = mysql_query("Select * from rf_aset_doc
							where ID_Unit=$w[ID_Unit] and not ID_Jenis_Doc = '2' and ID_Jenis_Doc='4'");
							$totalp=mysql_num_rows($ap);
						
						$tgl = tgl_indo($w[Tanggal_Pengajuan]);
						
						echo "
                          <tr class='even pointer'>
                            <td>$w[Judul_Doc]</td>
                            <td>$w[Deskripsi_Doc]</td>
                            <td>$w[Nama_Unit]</td>
                            <td>$tgl</td>
                            <td>$status</td>
                            <td>$act</td>
                           ";
						}
					  ?>
                        </tbody>
					<?php
						echo "<tr><td colspan=7></td></tr>
                          <tr>
                            <td colspan=2><b>Total Permohonan Baru</td>
                            <td colspan=5><b>$totals Buah</td>
                          </tr>
                          <tr>
                            <td colspan=2><b>Total Permohonan Pemindahan</td>
                            <td colspan=5><b>$totalp Buah</td>
                          </tr>
                          <tr>
                            <td colspan=2><b>Total Permohonan Penghapusan</td>
                            <td colspan=5><b>$totalr Buah</td>
                          </tr>
                          <tr>
                            <td colspan=2><b>Total Permohonan</td>
                            <td colspan=5><b>$totala Buah</td>
                          </tr>
							";
					
					?>
                      </table>
                      
                    </div>
                  </div>
                </div>
              </div>


<?php		
	}else if ($_GET[act] == "tambah_doc"){
?>
	<!-- Isi Halaman -->
<div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Buat Permohonan <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
					
                    <form method=post action='' enctype='multipart/form-data' id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Judul Permohonan</span>
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <input type="text" id="judul" name=judul required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Permohonan</label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <select required="required" class="form-control" id="jenis" name=jenis>
                            <option value='' selected disabled>Pilih Jenis Permohonan</option>
							<?php
                            $sql =mysql_query("select * from rf_aset_jenis_doc where not ID_Jenis_Doc='2' order by Deskripsi_Doc asc");
								while($data2 = mysql_fetch_array($sql)){							
									echo "<option value=$data2[ID_Jenis_Doc]  >$data2[Deskripsi_Doc] </option>";							
								}						
							?>
                          </select>
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">File Rincian Permohonan 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type=file name=file required="required">
                        </div>
                      </div>
					  
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="?menu=doc_baru_kep"<button type="cancel" class="btn btn-primary">Batal</button></a>
                          <button type="submit" class="btn btn-success" name=simpan value='Simpan'>Ajukan Permohonan</button>
                        </div>
                      </div>

                    </form>
					
                  </div>
                </div>
              </div>
            </div>


<?php

		if(isset($_POST['simpan'])){
			
			if ($_POST[jenis] == '2'){
			echo "<script>window.location = '?r=403'</script>";
			}else if (($_POST[jenis] !== '2') or ($_GET[jenis] == '2a')){
			
			
			$akun2 = mysql_query("select * from rf_aset_akun where ID_Akun=$_SESSION[Kode_Aset]");
			$akun = mysql_fetch_array($akun2);
			
			$hari		 = date('d');
			$bulan		 = date('m');
			$tahun		 = date('Y');
			
			
			$waktu		 = time('h:m');
			
			$tanggal	 = $tahun.$bulan.$hari;
			$name        = $_POST['file'];
			$nama_file	 = $_FILES['file'] ['name']; // Nama File
			$folder      = "img/".$folderlink[Judul_Menu]."/"; //folder tujuan upload
			$valid       = array('docx','doc','pdf'); //Format File yang di ijinkan Masuk ke server
	
	
	
			// Perintah untuk mengecek ekstensi file
			$ext = pathinfo($nama_file, PATHINFO_EXTENSION);
			if(in_array($ext, $valid)){ 

             
					$filenya = $akun[ID_Unit].$tanggal.$waktu.".".$ext;
					$gmbr  = $folder.$filenya;
             
					$tmp = $_FILES['file']['tmp_name'];					

					if(move_uploaded_file($tmp, $folder.$filenya)){
		 
							mysql_query("insert into rf_aset_doc set 
							ID_Doc=null,
							ID_Unit='$akun[ID_Unit]',
							ID_Status_Doc='3',
							Tanggal_Pengajuan='$tanggal',
							ID_Akun='$akun[ID_Akun]',
							ID_Jenis_Doc='$_POST[jenis]',
							File_Doc='$filenya',
							Judul_Doc='$_POST[judul]' ");
							
								BerhasilSimpan("?menu=doc_baru_kep",500);
								histori("Input Permohonan", "Tambah Permohonan $_POST[judul]");
							
							
							
					
					}else{
					echo "Upload Gagal";
					}
			}else{
				FileSalah("?menu=modul&act=tambah_menu");
			}

		}
		}
	}else if ($_GET[act] == "edit_doc"){
		
		$sql =mysql_query("select * from rf_aset_doc where ID_Doc='$_GET[doc]'");
			$data = mysql_fetch_array($sql);				
		?> 
	<!-- Isi Halaman -->
<div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Edit Permohonan <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
					
                    <form method=post action='' enctype='multipart/form-data' id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Judul Permohonan</span>
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <input type="text" id="judul" name=judul required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $data[Judul_Doc];?>">
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Permohonan</label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <select required="required" class="form-control" id="jenis" name=jenis>
                            <option value='' selected disabled>Pilih Jenis Permohonan</option>
							<?php 							
							$sql2 =mysql_query("select * from rf_aset_jenis_doc order by Deskripsi_Doc asc");
							while($data2 = mysql_fetch_array($sql2)){
							if ($data[ID_Jenis_Doc]==$data2[ID_Jenis_Doc]){ $test = 'selected'; }else{ $test = ''; };?>
							<option value="<?php echo $data2[ID_Jenis_Doc]; ?>"  <?php echo $test; ?> ><?php echo $data2[Deskripsi_Doc]; ?></option><?php
							}
							?>
                          </select>
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">File Rincian Permohonan 
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <input type=file name=file required="required">
                        </div>
                      </div>
					  
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="?menu=doc_baru_kep"<button type="cancel" class="btn btn-primary">Batal</button></a>
                          <button type="submit" class="btn btn-success" name=edit value='edit'>Edit Dokumen</button>
                        </div>
                      </div>

                    </form>
					
                  </div>
                </div>
              </div>
            </div>
			<?php
		if(isset($_POST['edit'])){
			
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
						
							mysql_query("Update rf_aset_doc set 
									ID_Doc='$_REQUEST[doc]',
									ID_Jenis_Doc='$_POST[jenis]',
									File_Doc='$filenya',
									Judul_Doc='$_POST[judul]'
									where ID_Doc='$_REQUEST[doc]'");
  
							BerhasilSimpan("?menu=doc_baru_kep",500);
							histori("Edit Dokumen", "Edit Dokumen $_POST[judul]");
					
					}else{
					echo "Upload Gagal";
					}
			}else{
				FileSalah("?menu=doc_baru_kep&act=tambah_doc");
			}
		}
		
	}else if ($_GET[act] == "delete_doc"){
		
		$cekfile = mysql_query("Select * from rf_aset_doc where ID_Doc='$_REQUEST[doc]'");
		$filecek = mysql_fetch_array($cekfile);
		
		$filelama = $filecek[File_Doc];	
		$folder      = "aset/doc_aset_uin/"; //folder tujuan upload
			//hapus file lama
		unlink($folder.$filelama);	
		
		histori("Delete Dokumen Permohonan", "Hapus Dokumen Permohonan > $filecek[Judul_Doc]");

		
		mysql_query("delete from rf_aset_doc where ID_Doc='$_REQUEST[doc]'" );
		BerhasilHapus("?menu=doc_baru_kep",500);
		
		}else{		
	
		?>


<!-- Judul Halaman -->
<div role='main'>
          <div class=''>
            <div class='page-title'>
              <div class='title_left'>
                <h3>Menu Permohonan</h3>
              </div>
<!-- Batas Judul Halaman -->

<!-- Isi Halaman -->
<div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Data Permohonan <small><?php echo $_SESSION[Jabatan_Aset]." ".$_SESSION[Unit_Aset]; ?></small></h2>
                    <ul class='nav navbar-right panel_toolbox'>
                    </ul>
                    <div class='clearfix'></div>
                  </div>

                  <div class='x_content'>

                    <a class='btn btn-app' href='?menu=doc_baru_kep&act=tambah_doc'><i class='fa fa-plus btn btn-flat'> Permohonan</i></a>

					<form method=post action='' enctype='multipart/form-data' id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
					    
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-6" for="first-name">Tahun Permohonan</span>
                        </label>
                        <div class="col-md-2 col-sm-2 col-xs-6">
                          <input type="text" id="tahun" name=tahun required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success" name=cari value='cari'>Lihat</button>
                        </div>
                      </div>
                      <div class="ln_solid"></div>

                    </form>
					
                    <div class='table-responsive'>
                      <table id="datatable-buttons" class='table table-striped table-bordered'>
                        <thead>
                          <tr class='headings'>
                            <th class='column-title'>No</th>
                            <th class='column-title'>Judul Permohonan</th>
                            <th class='column-title'>Jenis Permohonan</th>
                            <th class='column-title'>Asal Permohonan</th>
                            <th class='column-title'>Tanggal Pengajuan</th>
                            <th class='column-title'>Status Permohonan</th>
                            <th class='column-title no-link last'><span class='nobr'><center>Action</span></th>
                          </tr>
                        </thead>
                        <tbody>
						
						<?php
						$no=0;
						
			$akun2 = mysql_query("select * from rf_aset_akun where ID_Akun=$_SESSION[Kode_Aset]");
			$akun = mysql_fetch_array($akun2);
						
						$q = mysql_query("SELECT *
										FROM rf_aset_doc left join rf_aset_unit on rf_aset_doc.ID_Unit=rf_aset_unit.ID_Unit
										left join rf_aset_status_doc on rf_aset_doc.ID_Status_Doc=rf_aset_status_doc.ID_Status_Doc
										left join rf_aset_jenis_doc on rf_aset_doc.ID_Jenis_Doc=rf_aset_jenis_doc.ID_Jenis_Doc where rf_aset_doc.ID_Unit='$akun[ID_Unit]' and not rf_aset_doc.ID_Jenis_Doc='2'");
						while ($w=mysql_fetch_array($q)){
						
						if (($w[ID_Status_Doc] !== null) && ($w[ID_Status_Doc] !== '2')) {
							$status=$w[Deskripsi_Status_Doc];
							$act = "<a href='?menu=doc_baru_kep&act=download_doc&doc=$w[ID_Doc]'><center>Detail</a>";
						}elseif ($w[ID_Status_Doc] == '2'){
							$status="Sudah Di Acc Dekan";
							$act = "<a href='?menu=doc_baru_kep&act=download_doc&doc=$w[ID_Doc]'><center>Detail</a> | <a href='?menu=doc_baru_kep&act=pengajuan_doc&doc=$w[ID_Doc]'>Ajukan Ke Rektorat</a>";
						}else{
							$status = "Belum Di Proses";
							$act = "<a href='?menu=doc_baru_kep&act=download_doc&doc=$w[ID_Doc]'><center>Detail</a> | <a href='?menu=doc_baru_kep&act=edit_doc&doc=$w[ID_Doc]'>Perbaharui</a>";
						}
							
							$a = mysql_query("Select * from rf_aset_doc
							where ID_Unit=$w[ID_Unit] and not ID_Jenis_Doc = '2'");
							$totala=mysql_num_rows($a);
							
							$aa = mysql_query("Select * from rf_aset_doc
							where ID_Unit=$w[ID_Unit] and not ID_Jenis_Doc = '2' and ID_Jenis_Doc='1'");
							$totals=mysql_num_rows($aa);
							
							$ar = mysql_query("Select * from rf_aset_doc
							where ID_Unit=$w[ID_Unit] and not ID_Jenis_Doc = '2' and ID_Jenis_Doc='3'");
							$totalr=mysql_num_rows($ar);
							
							$ap = mysql_query("Select * from rf_aset_doc
							where ID_Unit=$w[ID_Unit] and not ID_Jenis_Doc = '2' and ID_Jenis_Doc='4'");
							$totalp=mysql_num_rows($ap);
						
						$tgl = tgl_indo($w[Tanggal_Pengajuan]);
						$no++;
						
						echo "
                          <tr class='even pointer'>
                            <td>$no</td>
                            <td>$w[Judul_Doc]</td>
                            <td>$w[Deskripsi_Doc]</td>
                            <td>$w[Nama_Unit]</td>
                            <td>$tgl</td>
                            <td>$status</td>
                            <td>$act</td>
                           ";
						}
					  ?>
                        </tbody>
					<?php
						echo "<tr><td colspan=7></td></tr>
                          <tr>
                            <td colspan=2><b>Total Permohonan Baru</td>
                            <td colspan=5><b>$totals Buah</td>
                          </tr>
                          <tr>
                            <td colspan=2><b>Total Permohonan Pemindahan</td>
                            <td colspan=5><b>$totalp Buah</td>
                          </tr>
                          <tr>
                            <td colspan=2><b>Total Permohonan Penghapusan</td>
                            <td colspan=5><b>$totalr Buah</td>
                          </tr>
                          <tr>
                            <td colspan=2><b>Total Permohonan</td>
                            <td colspan=5><b>$totala Buah</td>
                          </tr>
							";
					
					?>
                      </table>
                      
                    </div>
                  </div>
                </div>
              </div>


<?php
if (isset($_POST['cari'])){ 
			echo "<script>window.location = '?menu=doc_baru_kep&fil=".$_POST[tahun]."'</script>";
	
	}
	}
	

	
	
