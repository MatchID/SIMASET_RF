<?php
	
	if ($_GET[act] == "edit_doc"){
		
		$sql =mysql_query("select * from rf_aset_doc where ID_Doc='$_GET[doc]'");
			$data = mysql_fetch_array($sql);				
		?> 
	<!-- Isi Halaman -->
<div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Disposisikan Permohonan <small></small></h2>
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
                          <input type="text" disabled id="judul" name=judul required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $data[Judul_Doc];?>">
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Permohonan</label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <select required="required" disabled class="form-control" id="jenis" name=jenis>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status Permohonan</label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <select required="required" class="form-control" id="status" name=status>
                            <option value='' selected disabled>Pilih Status Permohonan</option>
							<?php
                            $sql =mysql_query("select * from rf_aset_status_doc where ID_Level='6'");
								while($data2 = mysql_fetch_array($sql)){							
									echo "<option value=$data2[ID_Status_Doc]  >$data2[Deskripsi_Status_Doc] </option>";							
								}						
							?>
                          </select>
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">File Disposisi Permohonan 
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <input type=file name=file required="required">
                        </div>
                      </div>
					  
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="?menu=doc_baru"<button type="cancel" class="btn btn-primary">Batal</button></a>
                          <button type="submit" class="btn btn-success" name=edit value='edit'>Disposisikan Permohonan</button>
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
									ID_Status_Doc='$_POST[status]',
									Disposisi_Umum='$filenya'
									where ID_Doc='$_REQUEST[doc]'");
  
							BerhasilSimpan("?menu=doc_baru",500);
							histori("Disposisi Dokumen", "Disposisi Dokumen $_POST[judul] Ke BMN");
					
					}else{
					echo "Upload Gagal";
					}
			}else{
				FileSalah("?menu=doc_baru&act=edit_doc");
			}
		}
		
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
                    <h2>Data Permohonan Umum Rektorat <small><?php echo $_SESSION[Jabatan_Aset]; ?></small></h2>
                    <ul class='nav navbar-right panel_toolbox'>
                    </ul>
                    <div class='clearfix'></div>
                  </div>

                  <div class='x_content'>

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
										left join rf_aset_jenis_doc on rf_aset_doc.ID_Jenis_Doc=rf_aset_jenis_doc.ID_Jenis_Doc where rf_aset_doc.ID_Status_Doc='5'");
						while ($w=mysql_fetch_array($q)){
						
						if ($w[ID_Status_Doc] == '5'){
							$status=$w[Deskripsi_Status_Doc];
							$act = "<a href='?menu=doc_baru&act=download_doc&doc=$w[ID_Doc]'><center>Detail</a> | <a href='?menu=doc_baru&act=edit_doc&doc=$w[ID_Doc]'>Disposisi-kan</a>";
						}else{
							$status = "Menunggu Proses";
							$act = "<a href='?menu=doc_baru&act=download_doc&doc=$w[ID_Doc]'><center>Detail</a>";
						}
						
						$tgl = tgl_indo($w[Tanggal_Pengajuan]);
						$no++;
						
						echo "
                          <tr>
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
                      </table>
                      
                    </div>
                  </div>
                </div>
              </div>


<?php
	}
	
	
	
	
