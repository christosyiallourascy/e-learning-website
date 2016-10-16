<?php
include("connectToDatabase.php");
$sql="select * from tblcoursecategories";
$result = mysql_query($sql);
echo"Here you can add subject to this platform<br />";
echo"<form action='adddata.php?a=3' method='post'>";
echo"<table width='100%' border='0'>";
  echo"<tr>";
    echo"<td>Subject Name:</td>";
    echo"<td><input name='subjectname' type='text'></td>";
  echo"</tr>";
  echo"<tr>";
    echo"<td>Subject Code:</td>";
    echo"<td><input name='subjectcode' type='text'></td>";
  echo"</tr>";
  echo"<tr>";
    echo"<td>Course Category:</td>";
    echo"<td><select name='categories'>";
  $num = mysql_num_rows($result);
	if($num > 0) {
		while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
			  $courseid = $row['courseid'];
			  $schoolid = $row['schoolid'];
              $coursename = $row['coursename'];
              $description = $row['description'];
			  echo"<option value='$courseid'>$coursename</option>";
		}
	}else{
		echo"<option value=''>There is no schools</option>";
	}
	echo"<select></td>";
  echo"<tr>";
    echo"<td>Subject Description:</td>";
    echo"<td><input name='subjectdescription' type='text'></td>";
  echo"</tr>";
echo"</table>";
echo"<input name='addsubject' type='submit' value='Add Subject'>";
echo"</form>";
?>