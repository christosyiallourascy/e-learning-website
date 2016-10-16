<?php
include("connectToDatabase.php");
if(isset($_SESSION['student'])){
	$sid = $_SESSION['studentid'];
	$fname = $_SESSION['firstname'];
	$lname = $_SESSION['lastname'];
	$faname = $_SESSION['fathername'];
	$sql = "select t.subjectname, t.subjectcode, t.description, t1.subjectsemesterid, t1.day, t1.time, t1.day1, t1.time1, t1.semester, t1.schoolyear from tblsubject t, tblsubjectsemester t1, tblstudentsubjectsemester t2 where t.subjectid = t1.subjectid and t1.subjectsemesterid = t2.subjectsemesterid and t2.studentid = $sid";
	$result = mysql_query($sql);
	$num = mysql_num_rows($result);
	if($num > 0) {
		while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
			  $subjectname = $row['subjectname'];
              $subjectcode = $row['subjectcode'];
			  $description = $row['description'];
			  $subjectsemesterid = $row['subjectsemesterid'];
			  $day = $row['day'];
			  $time = $row['time'];
			  $day1 = $row['day1'];
			  $time1 = $row['time1'];
			  $semester = $row['semester'];
			  $schoolyear = $row['schoolyear'];
              echo "<a href='onsubject.php?subjectsemester=$subjectsemesterid'>$subjectcode</a> <br/>";
			  echo "$subjectname <br/>";
			  echo "$description <br/>";
			  echo "$semester <br/>";
			  echo "$schoolyear <br/>";
		}
	}else{
		echo"These are no subjects for you.";
	}
}else{
	echo"<b>Sorry! Please log in first</b>";
}
?>