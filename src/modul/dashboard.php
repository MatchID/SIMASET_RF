<?php 
	if (isset($_GET[act])){
		?>
		
<!-- Content Header (Page header) -->
    <div role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Dashboard</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <h2>Universitas Islam Negeri Raden Fatah Palembang</h2>
                  <div class="x_content" align='center'>
				  <br>
				  <br>
				  <?php
					if ($_GET[act] == "adm"){
						echo "<a class='btn btn-app' href='?menu=user'>
                      <i class='fa fa-users'></i> Pengguna
                    </a>
                    <a class='btn btn-app' href='?menu=pejabat'>
                      <i class='fa fa-user'></i> Pejabat
                    </a>";
					}else if ($_GET[act] == "data"){
						echo "<a class='btn btn-app' href='?menu=unit_kerja'>
                      <i class='fa fa-institution'></i> Unit Kerja
                    </a>
                    <a class='btn btn-app' href='?menu=kategori_barang'>
                      <i class='fa fa-hdd-o'></i> Kategori Barang
                    </a>
                    <a class='btn btn-app' href='?menu=barang_tipe'>
                      <i class='fa fa-hdd-o'></i> Barang
                    </a>
                    <a class='btn btn-app' href='?menu=barang'>
                      <i class='fa fa-hdd-o'></i> Aset
                    </a>";
					}else if ($_GET[act] == "inv"){
						echo "<a class='btn btn-app' href='?menu=reg_aset'>
                      <i class='fa fa-tasks'></i> Register Aset
                    </a>
                    <a class='btn btn-app' href='?menu=daf_aset'>
                      <i class='fa fa-tasks'></i> Data Aset
                    </a>
                    <a class='btn btn-app' href='?menu=pindah_aset'>
                      <i class='fa fa-tasks'></i> Pemindahan Aset
                    </a>
                    <a class='btn btn-app' href='?menu=perbaikan_aset'>
                      <i class='fa fa-tasks'></i> Perbaikan Aset
                    </a>
                    <a class='btn btn-app' href='?menu=hapus_aset'>
                      <i class='fa fa-tasks'></i> Penghapusan Aset
                    </a>";
					}else if ($_GET[act] == "rektor"){
						echo "<a class='btn btn-app' href='?menu=doc_baru'>
                      <i class='fa fa-newspaper-o'></i> Permohonan Aset
                    </a>";
					}else if ($_GET[act] == "unit"){
						echo "<a class='btn btn-app' href='?menu=doc_baru_kep'>
                      <i class='fa fa-newspaper-o'></i> Permohonan Aset
                    </a>
					<a class='btn btn-app' href='?menu=doc_lapor'>
                      <i class='fa fa-newspaper-o'></i> Perbaikan Aset
                    </a>
					<a class='btn btn-app' href='?menu=data-aset'>
                      <i class='fa fa-newspaper-o'></i> Data Aset
                    </a>";
					}else if ($_GET[act] == "lap"){
						echo "<a class='btn btn-app' href='?menu=lap_kondisi'>
                      <i class='fa fa-print'></i> Laporan Kondisi
                    </a>
					<a class='btn btn-app' href='?menu=lap_Pengajuan'>
                      <i class='fa fa-print'></i> Laporan Pengajuan
                    </a>
					<a class='btn btn-app' href='?menu=data-kwi'>
                      <i class='fa fa-file'></i> Kwitansi
                    </a>";
					}
				  ?>
				  
				  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
		<?php
	}else{
		?>
<!-- Content Header (Page header) -->
    <div role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Dashboard</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <h2>Universitas Islam Negeri Raden Fatah Palembang</h2>
                  <div class="x_content" align='center'>
				  <br>
				  <br>
				  
				  <?php if($_SESSION[Level_Aset] == '1'){ 
					  //super?>
                    <a class="btn btn-app" href="?menu=dashboard&act=adm">
                      <i class="fa fa-cog"></i> Administrator
                    </a>
                    <a class="btn btn-app" href="?menu=dashboard&act=inv">
                      <i class="fa fa-tasks"></i> Inventaris
                    </a>
                    <a class="btn btn-app" href="?menu=histori">
                      <i class="fa fa-history"></i> Histori
                    </a>
				  <?php }else if($_SESSION[Level_Aset] == '2'){ 
					  //admin?>
                    <a class="btn btn-app" href="?menu=dashboard&act=data">
                      <i class="fa fa-archive"></i> Data Master
                    </a>
                    <a class="btn btn-app" href="?menu=dashboard&act=inv">
                      <i class="fa fa-tasks"></i> Inventaris
                    </a>
                    <a class="btn btn-app" href="?menu=dashboard&act=rektor">
                      <i class="fa fa-newspaper-o"></i> Rektorat
                    </a>
                    <a class="btn btn-app" href="?menu=dashboard&act=lap">
                      <i class="fa fa-print"></i> Laporan
                    </a>
				  <?php }else if($_SESSION[Level_Aset] == '3'){ 
					  //tu unit kerja?>
                    <a class="btn btn-app" href="?menu=dashboard&act=unit">
                      <i class="fa fa-newspaper-o"></i> Unit Kerja
                    </a>
				  <?php }else if($_SESSION[Level_Aset] == '4'){ 
					  //tu rektorat?>
                    <a class="btn btn-app" href="?menu=dashboard&act=rektor">
                      <i class="fa fa-newspaper-o"></i> Rektorat
                    </a>
                    <a class="btn btn-app" href="?menu=dashboard&act=lap">
                      <i class="fa fa-print"></i> Laporan
                    </a>
				  <?php }else if($_SESSION[Level_Aset] == '5'){ 
					  //kabag umum fakultas?>
                    <a class="btn btn-app" href="?menu=dashboard&act=unit">
                      <i class="fa fa-newspaper-o"></i> Unit Kerja
                    </a>
				  <?php }else if($_SESSION[Level_Aset] == '6'){ 
					  //kabag umum rektorat?>
                    <a class="btn btn-app" href="?menu=dashboard&act=rektor">
                      <i class="fa fa-newspaper-o"></i> Rektorat
                    </a>
                    <a class="btn btn-app" href="?menu=dashboard&act=lap">
                      <i class="fa fa-print"></i> Laporan
                    </a>
				  <?php }else if($_SESSION[Level_Aset] == '7'){ 
					  //dekan?>
                    <a class="btn btn-app" href="?menu=dashboard&act=unit">
                      <i class="fa fa-newspaper-o"></i> Unit Kerja
                    </a>
				  <?php }else if($_SESSION[Level_Aset] == '8'){ 
					  //rektor?>
                    <a class="btn btn-app" href="?menu=dashboard&act=rektor">
                      <i class="fa fa-newspaper-o"></i> Rektorat
                    </a>
                    <a class="btn btn-app" href="?menu=dashboard&act=lap">
                      <i class="fa fa-print"></i> Laporan
                    </a>
				  <?php } ?>
				  
				  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
	<?php }
	?>