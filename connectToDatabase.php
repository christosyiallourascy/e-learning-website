<?php
error_reporting(E_ALL ^ E_NOTICE);
ini_set('display_errors', '1');
session_start();
?>
<?php
	$mysql_host = "localhost";
	$mysql_database = "onlineschool";
	$mysql_user = "root";
	$mysql_password = "root";

	$conn = mysql_connect($mysql_host, $mysql_user, $mysql_password, "set names utf8")
	or die ('Error connecting to mysql');
	mysql_select_db($mysql_database);
	mysql_set_charset('utf8',$conn);
?>