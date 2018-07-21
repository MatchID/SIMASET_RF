<?php
require_once "../../../config/lib.session.php";
include_once "../../../config/lib.match.php";
include_once "../../../config/db.mysql.php";
include_once "../../../config/db.connect.php";
include_once "../../../config/fungsi.indo.php";

if(isset($_GET[unit])){
	include "keadaan_unit.php";
}else{
	include "keadaan_all.php";	
}

?>  