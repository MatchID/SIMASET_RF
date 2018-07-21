<?php 
error_reporting(0);
// untuk akses root Unit Kerja
if ($_SESSION[Akses_Aset] !== 'user'){
	echo "benar";
}else{
      if (empty(include "src/error/module_403.html")){
			echo "<script>window.location = '../../?r=403'</script>";
	}
}
?>   