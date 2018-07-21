<?php
session_start();
error_reporting(0);
require_once "config/lib.session.php";
include_once "config/lib.match.php";
include_once "config/db.mysql.php";
include_once "config/db.connect.php";
include_once "config/fungsi.indo.php";

//	echo "Kode Menu Aset : ".$_SESSION[Kode_Menu_Aset].", Kode Akses Aset : ".$_SESSION[Kode_Akses_Aset].", Akses Aset : ".$_SESSION[Akses_Aset].", Status Aset : ".$_SESSION[Status_Aset].", Kode Aset : ".$_SESSION[Kode_Aset].", Nama Aset : ".$_SESSION[Nama_Aset].", Username Aset : ".$_SESSION[Username_Aset].", Level Aset : ".$_SESSION[Level_Aset].", Nama Level : ".$_SESSION[Jabatan_Aset].", Unit Level : ".$_SESSION[Unit_Aset]." === benar";

if (isset($_GET[r])){

	if ($_GET[r] == "404"){
		include "src/error/page_404.html";
	}else if ($_GET[r] == "403"){
		include "src/error/page_403.html";
	}else if ($_GET[r] == "500"){
		include "src/error/page_500.html";
	}else{
		if (!login_check_aset()){
			echo "<script>window.location = 'aset/'</script>";
			exit(0);
		}else{
			echo "<script>window.location = '?menu=dashboard'</script>";
		}
	}
	
}else{
		
if (isset($_GET[keluar])){

	histori("Logout", "Logout Sistem");
	/**
	mysql_query("update rf_aset_akun set
      Online='0' 
      where ID_Akun='".$_SESSION[Kode_Aset]."'");
    */
	
  session_destroy();
  echo "<script>window.location = 'aset/'</script>";  
}


if (!login_check_aset()){
  echo "<script>window.location = 'aset/'</script>";
  exit(0);
}

if ($_SESSION[Kode_Akses_Aset] == null){
	session_destroy();
	echo "<script>window.location = 'aset/'</script>";
}

if (empty($_GET[menu])){
  echo "<script>window.location = '?menu=dashboard'</script>";
}


$namalvl = _selek("SELECT * FROM rf_aset_level where ID_Level='$_SESSION[Level_Aset]'");

$jmlpesan = mysql_num_rows(mysql_query("SELECT * FROM rf_aset_akun where Online='0'"));
$pesan = mysql_query("SELECT * FROM rf_aset_akun where Online='0'");


function icox($lev){
  if ($lev=="1")
    $a="<i class='fa fa-trash'>";
  else
    $a="";
  
  return $a;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistem Informasi Manajemen Aset | Universitas Islam Negeri Raden Fatah Palembang</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- jVectorMap -->
    <link href="aset/css/maps/jquery-jvectormap-2.0.3.css" rel="stylesheet"/>
    <!-- Datatables -->
    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="aset/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="?menu=dashboard" class="site_title"><center><span>UIN Raden Fatah</span></center></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="aset/images/uin.png" alt="..." width="110%" class="profile_img">
              </div>
              <div class="profile_info">
                <span> Selamat Datang,</span>
                <h2> <?php echo $namalvl[Inisial_Level]; ?></h2><br>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>MAIN MENU</h3>
                <ul class="nav side-menu">
                  <?php
		$akses = $_SESSION[Kode_Akses_Aset];
		$Status = $_SESSION[Status_Aset];
		if ($akses == '0'){
			$r=mysql_query("select * from rf_aset_menu ");}
		else if ($akses == '1'){
			$r=mysql_query("select Link, Judul_Menu,ID_Menu,Icon  from rf_aset_menu where not Level='0' and not Level='3' and not Judul_Menu='Histori'");}	
		else if ($akses == '2'){
			$r=mysql_query("select Link, Judul_Menu,ID_Menu,Icon  from rf_aset_menu where not Level='0' and not Level='1' and not Level='3' and not Level='4' and not Judul_Menu='Histori'");}	
		else if ($akses == '3'){
			$r=mysql_query("select Link, Judul_Menu,ID_Menu,Icon  from rf_aset_menu where not Level='0' and not Level='1' and not Level='2' and not Judul_Menu='Histori'");}
		else {
			$r=mysql_query("select Link, Judul_Menu,ID_Menu,Icon  from rf_aset_menu where not Level='0' and not Level='1' and not Level='2' and not Judul_Menu='Histori'");}	
		while($w=mysql_fetch_array($r)){			
			$jml=mysql_query(" select count(*) as j from rf_aset_menu_sub where ID_Menu='$w[ID_Menu]' ");
				if ($jml >=1 ){
					
					$ceklink=mysql_query("select * from rf_aset_menu_sub where Link_Sub='$_GET[menu]'");
					$ceklink2=mysql_fetch_array($ceklink);
					if ($_GET[menu] == $ceklink2[Link_Sub]){						
					
						$cek = mysql_query("SELECT *
										FROM rf_aset_menu_sub left join rf_aset_menu on rf_aset_menu_sub.ID_Menu = rf_aset_menu.ID_Menu where Link_Sub ='$_GET[menu]'");
								while($cek2=mysql_fetch_array($cek)){
							if ($cek2[Judul_Menu] == $w[Judul_Menu]){
								echo"
										<li class='active'>
											<a>
												<i class='fa $w[Icon]'></i> <span>$w[Judul_Menu]  </span>
											</span>
											</a>
											<ul class='nav child_menu' style='display: block;'>";
								
							}else{
								echo"
										<li>
											<a>
												<i class='fa $w[Icon]'></i> <span>$w[Judul_Menu]  </span>
											</span>
											</a>
											<ul class='nav child_menu'>";
							}
						}
					}else{
						echo"
							<li>
								<a>
									<i class='fa $w[Icon]'></i> <span>$w[Judul_Menu]  </span>
								</span>
								</a>
									<ul class='nav child_menu'>";
					}
					
							if ($Status == '1'){
								$r2=mysql_query("select * from rf_aset_menu_sub where ID_Menu ='$w[ID_Menu]'");}
							else if($Status == '3'){
								$r2=mysql_query("select * from rf_aset_menu_sub where ID_Menu ='$w[ID_Menu]'");}
							else{
								$r2=mysql_query("select * from rf_aset_menu_sub where ID_Menu ='$w[ID_Menu]'");} 
								while($w2=mysql_fetch_array($r2)){
									if ($w2[Link_Sub] == $_GET[menu]){
										echo"
											<li class='current-page'><a href='?menu=$w2[Link_Sub]'><i class='fa $w2[Icon_Sub]'></i> $w2[Judul_Sub]  </a></li>";
									}
									else{
										echo"
											<li><a href='?menu=$w2[Link_Sub]'><i class='fa $w2[Icon_Sub]'></i> $w2[Judul_Sub]  </a></li>";
									}
								}
					echo"	
					</ul>
						</li>";
				}
				else{
					echo"
					<li><a><i class='fa $w[Icon]'></i> <span>$w[Judul_Menu]</span></a></li>";
				}
				
		}
		
		?>
			<br>
                </ul>
                <h3>OPTION MENU</h3>
                <ul class="nav side-menu">
				<li><a href="?keluar"><i class='fa fa-sign-out pull-left'></i> <span>Log Out  </span></a>
              </div>

            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav class="" role="navigation">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="aset/images/img.jpg" alt=""><?php echo $_SESSION[Nama_Aset]; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="?keluar"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

<!--
                <?php $jmlhisi = mysql_num_rows($pesan); 
                  if ($jmlhisi >=1 ){
                    echo"
                <li role='presentation' class='dropdown'>
                  <a href='javascript:;'' class='dropdown-toggle info-number' data-toggle='dropdown' aria-expanded='false'>
                    <i class='fa fa-envelope-o'></i>
                       <span class='badge bg-red'>"; echo $jmlpesan; echo"</span>
                       ";}
                    else{} ?>
                   
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">

                  <?php while($isi=mysql_fetch_array($pesan)){
                      echo"
                      <li>
                        <a href='?menu="; echo $isi[Username]; echo"'>
                          <span>
                            <span>"; echo $isi[Username]; echo"</span>
                            <span class='time'>"; echo $isi[Online]; echo"</span>
                          </span>
                          <span class='message'>";
                            echo $isi[Password];
                          echo"
                          </span>
                        </a>
                      </li>
                      ";
                    
                  }

                  if ($jmlhisi >=1 ){
                    echo"  
                    <li>
                      <div class='text-center'>
                        <a href='?'>
                          <strong>Lihat Semua Dokumen</strong>
                          <i class='fa fa-angle-right'></i>
                        </a>
                      </div>
                    </li>
                    ";
                  }
                  else {

                  }
                  ?>

                  </ul>


                </li>
-->
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
		
		
		
		
    <section class="content">
        <div class="right_col" role="main">
          <!-- top tiles -->
		  <?php
		  
		$a1 = mysql_query("Select * from rf_aset_barang_detail where ID_Hapus = '0'");
		$jumlah_aset = mysql_num_rows($a1);
		
		$a2 = mysql_query("Select * from rf_aset_doc");
		$jumlah_permohonan_aset = mysql_num_rows($a2);
			
		$a3 = mysql_query("Select * from rf_aset_barang_detail where ID_Kondisi='2'");
		$jumlah_aset_rusak = mysql_num_rows($a3);
		
		$a4 = mysql_query("Select * from rf_aset_barang_detail where ID_Kondisi='3'");
		$jumlah_aset_diperbaiki = mysql_num_rows($a4);
			?>
          <div class="">
            <div class="row top_tiles">
              
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa  fa-briefcase"></i></div>
                  <div class="count"><?php echo $jumlah_aset; ?></div>
                  <h3>Aset UIN RF</h3>
                  <p>Total aset barang UIN RF Palembang.</p>
                </div>
              </div>

              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-edit"></i></div>
                  <div class="count"><?php echo $jumlah_permohonan_aset; ?></div>
                  <h3>Permohonan Aset</h3>
                  <p>Total permohonan aset pada tahun ini.</p>
                </div>
              </div>

              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa  fa-exclamation-triangle"></i></div>
                  <div class="count"><?php echo $jumlah_aset_rusak; ?></div>
                  <h3>Aset Bermasalah</h3>
                  <p>Total aset yang bermasalah pada tahun ini.</p>
                </div>
              </div>

              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-wrench"></i></div>
                  <div class="count"><?php echo $jumlah_aset_diperbaiki; ?></div>
                  <h3>Aset Dalam Perbaikan</h3>
                  <p>Total aset dalam perbaikan untuk tahun ini.</p>
                </div>
              </div>

            </div>
          </div>
          <!-- /top tiles -->
		  
        <!-- page content -->
        <!-- page content -->
                <?php
					if ($_GET[menu] == dashboard or $_GET[menu] == welcome ){
						include "src/modul/dashboard.php";
					}
					else{
						$cekfolder = mysql_query("SELECT *
										FROM rf_aset_menu_sub left join rf_aset_menu on rf_aset_menu_sub.ID_Menu = rf_aset_menu.ID_Menu where Link_Sub ='$_GET[menu]'");
								$folder=mysql_fetch_array($cekfolder);
								if ($_GET[menu] == "icon"){$linkfolder = "Administrator";}else{$linkfolder = $folder[Judul_Menu];}
						if (empty(include "src/modul/$linkfolder/mod_$_GET[menu].php")){
						include "src/error/module_404.html";
						}
					}
                ?>
        <!-- /page content -->
        <!-- /page content -->

        </div>
		</section>

        <!-- footer content -->
        <footer>
          <div class="pull-right hidden-xs">
           M. Ebni Hannibal - 12 54 0108 | SKRIPSI Sistem Informasi Manajemen Aset
          </div>
		  <strong>Copyright &copy; <?php echo date('Y'); ?> <a href=<?php if (empty($_GET[menu])){ } else{ echo "?menu=$_GET[menu]"; } ?> >Universitas Islam Negeri Raden Fatah Palembang</a>.</strong> All rights reserved.
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- Datatables -->
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>
    <!-- Chart.js -->
    <script src="vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="vendors/bernii/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    
    <!-- bootstrap-daterangepicker -->
    <script src="aset/js/moment/moment.min.js"></script>
    <script src="aset/js/datepicker/daterangepicker.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="aset/js/custom.min.js"></script>

    
    <!-- bootstrap-daterangepicker -->
    <script>
      $(document).ready(function() {

        var cb = function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        };

        var optionSet1 = {
          startDate: moment().subtract(29, 'days'),
          endDate: moment(),
          minDate: '01/01/2012',
          maxDate: '12/31/2015',
          dateLimit: {
            days: 60
          },
          showDropdowns: true,
          showWeekNumbers: true,
          timePicker: false,
          timePickerIncrement: 1,
          timePicker12Hour: true,
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          opens: 'left',
          buttonClasses: ['btn btn-default'],
          applyClass: 'btn-small btn-primary',
          cancelClass: 'btn-small',
          format: 'MM/DD/YYYY',
          separator: ' to ',
          locale: {
            applyLabel: 'Submit',
            cancelLabel: 'Clear',
            fromLabel: 'From',
            toLabel: 'To',
            customRangeLabel: 'Custom',
            daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
            monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            firstDay: 1
          }
        };
        $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
        $('#reportrange').daterangepicker(optionSet1, cb);
        $('#reportrange').on('show.daterangepicker', function() {
          console.log("show event fired");
        });
        $('#reportrange').on('hide.daterangepicker', function() {
          console.log("hide event fired");
        });
        $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
          console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
        });
        $('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
          console.log("cancel event fired");
        });
        $('#options1').click(function() {
          $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
        });
        $('#options2').click(function() {
          $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
        });
        $('#destroy').click(function() {
          $('#reportrange').data('daterangepicker').remove();
        });
      });
    </script>
    <!-- /bootstrap-daterangepicker -->
	
    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [,
              ],
              responsive: true
            });
          }
		  if ($("#datatable-ebni").length) {
            $("#datatable-ebni").DataTable({
              dom: "Bfrtip",
              buttons: [,
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();
        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        var table = $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->
  </body>
</html>

<?php

}
?>