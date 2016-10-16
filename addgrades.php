<?php
//get session values
error_reporting(E_ALL ^ E_NOTICE);
ini_set('display_errors', '1');
session_start();
?>
<?php
if(isset($_SESSION['instructor'])){
			$instructorid = $_SESSION['instructorid'];
}
include("connectToDatabase.php");
$sql="select subjectsemesterid, concat(t1.subjectcode,' ', t.semester, ' ',t.schoolyear ) as 'SubjectSemester' from tblsubjectsemester t, tblsubject t1 where t.subjectid = t1.subjectid and instructor = $instructorid";
$result = mysql_query($sql);
echo"Select subject you want to grade <br />";

echo"<form action='gradestudent.php' method='post'>";
echo"<table width='100%' border='0'>";
  echo"<tr>";
    echo"<td>Subject Semester:</td>";
    echo"<td><select name='subjectsemesterid'>";
  $num = mysql_num_rows($result);
	if($num > 0) {
		while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
			  $subjectsemesterid = $row['subjectsemesterid'];
			  $subject = $row['SubjectSemester'];
			  echo"<option value='$subjectsemesterid'>$subject</option>";
		}
	}else{
		echo"<option value=''>There is no subjects</option>";
	}
	echo"<select></td>";
	echo"<tr>";
	echo"<td><input name='selectsubject' type='submit' value='Select Subject Semester' /></td><td></td>";
	echo"</tr>";
	echo"</form>";
?>