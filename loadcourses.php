<?php
include("connectToDatabase.php");

$sql = "SELECT * FROM tblcoursecategories";
$result = mysql_query($sql);
$num = mysql_num_rows($result);
if($num > 0) {
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
			  $courseid = $row['courseid'];
              $coursename = $row['coursename'];
              $description = $row['description'];
              echo "<a href='course.php?cid=$courseid'>$coursename</a> <br/>";
	}
}else{
	echo"These are no courses available.";
}
?>