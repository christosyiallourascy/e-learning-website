<?php
include("connectToDatabase.php");
if(isset($_SESSION['student'])){
	$sid = $_SESSION['studentid'];
	$fname = $_SESSION['firstname'];
	$lname = $_SESSION['lastname'];
	$faname = $_SESSION['fathername'];
	$sql = "select t.subjectname, t.subjectcode, t.description, t1.subjectsemesterid, t2.grade1, t2.grade2, t2.grade3, t1.semester, t1.schoolyear from tblsubject t, tblsubjectsemester t1, tblstudentsubjectsemester t2 where t.subjectid = t1.subjectid and t1.subjectsemesterid = t2.subjectsemesterid and t2.studentid = $sid";
	$result = mysql_query($sql);
	$num = mysql_num_rows($result);
	if($num > 0) {
		while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
			  $subjectname = $row['subjectname'];
              $subjectcode = $row['subjectcode'];
			  $description = $row['description'];
			  $subjectsemesterid = $row['subjectsemesterid'];
			  $grade1 = $row['grade1'];
			  $grade2 = $row['grade1'];
			  $grade3 = $row['grade1'];
			  $semester = $row['semester'];
			  $schoolyear = $row['schoolyear'];
              echo "<a href='onsubject.php?subjectsemester=$subjectsemesterid'>$subjectcode</a> <br/>";
			  echo "$subjectname <br/>";
			  echo "$description <br/>";
			  echo "$semester <br/>";
			  echo "$schoolyear <br/>";
			  echo"<b><u>Grades</b></u>";
			  echo"<table>";
			  echo"<tr>";
			  echo"<td>Mid Term:</td><td>$grade1</td>";
			  echo"<td>Assignments:</td><td>$grade2</td>";
			  echo"<td>Final Exam:</td><td>$grade3</td>";
			  echo"</tr>";
			  echo"</table>";
		}
	}else{
		echo"These are no subjects for you.";
	}
}else{
	echo"<b>Sorry! Please log in first</b>";
}
?>