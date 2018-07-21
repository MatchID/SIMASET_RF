<?php
session_start();
error_reporting(0);
require_once "../config/lib.session.php";
include_once "../config/lib.match.php";
include_once "../config/db.mysql.php";
include_once "../config/db.connect.php";
include_once "../config/fungsi.indo.php";

if (isset($_POST[masuk])){
$Username = _injection($_POST[Username]);
$Password = _injection(md5($_POST[Password]));

  if (!ctype_alnum($Username) OR !ctype_alnum($Password)){
    echo " <script>location.href='#'</script> ";
  }else{
    $w=_selek("select * from rf_aset_akun left join rf_aset_level on rf_aset_akun.ID_Level=rf_aset_level.ID_Level 
		left join rf_aset_unit on rf_aset_akun.ID_Unit=rf_aset_unit.ID_Unit where 
		rf_aset_akun.Username='$Username' and rf_aset_akun.Password='$Password' ");
    if(empty($w)){
      echo " <script>location.href='?r=3r0rr'</script> ";
    }
    else{
		/**
		  mysql_query("update rf_aset_akun set
			 Online='1' 
			 where ID_Akun='$w[ID_Akun]'");
		*/
        if ($_POST[ingat] == "1"){
          setcookie('nama', $_POST[Username], time()+60*60*24*365);
          setcookie('pass', $_POST[Password], time()+60*60*24*365);
          setcookie('ingat', $_POST[ingat], time()+60*60*24*365);
        }
        else{
          setcookie('nama');
          setcookie('pass');
          setcookie('ingat');
        }

      session_start();
      $_SESSION[Username_Aset]=$w[Username];
      $_SESSION[Nama_Aset]=$w[Nama_Akun];
      $_SESSION[Level_Aset]=$w[ID_Level];
      $_SESSION[Kode_Aset]=$w[ID_Akun];
      $_SESSION[Jabatan_Aset]=$w[Inisial_Level];
      $_SESSION[ID_Unit_Aset]=$w[ID_Unit];
      $_SESSION[Unit_Aset]=$w[Nama_Unit];
	
        if ($w[ID_Level] == '1'){
            $_SESSION[Status_Aset]='1';
            $_SESSION[Akses_Aset]='super';
            $_SESSION[Kode_Akses_Aset]='0';
            $_SESSION[Kode_Menu_Aset]='0';
        }
        else if($w[ID_Level] == '2'){
            $_SESSION[Status_Aset]='2';
            $_SESSION[Akses_Aset]='Admin';
            $_SESSION[Kode_Akses_Aset]='1';
            $_SESSION[Kode_Menu_Aset]='1';
        }
        else if($w[ID_Level] == '3'){
            $_SESSION[Status_Aset]='2';
            $_SESSION[Akses_Aset]='TU Fakultas';
            $_SESSION[Kode_Akses_Aset]='3';
            $_SESSION[Kode_Menu_Aset]='2';
        }
        else if($w[ID_Level] == '4'){
            $_SESSION[Status_Aset]='2';
            $_SESSION[Akses_Aset]='TU Rektorat';
            $_SESSION[Kode_Akses_Aset]='2';
            $_SESSION[Kode_Menu_Aset]='3';
        }
        else if($w[ID_Level] == '5'){
            $_SESSION[Status_Aset]='3';
            $_SESSION[Akses_Aset]='Kabag Umum Fakultas';
            $_SESSION[Kode_Akses_Aset]='3';
            $_SESSION[Kode_Menu_Aset]='4';
        }
        else if($w[ID_Level] == '6'){
            $_SESSION[Status_Aset]='3';
            $_SESSION[Akses_Aset]='Kabag Umum Rektorat';
            $_SESSION[Kode_Akses_Aset]='2';
            $_SESSION[Kode_Menu_Aset]='5';
        }
        else if($w[ID_Level] == '7'){
            $_SESSION[Status_Aset]='3';
            $_SESSION[Akses_Aset]='Dekan UIN RF';
            $_SESSION[Kode_Akses_Aset]='3';
            $_SESSION[Kode_Menu_Aset]='6';
        }
        else{
            $_SESSION[Status_Aset]='3';
            $_SESSION[Akses_Aset]='Rektor UIN RF';
            $_SESSION[Kode_Akses_Aset]='2';
            $_SESSION[Kode_Menu_Aset]='7';
        }
	
      login_validate_aset();
	  
		histori("Login", "Login Sistem");

      echo " <script>location.href='../'</script> ";
    }
  }
}

  
if (!login_check_aset()){

  if (isset($_COOKIE[nama]) && isset($_COOKIE[pass])){
    $nm = $_COOKIE[nama];
    $ps = $_COOKIE[pass];
    $v = $_COOKIE[ingat];
  }
  else{
    $nm = "";
    $ps = "";
    $v = "";
  }

  if ($_GET[r] == "3r0rr"){
?>

<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistem Informasi Manajemen Aset | Universitas Islam Negeri Raden Fatah Palembang</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="https://colorlib.com/polygon/gentelella/css/animate.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="" method="post">
              <h1>Login</h1>
				        <div class="alert alert-error">
					       <center>Data login anda salah
				        </div>
              <div>
                <input type="text" class="form-control" name=Username placeholder="Username" value='<?php echo $nm; ?>' required >
              </div>
              <div>
                <input type="password" class="form-control" name=Password placeholder="Password" value='<?php echo $ps; ?>' required >
              </div>
              <div>
                <?php if ($v == "1"){ ?><input type="checkbox" class="" name="ingat" value="1" checked > Ingat saya di komputer ini! <?php } else{ ?><input type="checkbox" class="" name="ingat" value="1"  > Ingat saya di komputer ini! <?php }?>
                <input type=hidden name=masuk value=masuk>
				        <button type="submit" class="btn btn-default submit">Log in</a>
              </div>

              <div class="separator">
                
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>

<?php
  } 
  else{
?>	

<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistem Informasi Manajemen Aset | Universitas Islam Negeri Raden Fatah Palembang</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="https://colorlib.com/polygon/gentelella/css/animate.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="" method="post">
              <h1>Login</h1>
              <div>
                <input type="text" class="form-control" name=Username placeholder="Username" value='<?php echo $nm; ?>' required >
              </div>
              <div>
                <input type="password" class="form-control" name=Password placeholder="Password" value='<?php echo $ps; ?>' required >
              </div>
              <div>
                <?php if ($v == "1"){ ?><input type="checkbox" class="" name="ingat" value="1" checked > Ingat saya di komputer ini! <?php } else{ ?><input type="checkbox" class="" name="ingat" value="1"  > Ingat saya di komputer ini! <?php }?>
                <input type=hidden name=masuk value=masuk>
				        <button type="submit" class="btn btn-default submit">Log in</a>
              </div>

              <div class="separator">
                
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>	

<?php	
  }

}
else{
  echo "<script>window.location = '../'</script>";
}
?>