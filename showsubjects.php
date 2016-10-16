<?php
error_reporting(E_ALL ^ E_NOTICE);
ini_set('display_errors', '1');
session_start();
?>
<?php
include("connectToDatabase.php");//include php file that help us to connect to the database
$sid = $_REQUEST['sid'];
$stid = $_SESSION['studentid'];
$sql = "select t1.subjectname, t1.subjectcode, t2.subjectsemesterid, t2.schoolyear, t2.semester from tblsubject t1, tblsubjectsemester t2 where t1.subjectid = $sid and t1.subjectid = t2.subjectid";
$result = mysql_query($sql);
$num = mysql_num_rows($result);
if($num > 0) {
	echo"<p><strong>Subjects filtered by course category</strong></p>";
	echo"<table>";
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
		$subjectname = $row['subjectname'];
		$subjectcode = $row['subjectcode'];
		$subjectsemesterid = $row['subjectsemesterid'];
		$schoolyear = $row['schoolyear'];
		$semester = $row['semester'];
		echo"<tr>";
				echo"<td>$subjectname</td><td><a href='enrollment.php?id=$subjectsemesterid'>$subjectcode</a></td><td>$schoolyear</td><td>$semester</td>";
		echo"</tr>";
	}
	echo"<table>";
}else{
	echo"There are no subjects $sid";
}
?>