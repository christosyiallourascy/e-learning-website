<?php
include("connectToDatabase.php");
$sql="select * from tblsubject";
$result = mysql_query($sql);
echo"Here you can add subjects for this semester <br />";
echo"This subject will assign to the current instructor. <br />";
echo"<form action='adddata.php?a=4' method='post'>";
echo"<table width='100%' border='0'>";
  echo"<tr>";
    echo"<td>School Year:</td>";
    echo"<td><input name='schoolyear' type='text'></td>";
  echo"</tr>";
  echo"<tr>";
    echo"<td>Semester:</td>";
    echo"<td><select name='semester'>";
	echo"<option value='Fall'>Fall</option>";
	echo"<option value='Spring'>Spring</option>";
	echo"</select></td>";
  echo"</tr>";
  echo"<tr>";
    echo"<td>Subject:</td>";
    echo"<td><select name='subject'>";
  $num = mysql_num_rows($result);
	if($num > 0) {
		while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
			  $subjectid = $row['subjectid'];
			  $subjectname = $row['subjectname'];
			  $subjectcode = $row['subjectcode'];
			  $courseid = $row['courseid'];
			  $description = $row['description'];
			  echo"<option value='$subjectid'>$subjectname - $subjectcode</option>";
		}
	}else{
		echo"<option value=''>There is no subjects</option>";
	}
	echo"<select></td>";
  echo"<tr>";
    echo"<td>Day One:</td>";
    echo"<td><input name='day1' type='text'></td>";
  echo"</tr>";
  echo"<tr>";
    echo"<td>Time One:</td>";
    echo"<td><input name='time1' type='text'></td>";
  echo"</tr>";
  echo"<tr>";
    echo"<td>Day Two:</td>";
    echo"<td><input name='day2' type='text'></td>";
  echo"</tr>";
  echo"<tr>";
    echo"<td>Time Two:</td>";
    echo"<td><input name='time2' type='text'></td>";
  echo"</tr>";
    echo"<tr>";
    echo"<td>Enroll Key:</td>";
    echo"<td><input name='enrollkey' type='text'></td>";
  echo"</tr>";
echo"</table>";
echo"<input name='addsubjectsemester' type='submit' value='Add Subject to this semester'>";
echo"</form>";
?>