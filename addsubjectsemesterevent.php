<?php
include("connectToDatabase.php");
$sql="select subjectsemesterid, concat(t1.subjectcode,' ', t.semester, ' ',t.schoolyear ) as 'SubjectSemester' from tblsubjectsemester t, tblsubject t1 where t.subjectid = t1.subjectid";
$result = mysql_query($sql);
echo"Here you can add subject event for the selected event <br />";

echo"<form action='adddata.php?a=5' method='post'>";
echo"<table width='100%' border='0'>";
  echo"<tr>";
    echo"<td>Subject Semester:</td>";
    echo"<td><select name='subjectsemester'>";
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
    echo"<td>Event Title:</td>";
    echo"<td><input name='eventtitle' type='text'></td>";
  echo"</tr>";
  echo"<tr>";
    echo"<td>Event Decription:</td>";
    echo"<td><input name='eventdescription' type='text'></td>";
  echo"</tr>";
  echo"<tr>";
    echo"<td>Date added:</td>";
    echo"<td><input name='dateadded' type='text'></td>";
  echo"</tr>";
  echo"<tr>";
    echo"<td>Expire Date:</td>";
    echo"<td><input name='expiredate' type='text'></td>";
  echo"</tr>";
 
echo"</table>";
echo"<input name='addsubjectsemester' type='submit' value='Add Event to this subject'>";
echo"</form>";
?>