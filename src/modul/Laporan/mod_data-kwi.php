<?php 
error_reporting(0);
// untuk akses root Unit Kerja
if (($_SESSION[Kode_Akses_Aset] == '1') or ($_SESSION[Kode_Akses_Aset] == '2') and ($_SESSION[Level_Aset] !== '4') ){
	
if ($_GET[act] == "download_doc"){
				echo "<script>window.open('aset/doc_aset_uin/".$_GET[file]."','_blank')</script>";
			echo "<script>window.location = '?menu=data-kwi&act=detail_aset&doc=".$_GET[doc]."'</script>";
			
}else if ($_GET[act] == "download2_doc"){
				echo "<script>window.open('aset/doc_aset_uin/".$_GET[file]."','_blank')</script>";
			echo "<script>window.location = '?menu=data-kwi'</script>";
			
}else if ($_GET[act] == "detail_aset") {
		$sql =mysql_query("select * from rf_aset_doc left join rf_aset_unit on rf_aset_doc.ID_Unit=rf_aset_unit.ID_Unit where rf_aset_doc.ID_Doc='$_GET[doc]'");
			$data = mysql_fetch_array($sql);	
?>
	
	<!-- Isi Halaman -->
<div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Proses Permohonan <small></small></h2>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Asal Berkas Permohonan</span>
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <input type="text" disabled id="asal" name=asal required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $data[Nama_Unit];?>">
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
					  
					  <?php
					  if ($data[File_Doc] !== '' ){
						  $doc = "<a href='?menu=data-kwi&act=download_doc&doc=".$data[ID_Doc]."&file=".$data[File_Doc]."' button type='cancel' class='btn btn-primary'>Download</button></a>";
					  }else{
						  $doc = "Tidak Ada File";
					  }
					  
					  if ($data[Kwitansi] !== '' ){
						  $kwi = "<a href='?menu=data-kwi&act=download_doc&doc=".$data[ID_Doc]."&file=".$data[Kwitansi]."' button type='cancel' class='btn btn-primary'>Download</button></a>";
					  }else{
						  $kwi = "Tidak Ada File";
					  }
					  
					  if ($data[Disposisi_TU] !== '' ){
						  $tu = "<a href='?menu=data-kwi&act=download_doc&doc=".$data[ID_Doc]."&file=".$data[Disposisi_TU]."' button type='cancel' class='btn btn-primary'>Download</button></a>";
					  }else{
						  $tu = "Tidak Ada File";
					  }
					  
					  if ($data[Disposisi_Rektor] !== '' ){
						  $rektor = "<a href='?menu=data-kwi&act=download_doc&doc=".$data[ID_Doc]."&file=".$data[Disposisi_Rektor]."' button type='cancel' class='btn btn-primary'>Download</button></a>";
					  }else{
						  $rektor = "Tidak Ada File";
					  }
					  
					  if ($data[Disposisi_Umum] !== '' ){
						  $umum = "<a href='?menu=data-kwi&act=download_doc&doc=".$data[ID_Doc]."&file=".$data[Disposisi_Umum]."' button type='cancel' class='btn btn-primary'>Download</button></a>";
					  }else{
						  $umum = "Tidak Ada File";
					  }
					  ?>
					  
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">File Dokumen Permohonan 
                        </label>
                          <?php echo $doc; ?>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">File Kwitansi Pengadaan 
                        </label>
                          <?php echo $kwi; ?>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">File Disposisi pada TU Rektorat 
                        </label>
                          <?php echo $tu; ?>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">File Disposisi Rektor 
                        </label>
                          <?php echo $rektor; ?>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">File Disposisi pada Kabag Umum 
                        </label>
                          <?php echo $umum; ?>
                      </div>
					  
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="?menu=data-kwi" button type="cancel" class="btn btn-success">Kembali</button></a>
                        </div>
                      </div>

                    </form>
					
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
                <h3>Menu Kwitansi Aset</h3>
              </div>
<!-- Batas Judul Halaman -->

<!-- Isi Halaman -->
<div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Data Kwitansi Pengadaan Aset UIN Raden Fatah Palembang <small>Sistem Informasi Manajemen Aset</small></h2>
                    <ul class='nav navbar-right panel_toolbox'>
                    </ul>
                    <div class='clearfix'></div>
                  </div>

                  <div class='x_content'>

                    <div class='table-responsive'>
                      <table id="datatable-ebni" class='table table-striped table-bordered'>
                        <thead>
                          <tr>
                            <th><center>No</th>
                            <th><center>Judul Permohonan</th>
                            <th><center>Asal Permohonan</th>
                            <th><center>Tanggal Pengajuan</th>
                            <th><center>Action</th>
                          </tr>
                        </thead>
                        <tbody>
						
						<?php
						
						$q = mysql_query('SELECT *
										FROM rf_aset_doc left join rf_aset_unit on rf_aset_doc.ID_Unit=rf_aset_unit.ID_Unit where rf_aset_doc.ID_Jenis_Doc = 1
										');
						
						$no=0;
						
						while($w=mysql_fetch_array($q)){
							
						$no++;
						
						$tgl = tgl_indo($w[Tanggal_Pengajuan]);	

						echo "
                          <tr>
                            <td>$no</td>
                            <td>$w[Judul_Doc]</td>
                            <td>$w[Nama_Unit]</td>
                            <td><center>$tgl</td>
                            <td><a href='?menu=data-kwi&act=detail_aset&doc=$w[ID_Doc]'><center>Detail</a></td>
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
			  
			  
			  <!-- Isi Halaman -->
<div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Data Kwitansi Perbaikan Aset UIN Raden Fatah Palembang <small>Sistem Informasi Manajemen Aset</small></h2>
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
                            <th><center>Judul Permohonan</th>
                            <th><center>Asal Permohonan</th>
                            <th><center>Tanggal Pengajuan</th>
                            <th><center>Action</th>
                          </tr>
                        </thead>
                        <tbody>
						
						<?php
						
						$dq = mysql_query('SELECT *
										FROM rf_aset_perbaikan left join rf_aset_doc on rf_aset_perbaikan.ID_Doc=rf_aset_doc.ID_Doc
										left join rf_aset_unit on rf_aset_doc.ID_Unit=rf_aset_unit.ID_Unit 
										');
						
						$no=0;
						
						while($dw=mysql_fetch_array($dq)){
							
						$no++;
								
						$dtgl = tgl_indo($dw[Tanggal_Pengajuan]);	
					  
					  if ($dw[Kwitansi_Perbaikan] !== '' ){
						  $down = "<a href='?menu=data-kwi&act=download2_doc&file=".$dw[Kwitansi_Perbaikan]."'>Download</a>";
					  }else{
						  $down = "Tidak Ada File";
					  }

						echo "
                          <tr>
                            <td>$no</td>
                            <td>$dw[Judul_Doc]</td>
                            <td>$dw[Nama_Unit]</td>
                            <td><center>$dtgl</td>
                            <td>$down</td>
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