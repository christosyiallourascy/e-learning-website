<?php
error_reporting(E_ALL ^ E_NOTICE);
ini_set('display_errors', '1');
session_start();
?>
<?php
include("connectToDatabase.php");

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$member = $_REQUEST['previlages'];

if ($member == "Student"){
	$sql = "SELECT * FROM tblstudent where username = '$username' and password = '$password'";
	$result = mysql_query($sql);
	$num = mysql_num_rows($result)or die("no rows" . mysql_error());
	if($num > 0) {
		if($row = mysql_fetch_array($result, MYSQL_ASSOC)){
			  $_SESSION['student'] = "student";
			  $_SESSION['studentid'] = $row['studentid'];
              $_SESSION['firstname']= $row['firstname'];
			  $_SESSION['lastname']= $row['lastname'];
			  $_SESSION['fathername']= $row['fathername'];
              header( 'Location: index.php' );
		}
	}else{
		echo"Username or Password is invalid.";
	}
}else{
	$sql = "SELECT * FROM tblinstructor where username = '$username' and password = '$password'";
	$result = mysql_query($sql);
	$num = mysql_num_rows($result);
	if($num > 0) {
		if($row = mysql_fetch_array($result, MYSQL_ASSOC)){
			  $_SESSION['instructor'] = "instructor";
			  $_SESSION['instructorid'] = $row['instructorid'];
              $_SESSION['firstname']= $row['firstname'];
			  $_SESSION['lastname']= $row['lastname'];
			  $_SESSION['fathername']= $row['fathername'];
              header( 'Location: instructor.php' );
		}
	}else{
		header( 'Location: index.php?err=1' );
	}
}
?>