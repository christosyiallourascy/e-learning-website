<?php
//get session values
error_reporting(E_ALL ^ E_NOTICE);
ini_set('display_errors', '1');
session_start();
?>
<?php
include("connectToDatabase.php");//include php file that help us to connect to the database

$action = $_REQUEST['a'];//get what action we want to do from the request
//switch statement
switch ($action) {
    case "1":
        //add a school to this platform
		$schoolname = $_REQUEST['schoolname'];
		$schooldescription = $_REQUEST['schooldescription'];
		$sql = "SELECT * FROM `onlineschool`.`tblschool` where schoolname = '$schoolname'";
		$result = mysql_query($sql);
		$num = mysql_num_rows($result);
		if($num > 0) {
			echo"This school has already been added.";
		}else{
			$sql = "INSERT INTO `onlineschool`.`tblschool` (`schoolname`, `description`) VALUES ('$schoolname', '$schooldescription')";
			$result = mysql_query($sql);
			if($result != FALSE){
				echo"The school has been inserted.";
			}else{
				echo"The school has not been inserted.";
			}
		}
        break;
    case "2":
        //add new course category
		$school = $_REQUEST['schools'];
		$coursecategory  = $_REQUEST['coursecategory'];
		$categorydescription = $_REQUEST['categorydescription'];
		$sql= "select * from tblcoursecategories";
		$result = mysql_query($sql);
		$num = mysql_num_rows($result);
		if($num > 0) {
			echo"This category has already been added.";
		}else{
			$sql = "INSERT INTO `onlineschool`.`tblcoursecategories` (`schoolid`, `coursename`, `description`) VALUES ('$school', '$coursecategory', '$categorydescription')";
			$result = mysql_query($sql);
			if($result != FALSE){
				echo"The course category has been inserted.";
			}else{
				echo"The course category has not been inserted.";
			}
		}
        break;
    case "3":
        //add subject to the selected category
		$subjectname = $_REQUEST['subjectname'];
		$subjectcode = $_REQUEST['subjectcode'];
		$courseid = $_REQUEST['categories'];
		$sql= "select * from tblsubject where subjectcode='$subjectcode'";
		$result = mysql_query($sql);
		$num = mysql_num_rows($result);
		if($num > 0) {
			echo"This subject has already been added.";
		}else{
			$subjectdescription = $_REQUEST['subjectdescription'];
			$sql = "INSERT INTO `onlineschool`.`tblsubject` (`subjectname`, `subjectcode`, `courseid`, `description`)VALUES('$subjectname', '$subjectcode', '$courseid', '$subjectdescription')";
			$result = mysql_query($sql);
			if($result != FALSE){
				echo"The subject has been inserted.";
			}else{
				echo"The subject has not been inserted.";
			}
		}
        break;
	case "4":
        //add subject for the current semester
		$instructor = $_SESSION['instructorid'];
		$schoolyear = $_REQUEST['schoolyear'];
		$semester = $_REQUEST['semester'];
		$subjectid = $_REQUEST['subject'];
		$day1 = $_REQUEST['day1'];
		$time1 = $_REQUEST['time1'];
		$day2 = $_REQUEST['day2'];
		$time2 = $_REQUEST['time2'];
		$enrollkey = $_REQUEST['enrollkey'];
		$sql= "select * from tblsubjectsemester where subjectid='$subjectid' and semester='$semester' and schoolyear='$schoolyear'";
		$result = mysql_query($sql);
		$num = mysql_num_rows($result);
		if($num > 0) {
			echo"This subject has already been added to current semester.";
		}else{
			$subjectdescription = $_REQUEST['subjectdescription'];
			$sql = "INSERT INTO `onlineschool`.`tblsubjectsemester` (`schoolyear`, `semester`, `subjectid`, `instructor`, `day`, `time`, `day1`, `time1`, `enrollkey`) VALUES ('$schoolyear', '$semester', '$subjectid', '$instructor', '$day1', '$time1', '$day2', '$time2', '$enrollkey')";
			$result = mysql_query($sql);
			if($result != FALSE){
				echo"The subject has been inserted for the current semester.";
			}else{
				echo"The subject has not been inserted for the current semester.";
			}
		}
        break;
	case "5":
		//add event for the selected subject semester
		$subjectsemester = $_REQUEST['subjectsemester'];
		$eventtitle = $_REQUEST['eventtitle'];
		$eventdescription = $_REQUEST['eventdescription'];
		$dateadded = $_REQUEST['dateadded'];
		$expiredate = $_REQUEST['expiredate'];
		$sql = "select * from tblsubjectsemesterevent where subjectsemester = '$subjectsemester'";
		$result = mysql_query($sql);
		$num = mysql_num_rows($result);
		if($num > 0) {
			echo"This event has already been added to current subject semester.";
		}else{
			$sql = "INSERT INTO `onlineschool`.`tblsubjectsemesterevent` (`subjectsemester`, `eventtitle`, `eventdescription`, `dateadded`, `expiredate`) VALUES ('$subjectsemester', '$eventtitle', '$eventdescription', '$dateadded', '$expiredate')";
			$result = mysql_query($sql);
			if($result != FALSE){
				echo"The event has been inserted for the current subject semester.";
			}else{
				echo"The event has not been inserted for the current subject semester.";
			}
		}
		break;
	case "6":
		//create a forum for the selected subject
		$subjectsemester = $_REQUEST['subjectsemester'];
		$forumname = $_REQUEST['forumname'];
		$forumdescription = $_REQUEST['forumdescription'];
		$open = $_REQUEST['open'];
		$sql = "select * from tblsubjectsemesterforum where subjectsemesterid='$subjectsemester' and forumname='$forumname'";
		$result = mysql_query($sql);
		$num = mysql_num_rows($result);
		if($num > 0) {
			echo"This forum has already been added to current subject semester.";
		}else{
			$sql = "INSERT INTO `onlineschool`.`tblsubjectsemesterforum` (`subjectsemesterid`, `forumname`, `forumdescription`, `open`) VALUES ('$subjectsemester', '$forumname', '$forumdescription', '$open')";
			$result = mysql_query($sql);
			if($result != FALSE){
				echo"The forum has been inserted for the current subject semester.";
			}else{
				echo"The forum has not been inserted for the current subject semester.";
			}
		}
		break;
	case "7":
		//add event case
		$evetname = $_REQUEST['eventname'];
		$eventdescription = $_REQUEST['eventdescription'];
		$eventdate = $_REQUEST['eventdate'];
		$eventtime = $_REQUEST['eventtime'];
		$eventplace = $_REQUEST['eventplace'];
		$sql = "INSERT INTO `onlineschool`.`tblevent` (`eventname`, `eventdescription`, `eventdate`, `eventtime`, `eventplace`) VALUES('$eventname ', '$eventdescription', '$eventdate', '$eventtime', '$eventplace')";
		$result = mysql_query($sql);
		if($result != FALSE){
				echo"The event has been inserted.";
				//$msg = "done";
				//header( 'Location: instructor.php?msg=$msg' );
		}else{
				echo"The Event has not been inserted.";
				//$msg = "no";
				//header( 'Location: instructor.php?msg=$msg' );
		}
		break;
	case 8:
		//update subject semester by inserting the grades
		$studentid = $_REQUEST['studentid'];
		$subjectsemesterid = $_REQUEST['subjectsemester'];
		$grade1 = $_REQUEST['midterm'];
		$grade2 = $_REQUEST['assgnments'];
		$grade3 = $_REQUEST['finalexam'];
		$sql = "UPDATE `onlineschool`.`tblstudentsubjectsemester` SET `grade1` = '$grade1', `grade2` = '$grade2', `grade3` = '$grade3' WHERE subjectsemesterid = '$subjectsemesterid' and studentid = '$studentid'";
		$result = mysql_query($sql);
		if($result != FALSE){
				echo"The grade has been inserted.";
				//$msg = "done";
				//header( 'Location: instructor.php?msg=$msg' );
		}else{
				echo"The grade has not been inserted.";
				//$msg = "no";
				//header( 'Location: instructor.php?msg=$msg' );
		}
		break;
	case 9:
		//add forum post
		$forumid = $_REQUEST['fid'];
		$postname = $_REQUEST['postname'];
		$postdetail = $_REQUEST['postdetail'];
		$dateadded = $_REQUEST['dateaddedd'];
		//sql query
		$sql = "INSERT INTO `onlineschool`.`tblforumpost` (`postname`, `postdetail`, `datetimeadded`, `subjectsemesterforumid`)VALUES('$postname', '$postdetail', '$dateadded', '$forumid')";
		$result = mysql_query($sql);
		if($result != FALSE){
				echo"The post has been inserted.";
				//$msg = "done";
				//header( 'Location: instructor.php?msg=$msg' );
		}else{
				echo"The post has not been inserted.";
				//$msg = "no";
				//header( 'Location: instructor.php?msg=$msg' );
		}
		break;
}
?>