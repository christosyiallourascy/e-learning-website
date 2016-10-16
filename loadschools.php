<?php
include("connectToDatabase.php");

$sql = "SELECT * FROM tblschool";
$result = mysql_query($sql);
$num = mysql_num_rows($result);
if($num > 0) {
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
			  $schoolid = $row['schoolid'];
              $schoolname = $row['schoolname'];
              $description = $row['description'];
              echo "<a href='schools.php?cid=$schoolid'>$schoolname</a> <br/>";
	}
}else{
	echo"These are no courses available.";
}
?>