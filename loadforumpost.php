<?php
include("connectToDatabase.php");//connect to database
if(isset($_SESSION['student'])){//check if we are log in
	$today = getdate();//get current server date
	$sid = $_SESSION['studentid'];//session variables
	$fname = $_SESSION['firstname'];
	$lname = $_SESSION['lastname'];
	$faname = $_SESSION['fathername'];
	$sql = "SELECT `tblforumpost`.`forumpostid`, `tblforumpost`.`postname`, `tblforumpost`.`postdetail`, `tblforumpost`.`datetimeadded`, `tblforumpost`.`subjectsemesterforumid`FROM `onlineschool`.`tblforumpost` where subjectsemesterforumid = '$forumid'";//query
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
			  echo "Post Description: $postdetail <br/>";
			  echo "Date Added: $datetimeadded <br/>";
			  echo"<hr color='#FF0000' /><br />";
		}
	}else{
		echo"These are no forum posts for this subject forum yet.";
	}
}else{
	echo"<b>Sorry! Please log in first</b>";
}
?>