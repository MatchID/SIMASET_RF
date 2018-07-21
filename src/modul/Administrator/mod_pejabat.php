<?php 
error_reporting(0);
// untuk akses root user
if ($_SESSION[Akses_Aset] == super){
	
	if ($_GET[act] == "tambah_pejabat"){
?>
	<!-- Isi Halaman -->
<div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Tambah Pejabat <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
					
                    <form method=post action='' enctype='multipart/form-data' id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Pejabat</span>
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <input type="text" id="nama" name=nama required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">NIP</span>
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <input type="text" id="nip" name=nip required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					                      
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Golongan</label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <select required="required" class="form-control" id="gol" name=gol>
                            <option selected disabled>Pilih Golongan</option>
							<option value="IV A" >IV A</option>
							<option value="IV B">IV B</option>
							<option value="IV C">IV C</option>
							<option value="IV D">IV D</option>
							<option value="IV E">IV E</option>
							<option value="III A">III A</option>
							<option value="III B">III B</option>
							<option value="III C">III C</option>
							<option value="III D">III D</option>
                          </select>
                        </div>
                      </div>
					                      
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jabatan</label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <select required="required" class="form-control" id="jabatan" name=jabatan>
                            <option selected disabled>Pilih Jabatan</option>
							<option value="Rektor" >Rektor</option>
							<option value="Kasubag BMN">Kasubag BMN</option>
							<option value="Kabag Umum">Kabag Umum</option>
                          </select>
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Status Pejabat</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="radio" id="status" name=status required="required" value="1"> Aktif <br>
                          <input type="radio" id="status" name=status required="required" value="0"> Tidak Aktif
                        </div>
                      </div>
					  
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="?menu=pejabat"<button type="cancel" class="btn btn-primary">Batal</button></a>
                          <button type="submit" class="btn btn-success" name=simpan value='Simpan'>Tambah Pejabat</button>
                        </div>
                      </div>

                    </form>
					
                  </div>
                </div>
              </div>
            </div>


<?php

		if(isset($_POST['simpan'])){
			
			$cekq =mysql_query("select * from rf_aset_pejabat where Jabatan_Pejabat='$_POST[jabatan]' and Status_Pejabat='1'");
			$cek = mysql_fetch_array($cekq);
			
			if ($cek[Status_Pejabat] !== null){
				mysql_query("Update rf_aset_pejabat set 
									Status_Pejabat='0'
									where ID_Pejabat='$cek[ID_Pejabat]'");
				
			}
			
			mysql_query("insert into rf_aset_pejabat set 
									ID_Pejabat=null,
									NIP='$_POST[nip]',
									Nama_Pejabat='$_POST[nama]',
									Gol_Pejabat='$_POST[gol]',
									Jabatan_Pejabat='$_POST[jabatan]',
									Status_Pejabat='$_POST[status]' ");
  
							BerhasilSimpan("?menu=pejabat",500);
							histori("Input Pejabat", "Tambah Pejabat $_POST[nama] ke dalam Sistem");
		}
	}else if ($_GET[act] == "edit_pejabat"){
		$sql =mysql_query("select * from rf_aset_pejabat where ID_Pejabat='$_GET[pejabat]'");
			$data = mysql_fetch_array($sql);				
		?> 
	<!-- Isi Halaman -->
<div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Edit Pejabat <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
					
                    <form method=post action='' enctype='multipart/form-data' id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Pejabat</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nama" name=nama required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $data[Nama_Pejabat];?>">
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Pejabat</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nip" name=nip required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $data[NIP];?>">
                        </div>
                      </div>
					                      
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Golongan</label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <select required="required" class="form-control" id="gol" name=gol>
                            <option disabled>Pilih Golongan</option>
							<?php if ($data[Gol_Pejabat] == "IV A"){ ?>
							<option value="IV A" selected>IV A</option>
							<option value="IV B">IV B</option>
							<option value="IV C">IV C</option>
							<option value="IV D">IV D</option>
							<option value="IV E">IV E</option>
							<option value="III A">III A</option>
							<option value="III B">III B</option>
							<option value="III C">III C</option>
							<option value="III D">III D</option>
							<?php							
							}else if ($data[Gol_Pejabat] == "IV B"){ ?>
							<option value="IV A" >IV A</option>
							<option value="IV B" selected>IV B</option>
							<option value="IV C">IV C</option>
							<option value="IV D">IV D</option>
							<option value="IV E">IV E</option>
							<option value="III A">III A</option>
							<option value="III B">III B</option>
							<option value="III C">III C</option>
							<option value="III D">III D</option>
							<?php
							}else if ($data[Gol_Pejabat] == "IV C"){ ?>
							<option value="IV A" >IV A</option>
							<option value="IV B">IV B</option>
							<option value="IV C" selected>IV C</option>
							<option value="IV D">IV D</option>
							<option value="IV E">IV E</option>
							<option value="III A">III A</option>
							<option value="III B">III B</option>
							<option value="III C">III C</option>
							<option value="III D">III D</option>
							<?php
							}else if ($data[Gol_Pejabat] == "IV D"){ ?>
							<option value="IV A" >IV A</option>
							<option value="IV B">IV B</option>
							<option value="IV C">IV C</option>
							<option value="IV D" selected>IV D</option>
							<option value="IV E">IV E</option>
							<option value="III A">III A</option>
							<option value="III B">III B</option>
							<option value="III C">III C</option>
							<option value="III D">III D</option>
							<?php
							}else if ($data[Gol_Pejabat] == "IV E"){ ?>
							<option value="IV A" >IV A</option>
							<option value="IV B">IV B</option>
							<option value="IV C">IV C</option>
							<option value="IV D">IV D</option>
							<option value="IV E" selected>IV E</option>
							<option value="III A">III A</option>
							<option value="III B">III B</option>
							<option value="III C">III C</option>
							<option value="III D">III D</option>
							<?php
							}else if ($data[Gol_Pejabat] == "III A"){ ?>
							<option value="IV A" >IV A</option>
							<option value="IV B">IV B</option>
							<option value="IV C">IV C</option>
							<option value="IV D">IV D</option>
							<option value="IV E">IV E</option>
							<option value="III A" selected>III A</option>
							<option value="III B">III B</option>
							<option value="III C">III C</option>
							<option value="III D">III D</option>
							<?php
							}else if ($data[Gol_Pejabat] == "III B"){ ?>
							<option value="IV A" >IV A</option>
							<option value="IV B">IV B</option>
							<option value="IV C">IV C</option>
							<option value="IV D">IV D</option>
							<option value="IV E">IV E</option>
							<option value="III A">III A</option>
							<option value="III B" selected>III B</option>
							<option value="III C">III C</option>
							<option value="III D">III D</option>
							<?php
							}else if ($data[Gol_Pejabat] == "III C"){ ?>
							<option value="IV A" >IV A</option>
							<option value="IV B">IV B</option>
							<option value="IV C">IV C</option>
							<option value="IV D">IV D</option>
							<option value="IV E">IV E</option>
							<option value="III A">III A</option>
							<option value="III B">III B</option>
							<option value="III C" selected>III C</option>
							<option value="III D">III D</option>
							<?php
							}else if ($data[Gol_Pejabat] == "III D"){ ?>
							<option value="IV A" >IV A</option>
							<option value="IV B">IV B</option>
							<option value="IV C">IV C</option>
							<option value="IV D">IV D</option>
							<option value="IV E">IV E</option>
							<option value="III A">III A</option>
							<option value="III B">III B</option>
							<option value="III C">III C</option>
							<option value="III D" selected>III D</option>
							<?php
							}?>
                          </select>
                        </div>
                      </div>
					                      
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jabatan</label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <select required="required" class="form-control" id="jabatan" name=jabatan>
                            <option disabled>Pilih Jabatan</option>
							<?php if ($data[Jabatan_Pejabat] == "Rektor"){ ?>
							<option value="Rektor" selected>Rektor</option>
							<option value="Kasubag BMN">Kasubag BMN</option>
							<option value="Kabag Umum">Kabag Umum</option>
							<?php 
							}elseif ($data[Jabatan_Pejabat] == "Kasubag BMN"){ ?>
							<option value="Rektor" >Rektor</option>
							<option value="Kasubag BMN" selected>Kasubag BMN</option>
							<option value="Kabag Umum">Kabag Umum</option>
							<?php 
							}elseif ($data[Jabatan_Pejabat] == "Kabag Umum"){ ?>
							<option value="Rektor" >Rektor</option>
							<option value="Kasubag BMN">Kasubag BMN</option>
							<option value="Kabag Umum" selected>Kabag Umum</option>
							<?php 
							}?>
                          </select>
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Status Pejabat</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						<?php if($data[Status_Pejabat] == "1") {?>
						<input type="radio" id="status" name=status required="required" checked value="1"> Aktif <br> 
						<input type="radio" id="status" name=status required="required" value="0"> Tidak Aktif <?php }else{ ?>
						<input type="radio" id="status" name=status required="required" value="1"> Aktif <br> 
						<input type="radio" id="status" name=status required="required" checked value="0"> Tidak Aktif <?php } ?>
                        </div>
                      </div>
					  
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="?menu=pejabat"<button type="cancel" class="btn btn-primary">Batal</button></a>
                          <button type="submit" class="btn btn-success" name=edit value='edit'>Edit Pejabat</button>
                        </div>
                      </div>

                    </form>
					
                  </div>
                </div>
              </div>
            </div>
			<?php
		if(isset($_POST['edit'])){			
			
			$cekq =mysql_query("select * from rf_aset_pejabat where Jabatan_Pejabat='$_POST[jabatan]' and Status_Pejabat='1'");
			$cek = mysql_fetch_array($cekq);
			
			if ($cek[Status_Pejabat] !== null){
				mysql_query("Update rf_aset_pejabat set 
									Status_Pejabat='0'
									where ID_Pejabat='$cek[ID_Pejabat]'");
				
			}
			
			mysql_query("Update rf_aset_pejabat set 
									ID_Pejabat='$_REQUEST[pejabat]',
									NIP='$_POST[nip]',
									Nama_Pejabat='$_POST[nama]',
									Gol_Pejabat='$_POST[gol]',
									Jabatan_Pejabat='$_POST[jabatan]',
									Status_Pejabat='$_POST[status]'
									where ID_Pejabat='$_REQUEST[pejabat]'");
  
							BerhasilSimpan("?menu=pejabat",500);
							histori("Edit pejabat", "Edit pejabat $_POST[nama]");
		}
	}else if ($_GET[act] == "delete_pejabat"){
$sql =mysql_query("select * from rf_aset_pejabat where ID_Pejabat='$_REQUEST[pejabat]'");
$data = mysql_fetch_array($sql);
histori("Delete Pejabat Sistem", "Hapus Pejabat Sistem > $data[Nama_Pejabat]");

mysql_query("delete from rf_aset_pejabat where ID_Pejabat='$_REQUEST[pejabat]'" );
BerhasilHapus("?menu=pejabat",500);
	}else{
?>


<!-- Judul Halaman -->
<div role='main'>
          <div class=''>
            <div class='page-title'>
              <div class='title_left'>
                <h3>Menu Pejabat</h3>
              </div>
<!-- Batas Judul Halaman -->

<!-- Isi Halaman -->
<div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Data Pejabat <small>Sistem Informasi Manajemen Aset</small></h2>
                    <ul class='nav navbar-right panel_toolbox'>
                    </ul>
                    <div class='clearfix'></div>
                  </div>

                  <div class='x_content'>

                    <a class='btn btn-app' href='?menu=pejabat&act=tambah_pejabat'><i class='fa fa-plus btn btn-flat'> Pejabat</i></a>

                    <div class='table-responsive'>
                      <table id="datatable-buttons" class='table table-striped table-bordered'>
                        <thead>
                          <tr class='headings'>
                            <th class='column-title'>No</th>
                            <th class='column-title'>Nama Pejabat</th>
                            <th class='column-title'>NIP</th>
                            <th class='column-title'>Golongan</th>
                            <th class='column-title'>Jabatan</th>
                            <th class='column-title'>Status</th>
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
										FROM rf_aset_pejabat');
						while($w=mysql_fetch_array($q)){
							
							if ($w[Status_Pejabat] == "1"){
								$status = "Aktif";
							}else{ $status = "Tidak Aktif";}
							$no++;
													
						echo "
                          <tr class='even pointer'>
                            <td>$no</td>
                            <td>$w[Nama_Pejabat]</td>
                            <td>$w[NIP]</td>
                            <td>$w[Gol_Pejabat]</td>
                            <td>$w[Jabatan_Pejabat]</td>
                            <td>$status</td>";
							
							if ($w[ID_Akun] == "1"){
						echo"
                            <td class=' last'><a href='?menu=pejabat&act=edit_pejabat&pejabat=$w[ID_Akun]'><center>Edit</a>
                            </td>
                          </tr>
							";								
							}else{
						echo"
                            <td class=' last'><a href='?menu=pejabat&act=edit_pejabat&pejabat=$w[ID_Pejabat]'><center>Edit</a> | <a href='?menu=pejabat&act=delete_pejabat&pejabat=$w[ID_Pejabat]'>Hapus</a>
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