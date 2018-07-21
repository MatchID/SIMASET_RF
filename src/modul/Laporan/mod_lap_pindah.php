<?php 
error_reporting(0);
// untuk akses root modul
if (($_SESSION[Kode_Akses_Aset] == '5') or ($_SESSION[Kode_Akses_Aset] == '2') and ($_SESSION[Level_Aset] !== '4') ){
	
	
		if ($_GET[prt] == "cetak"){
				echo "<script>window.open('aset/cetak/pindah/cetak.keadaan-laporan.php?print=unit&unit=".$_REQUEST[unit]."','_blank')</script>";	
		}
		
		
		if ($_GET[act] == "download_doc"){
			$q = mysql_query("SELECT *
										FROM rf_aset_doc where ID_Doc='$_GET[doc]'");
			$w=mysql_fetch_array($q);
			
				echo "<script>window.open('aset/doc_aset_uin/".$w[File_Doc]."','_blank')</script>";
			
		}

?>


<!-- Judul Halaman -->
<div role='main'>
          <div class=''>
            <div class='page-title'>
              <div class='title_left'>
                <h3>Menu Pemindahan Aset</h3>
              </div>
<!-- Batas Judul Halaman -->

<!-- Isi Halaman -->
<div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Data Pergerakan Inventaris UIN Raden Fatah Palembang <small>Sistem Informasi Manajemen Aset</small></h2>
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
                            <th>Lokasi Awal</th>
                            <th>Lokasi Baru</th>
                            <th>Dokumen</th>
                          </tr>
                        </thead>
                        <tbody>
						
						<?php
						
						$q = mysql_query("SELECT *
										FROM rf_aset_pergerakan left join rf_aset_barang_detail on rf_aset_pergerakan.id=rf_aset_barang_detail.id
										left join rf_aset_barang on rf_aset_barang_detail.ID_Barang=rf_aset_barang.ID_Barang
										left join rf_aset_barang_tipe on rf_aset_barang.ID_Tipe=rf_aset_barang_tipe.ID_Tipe
										left join rf_aset_doc on rf_aset_pergerakan.ID_Doc=rf_aset_doc.ID_Doc
										where rf_aset_barang_detail.ID_Hapus = '0'
										");
						
						$no=0;
						
						while($w=mysql_fetch_array($q)){
						
						$q1 = mysql_query("SELECT *
										FROM rf_aset_pergerakan left join rf_aset_unit on rf_aset_pergerakan.ID_Unit_Lama=rf_aset_unit.ID_Unit
										where rf_aset_pergerakan.ID_Pergerakan = '$w[ID_Pergerakan]'
										");
						$w1=mysql_fetch_array($q1);
						
						$q2 = mysql_query("SELECT *
										FROM rf_aset_pergerakan left join rf_aset_unit on rf_aset_pergerakan.ID_Unit_Baru=rf_aset_unit.ID_Unit
										where rf_aset_pergerakan.ID_Pergerakan = '$w[ID_Pergerakan]'
										");
						$w2=mysql_fetch_array($q2);
							
						$no++;
								
						echo "
                          <tr>
                            <td>$no</td>
                            <td>$w[Nama_Tipe]</td>
                            <td>$w[Merk_Barang]</td>
                            <td><center>$w[Inventaris]<br>$w[ID_Inventaris].$w[ID_Brg_Detail]</td>
                            <td>$w[Tahun_Barang]</td>
                            <td>$w1[Nama_Unit]</td>
                            <td>$w2[Nama_Unit]</td>
                            <td><a href='?menu=lap_pindah&act=download_doc&doc=$w[ID_Doc]'><center>Download</a></td>
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
		
	
}else{
		if (empty(include "src/error/module_403.html")){
			echo "<script>window.location = '../../?r=403'</script>";
		}
    } 
?>   