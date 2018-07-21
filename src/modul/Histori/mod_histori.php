<?php 
error_reporting(0);
// untuk akses root Unit Kerja
if ($_SESSION[Akses_Aset] == super){
	

?>


<!-- Judul Halaman -->
<div role='main'>
          <div class=''>
            <div class='page-title'>
              <div class='title_left'>
                <h3>Histori</h3>
              </div>
<!-- Batas Judul Halaman -->

<!-- Isi Halaman -->
<div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Histori Sistem <small>Sistem Informasi Manajemen Aset</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class='clearfix'></div>
                  </div>

                  <div class='x_content'>

                    <div class='table-responsive'>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Nama</th>
                            <th>Level</th>
                            <th>Username</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Deskripsi</th>
                          </tr>
                        </thead>
                        <tbody>
						
						<?php
						
						$q = mysql_query('SELECT *
										FROM rf_aset_histori_sistem left join rf_aset_akun on rf_aset_histori_sistem.ID_Akun=rf_aset_akun.ID_Akun
										left join rf_aset_level on rf_aset_akun.ID_Level=rf_aset_level.ID_Level order by rf_aset_histori_sistem.Tanggal_Histori, rf_aset_histori_sistem.Waktu_Histori asc
										');
						while($w=mysql_fetch_array($q)){
													
						echo "
                          <tr>
                            <td>$w[ID_Histori]</td>
                            <td>$w[Judul_Histori]</td>
                            <td>$w[Nama_Akun]</td>
                            <td>$w[Inisial_Level]</td>
                            <td>$w[Username]</td>
                            <td>$w[Tanggal_Histori]</td>
                            <td>$w[Waktu_Histori]</td>
                            <td>$w[Deskripsi_Histori]</td>
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