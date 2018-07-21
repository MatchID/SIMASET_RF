<?php

  $db_username = "root";
  $db_hostname = "localhost";
  $db_password = "";
  $db_name = "sim_aset_uin_rf";

  $con = _connect($db_hostname, $db_username, $db_password);
  $db  = _select_db($db_name, $con);
  
?>
