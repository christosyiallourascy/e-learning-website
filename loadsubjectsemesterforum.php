<?php
include("connectToDatabase.php");//connect to database
if(isset($_SESSION['student'])){//check if we are log in
	$sid = $_SESSION['studentid'];//session variables
	$fname = $_SESSION['firstname'];
	$lname = $_SESSION['lastname'];
	$faname = $_SESSION['fathername'];
	$sql = "select subjectsemesterforum, forumname from tblsubjectsemesterforum where subjectsemesterid = '$ssid'";
	$result = mysql_query($sql);//execute query
	$num = mysql_num_rows($result);//get num rows
	if($num > 0) {
		while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
			//get row from result set
			  $subjectsemesterforumid = $row['subjectsemesterforum'];
			  $forumname = $row['forumname'];
			  echo"<a href='forum.php?forumid=$subjectsemesterforumid'>$forumname</a>";
		}
	}
	$sql = "select t2.forumpostid, t2.postname, t2.postdetail, t2.datetimeadded, t2.subjectsemesterforumid from tblsubjectsemesterforum t1, tblforumpost t2 where t1.subjectsemesterid = '$ssid' and t1.subjectsemesterforum = t2.subjectsemesterforumid order by(datetimeadded) desc limit 4";//query
	$result = mysql_query($sql);//execute query
	$num = mysql_num_rows($result);//get num rows
	if($num > 0) {
		while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
			//get row from result set
			  $forumpostid = $row['forumpostid'];
              $postname = $row['postname'];
			  $postdetail = $row['postdetail'];
			  $datetimeadded = $row['datetimeadded'];
			  $subjectsemesterforumid = $row['subjectsemesterforumid'];
				//export it in html format
			  echo "<b><u>$postname</u></b> <br/>";
			  echo "Description: $postdetail <br/>";
			  echo "Date Added: $datetimeadded <br/>";
		}
	}else{
		echo"These are no forum post for this subject yet.";
	}
}else{
	echo"<b>Sorry! Please log in first</b>";
}
?>