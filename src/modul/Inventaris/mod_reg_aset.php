<?php 
error_reporting(0);
// untuk akses root Unit Kerja
if (($_SESSION[Kode_Akses_Aset] !== '0') || ($_SESSION[Kode_Akses_Aset] == '1')){
	
	
	if ($_GET[act] == "tambah_aset"){
		$q = mysql_query("SELECT *
										FROM rf_aset_barang left join rf_aset_kategori on rf_aset_barang.ID_Kategori=rf_aset_kategori.ID_Kategori
										left join rf_aset_unit on rf_aset_barang.ID_Unit=rf_aset_unit.ID_Unit
										left join rf_aset_barang_tipe on rf_aset_barang.ID_Tipe=rf_aset_barang_tipe.ID_Tipe where rf_aset_barang.ID_Barang='$_GET[aset]'
										");
	$w=mysql_fetch_array($q);
	
	
?>
	<!-- Isi Halaman -->
<div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Register Aset <small></small></h2>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jumlah Barang</span>
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <input type="text" disabled id="jumlah" name=jumlah required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $w[Jumlah_Barang];?>">
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Harga Satuan (Rp)</span>
                        </label>
                        <div class="col-md-2 col-sm-2 col-xs-2">
                          <input type="text" id="harga" name=harga required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">File Kwitansi Pembelian 
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <input type=file name=file required="required">
                        </div>
                      </div>
					  
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="?menu=reg_aset"<button type="cancel" class="btn btn-primary">Batal</button></a>
                          <button type="submit" class="btn btn-success" name=simpan value='Simpan'>Daftarkan Aset</button>
                        </div>
                      </div>

                    </form>
					
                  </div>
                </div>
              </div>
            </div>


<?php

		if(isset($_POST['simpan'])){
			
				$q = mysql_query("SELECT *
										FROM rf_aset_barang left join rf_aset_kategori on rf_aset_barang.ID_Kategori=rf_aset_kategori.ID_Kategori
										left join rf_aset_unit on rf_aset_barang.ID_Unit=rf_aset_unit.ID_Unit
										left join rf_aset_barang_tipe on rf_aset_barang.ID_Tipe=rf_aset_barang_tipe.ID_Tipe
										left join rf_aset_doc on rf_aset_barang.ID_Doc=rf_aset_doc.ID_Doc where rf_aset_barang.ID_Barang='$_GET[aset]'
										");
				$w=mysql_fetch_array($q);
				
				$tipe = $w[ID_Tipe];
				$barang = $w[ID_Barang];
				$unit = $w[ID_Unit];
				$jumlah = $w[Jumlah_Barang];
				$dokumen = $w[ID_Doc];
				$y = date( "Y" );
				$aa="025.04.1100.424208.000.".$y;
				
				$sql2= mysql_query("select * from rf_aset_barang_detail where ID_Tipe=$tipe ORDER BY ID_Brg_Detail DESC LIMIT 1  ");
				$data2 = mysql_fetch_array($sql2);
			
					//echo "data-coba ".$data2[ID_Brg_Detail];
			
				if ($data2[ID_Brg_Detail] == null){
					$id = 000;
				}else{
					$id=$data2[ID_Brg_Detail];
				}
				
				for ($i=0; $i<$jumlah; $i++){
				
				$id++;
				$Inv = "025.04.1100.424208.000.";
				mysql_query("insert into rf_aset_barang_detail set
									Inventaris='$aa',
									ID_Brg_Detail=$id,
									ID_Tipe=$tipe,
									ID_Unit=$unit,
									ID_Barang=$barang,
									ID_Kondisi=1 ");
  
							
				}
				//$totalharga = $jumlah*$_POST[harga];
				mysql_query("Update rf_aset_barang set 
									ID_Barang='$barang',
									Harga_Satuan='$_POST[harga]'
									where ID_Barang='$barang'");
			
			
			
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
									ID_Doc='$w[ID_Doc]',
									ID_Status_Doc='12',
									Kwitansi='$filenya'
									where ID_Doc='$w[ID_Doc]'");
  
			
							BerhasilSimpan("?menu=reg_aset",500);
							histori("Input Register Aset", "Register Aset $_POST[nama]");
					
					}else{
					echo "Upload Gagal";
					}
			}else{
				FileSalah("?menu=reg_aset&act=tambah_aset");
			}
			
			
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
                <h3>Menu Register Aset</h3>
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
						
						$q = mysql_query('SELECT *
										FROM rf_aset_barang left join rf_aset_kategori on rf_aset_barang.ID_Kategori=rf_aset_kategori.ID_Kategori
										left join rf_aset_unit on rf_aset_barang.ID_Unit=rf_aset_unit.ID_Unit
										left join rf_aset_barang_tipe on rf_aset_barang.ID_Tipe=rf_aset_barang_tipe.ID_Tipe
										');
						
						$no=0;
						
						while($w=mysql_fetch_array($q)){
							
							$a1 = mysql_query("Select * from rf_aset_barang_detail where ID_Tipe=$w[ID_Tipe] and ID_Barang=$w[ID_Barang] and ID_Unit=$w[ID_Unit] ORDER BY ID_Brg_Detail ASC LIMIT 1 ");
							$wa1=mysql_fetch_array($a1);
							
							$a2 = mysql_query("Select * from rf_aset_barang_detail where ID_Tipe=$w[ID_Tipe] and ID_Barang=$w[ID_Barang] and ID_Unit=$w[ID_Unit] ORDER BY ID_Brg_Detail DESC LIMIT 1 ");
							$wa2=mysql_fetch_array($a2);
							
						$no++;
								

						if ($wa1 == null){
							$reg = "Belum Di Register";
							$tempat = "Belum Ada Penempatan";
						echo "
                          <tr class='even pointer'>
                            <td>$no</td>
                            <td>$w[Nama_Tipe]</td>
                            <td>$w[Merk_Barang]</td>
                            <td>$reg</td>
                            <td>$w[Tahun_Barang]</td>
                            <td>$w[Nama_Unit]</td>
                            <td>$tempat</td>
                            <td class=' last'><a href='?menu=reg_aset&act=tambah_aset&aset=$w[ID_Barang]'><center>Register</a>
                            </td>
                          </tr>
							";
						}else{
							$reg =$wa1[Inventaris]." <br> ". $w[ID_Inventaris].".<b> ".$wa1[ID_Brg_Detail]." - ".$wa2[ID_Brg_Detail]."</b>";
							$tempat = "Sudah Di Tempatkan";
						echo "
                          <tr class='even pointer'>
                            <td>$no</td>
                            <td>$w[Nama_Tipe]</td>
                            <td>$w[Merk_Barang]</td>
                            <td><center>$reg</td>
                            <td>$w[Tahun_Barang]</td>
                            <td>$w[Nama_Unit]</td>
                            <td>$tempat</td>
                            <td><center>-</a> 
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