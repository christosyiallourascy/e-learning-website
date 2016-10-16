<?php
error_reporting(E_ALL ^ E_NOTICE);
ini_set('display_errors', '1');
session_start();
?>
<?php
include("connectToDatabase.php");//include php file that help us to connect to the database
if(isset($_SESSION['student'])){
	$studentid = $_SESSION['studentid'];
	$fname = $_SESSION['firstname'];
	$lname = $_SESSION['lastname'];
	
	$ssid = $_REQUEST['ssid'];
	$enrollkey = $_REQUEST['enrollkey'];
	$sql = "SELECT * FROM `tblsubjectsemester` where subjectsemesterid = $ssid and enrollkey = '$enrollkey'";
	$result = mysql_query($sql);
	$num = mysql_num_rows($result)or die("no rows $ssid - $enrollkey" . mysql_error());
	if ($num > 0){
			$sql = "INSERT INTO `onlineschool`.`tblstudentsubjectsemester` (`studentid`, `subjectsemesterid`, `grade1`, `grade2`, `grade3`, `enrollment`) VALUES ('$studentid', '$ssid', 'null', 'null', 'null', 'yes')";
			$result = mysql_query($sql);
			if($result != FALSE){
				header( "Location: enrollment.php?add=1&id=$ssid");
			}else{
				header( "Location: enrollment.php?err=1");
			}
	 }else{
		header( "Location: enrollment.php?err=2");
	 }
}else{
	header( 'Location: index.php?err=1' );
}
?>