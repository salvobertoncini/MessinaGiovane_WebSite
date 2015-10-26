<?php
$dbhost = "localhost";
$dbname = "messinag_messinagiovane";
$dbuser = "messinag";
$dbpass = "2E05m9jhrK";
$connect = @mysql_connect($dbhost, $dbuser, $dbpass) or die (mysql_error());
@mysql_select_db($dbname) or die (mysql_error());
?>