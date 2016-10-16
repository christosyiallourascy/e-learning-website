<?php
include("connectToDatabase.php");

$sql = "select t1.schoolid, t1.schoolname, t1.description, t2.courseid, t2.coursename, t2.description from tblschool t1, tblcoursecategories t2 where t1.schoolid = '$cid' and t2.schoolid = t1.schoolid";
$result = mysql_query($sql);
$num = mysql_num_rows($result);
if($num > 0) {
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
			  $schoolid = $row['schoolid'];
              $schoolname = $row['schoolname'];
              $description = $row['description'];
			  $courseid = $row['courseid'];
			  $coursename = $row['coursename'];
			  $descriptionc = $row['description'];
              echo "<a href='course.php?cid=$courseid'>$coursename</a> <br/>";
			  echo "$descriptionc <br/>";
	}
}else{
	echo"These are no courses available.";
}
?>