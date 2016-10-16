<?php
include("connectToDatabase.php");
$sql="select subjectsemesterid, concat(t1.subjectcode,' ', t.semester, ' ',t.schoolyear ) as 'SubjectSemester' from tblsubjectsemester t, tblsubject t1 where t.subjectid = t1.subjectid";
$result = mysql_query($sql);
echo"Here you can add subject event for the selected event <br />";

echo"<form action='adddata.php?a=6' method='post'>";
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
    echo"<td>Forum Name:</td>";
    echo"<td><input name='forumname' type='text'></td>";
  echo"</tr>";
  echo"<tr>";
    echo"<td>Forum Decription:</td>";
    echo"<td><input name='forumdescription' type='text'></td>";
  echo"</tr>";
  echo"<tr>";
    echo"<td>Open:</td>";
    echo"<td><select name='open'>";
	echo"<option value='yes'>Yes</option>";
	echo"<option value='no'>No</option>";
	echo"</select></tr>";
  echo"</tr>";
 
echo"</table>";
echo"<input name='createforum' type='submit' value='Create Forum for this subject'>";
echo"</form>";
?>