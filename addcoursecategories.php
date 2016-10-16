<?php
include("connectToDatabase.php");
$sql="select * from tblschool";
$result = mysql_query($sql);
echo"Here you can add course categories.<br />";
echo"<form action='adddata.php?a=2' method='post'>";
echo"<table width='100%' border='0'>";
 echo"<tr>";
    echo"<td>School:</td>";
    echo"<td><select name = 'schools'>";
	$num = mysql_num_rows($result);
	if($num > 0) {
		while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
			  $schoolid = $row['schoolid'];
              $schoolname = $row['schoolname'];
              $description = $row['description'];
			  echo"<option value='$schoolid'>$schoolname</option>";
		}
	}else{
		echo"<option value=''>There is no schools</option>";
	}
	echo"<select></td>";
  echo"</tr>";
  echo"<tr>";
    echo"<td>Course Category Name:</td>";
    echo"<td><input name='coursecategory' type='text'></td>";
  echo"</tr>";
  echo"<tr>";
    echo"<td>Category Description:</td>";
    echo"<td><input name='categorydescription' type='text'></td>";
  echo"</tr>";
echo"</table>";
echo"<input name='addcategory' type='submit' value='Add Category'>";
echo"</form>";
?>