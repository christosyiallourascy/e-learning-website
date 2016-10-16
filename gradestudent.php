<?php
include("connectToDatabase.php");
$subjectsemesterid = $_REQUEST['subjectsemesterid'];
$sql="select t1.studentid, firstname, lastname, fathername from tblstudent t1, tblstudentsubjectsemester t2 where t1.studentid = t2.studentid and t2.subjectsemesterid = '$subjectsemesterid'";
$result = mysql_query($sql);
echo"Here you can add subjects for this semester <br />";

echo"<form action='adddata.php?a=8' method='post'>";
echo"<table width='100%' border='0'>";

  echo"<tr>";
    echo"<td>Select Student:</td>";
    echo"<td><select name='studentid'>";
  $num = mysql_num_rows($result);
	if($num > 0) {
		while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
			  $studentid = $row['studentid'];
			  $firstname = $row['firstname'];
			  $lastname = $row['lastname'];
			  $fathername = $row['fathername'];
			  echo"<option value='$studentid'>$firstname $lastname $fathername</option>";
		}
	}else{
		echo"<option value=''>There is no students in this subject</option>";
	}
	echo"<select></td>";
  echo"<tr>";
    echo"<td>Mid Term Exam:</td>";
    echo"<td><input name='midterm' type='text'></td>";
  echo"</tr>";
  echo"<tr>";
    echo"<td>Assignments:</td>";
    echo"<td><input name='assgnments' type='text'></td>";
  echo"</tr>";
  echo"<tr>";
    echo"<td>Final Exam:</td>";
    echo"<td><input name='finalexam' type='text'></td>";
  echo"</tr>";
  echo"<td></td>";
    echo"<td><input name='subjectsemester' type='hidden' value='$subjectsemesterid' ></td>";
  echo"</tr>";
echo"</table>";
echo"<input name='gradestudent' type='submit' value='Grade this student'>";
echo"</form>";
?>