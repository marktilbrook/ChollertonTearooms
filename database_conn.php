<?php
	$dbConn = new mysqli('localhost', 'unn_w17006267', 'marrwk111', 'unn_w17006267');

   if ($dbConn->connect_error) {
      echo "<p>Connection failed: ".$dbConn->connect_error."</p>\n";
      exit;
   }
?>