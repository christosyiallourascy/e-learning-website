<?php
include("connectToDatabase.php");//connect to database
if(isset($_SESSION['student'])){//check if we are log in
	$today = getdate();//get current server date
	$sid = $_SESSION['studentid'];//session variables
	$fname = $_SESSION['firstname'];
	$lname = $_SESSION['lastname'];
	$faname = $_SESSION['fathername'];
	$sql = "SELECT `tblsubjectsemesterevent`.`subjectsemestereventid`, `tblsubjectsemesterevent`.`subjectsemester`, `tblsubjectsemesterevent`.`eventtitle`, `tblsubjectsemesterevent`.`eventdescription`, `tblsubjectsemesterevent`.`dateadded`, `tblsubjectsemesterevent`.`expiredate` FROM `onlineschool`.`tblsubjectsemesterevent` where subjectsemester = $ssid";//query
	$result = mysql_query($sql);//execute query
	$num = mysql_num_rows($result);//get num rows
	if($num > 0) {
		while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
			//get row from result set
			  $subjectsemestereventid = $row['subjectsemestereventid'];
              $subjectsemester = $row['subjectsemester'];
			  $eventtitle = $row['eventtitle'];
			  $eventdescription = $row['eventdescription'];
			  $dateadded = $row['dateadded'];
			  $expiredate = $row['expiredate'];
				//export it in html format
			  echo "<b><u>$eventtitle</u></b> <br/>";
			  echo "Description: $eventdescription <br/>";
			  echo "Date Added: $dateadded <br/>";
			  if ($today > $expiredate){//check if the event is epired
			  	echo "Expire Date: <font color='#FF0000'>$expiredate</font> <br/>";
			  }else{
				  echo "Expire Date: <font color='#00FF00'>$expiredate</font>> <br/>";
			  }
			  echo"<hr color='#FF0000' /><br />";
		}
	}else{
		echo"These are no events for this subject yet.";
	}
}else{
	echo"<b>Sorry! Please log in first</b>";
}
?>