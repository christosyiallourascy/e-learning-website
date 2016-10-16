<?php
error_reporting(E_ALL ^ E_NOTICE);
ini_set('display_errors', '1');
session_start();
include("connectToDatabase.php");
if(isset($_SESSION['student'])){

			echo"Student<br>";
			echo"You are Login as $fname $lname $faname <a href='logout.php'>Logout</a>";
	$ssid = $_REQUEST['id'];
	$stid = $_SESSION['studentid'];
	$sql = "select * from tblsubjectsemester t1, tblstudentsubjectsemester t2 where t1.subjectsemesterid = t2.subjectsemesterid and t2.subjectsemesterid = $ssid and t2.studentid = $stid";
	$result = mysql_query($sql);
	$num = mysql_num_rows($result);
	if($num > 0){
		header("Location: onsubject.php?subjectsemester=$ssid");
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>E-Learning</title>
<link href="e-learningCSS.css" rel="stylesheet" type="text/css" />
<script language="javascript">
    function doAjaxGet(dataSource) {
       if(navigator.appName == "Microsoft Internet Explorer") {
         objHTTP = new ActiveXObject("Microsoft.XMLHTTP");
       } else {
         objHTTP = new XMLHttpRequest();
       }
       objHTTP.open("POST", dataSource, true);
       objHTTP.onreadystatechange = function() 
       { 
       if (objHTTP.readyState == 4 && objHTTP.status == 200) {
           document.getElementById('live_time_clock').innerHTML = objHTTP.responseText;
         }
       }
         objHTTP.send('null'); 
       }
    function startclock() {
     doAjaxGet('getServerTime.php');
      setTimeout('startclock()',1000);
     }
</script>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
</head>

<body onload="startclock()" class="body">
<div class="container">
<div class="header">
<font size="+3"><b>Online School Site</b></font>
<p align="right">
    <?php 
		if(isset($_SESSION['student'])){
			$fname = $_SESSION['firstname'];
			$lname = $_SESSION['lastname'];
			$faname = $_SESSION['fathername'];
			echo"Student<br>";
			echo"You are Login as $fname $lname $faname <a href='logout.php'>Logout</a>";
		}elseif(isset($_SESSION['instructor'])){
			$fname = $_SESSION['firstname'];
			$lname = $_SESSION['lastname'];
			$faname = $_SESSION['fathername'];
			echo"Instructor<br>";
			echo"You are Login as $fname $lname $faname <a href='logout.php'>Logout</a>";
		}
	?>
    </p>
</div>
<div class="left">
  <ul id="MenuBar1" class="MenuBarVertical">
    <li><a href="index.php">Home</a>      </li>
    <li><a href="schools.php">Schools</a></li>
    <li><a class="MenuBarItemSubmenu" href="#">Courses</a>
      <ul>
        <li><a href="mycourses.php">My Courses</a></li>
        <li><a href="mygrades.php">My Grades</a></li>
</ul>
    </li>
</ul>
  <p><hr color="#FF0000" /></p>
<div class="login">
<p align="center">Login</p>
<form method="post" action="login.php">
Username:
  <input name="username" type="text" />
Password:
  <input name="password" type="password" /><br />
  <select name="previlages">
  <option value="Staff">Staff</option>
  <option value="Student">Student</option>
  </select>
  <p>
    <input name="" type="submit" value="Login" />
  </p>
    <p><a href="singup.php?s=student">Student Singup</a></p>
</form>
<p>
  <?php
      $errNum = $_REQUEST["err"];
      if($errNum == 1) {
          echo "<p style='color:red' align='center'><b>Wrong username or password!!!!</b></p>";
      }
	?>
  </p>
</div>
<div class="login">
<b>Server Time:</b><br /> <span id="live_time_clock">&nbsp;</span>
</div>
</div>
<div class="main">

  <h3>Enrollment Page</h3>
  <div class="maincontent"> 
  <?php 
	$error = $_REQUEST['err'];
	$add = $_REQUEST['add'];
	if (isset($add)){
		echo"You have been enrolled to the subject.<br /> Please click <a href='view.php?subjectsemesterid=$ssid'>here</a> to follow the subject";
	}else{
		 if(isset($_SESSION['student'])){
	$sql = "select t2.subjectsemesterid, t.subjectid, t.subjectname, t.subjectcode, t2.semester, t2.schoolyear, t.description, t1.coursename, t3.firstname, t3.lastname from tblsubject t, tblcoursecategories t1, tblsubjectsemester t2, tblinstructor t3 where t2.subjectsemesterid = $ssid and t.courseid = t1.courseid and t.subjectid = t2.subjectid and t2.instructor = t3.instructorid";
	$result = mysql_query($sql);
	$num = mysql_num_rows($result);
	if($num > 0) {
		while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
			  $subjectsemesterid = $row['subjectsemesterid'];
			  $subjectid = $row['subjectid'];
              $subjectname = $row['subjectname'];
			  $subjectcode = $row['subjectcode'];
			  $semester = $row['semester'];
			  $schoolyear = $row['schoolyear'];
			  $description = $row['description'];
			  $coursename = $row['coursename'];
              $firstname = $row['firstname'];
			  $lastname = $row['lastname'];
              echo"<table width='100%' border='0'>";
			  echo"<tr>";
			  echo"<td><a href='enrollment.php?id=$subjectsemesterid'>$subjectcode</a></td><td></td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td>$subjectcode - $subjectname <br /> $schoolyear - $semester</td><td>$description</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td>$firstname $lastname</td><td></td>";
			  echo"</tr>";
			  echo"</table>";
		?>
	  <form method="post" action="enrollsubject.php?ssid=<?php echo $subjectsemesterid; ?>">
    	<table width="400" border="0" align="center" bgcolor="#0066FF">
  <tr>
    <td colspan="2">Enter the enroll key given by your instructor below and press &quot;Enroll me to this subject&quot;</td>
    </tr>
  <tr>
    <td>Subject</td>
    <td><?php  echo "$subjectname"; ?></td>
  </tr>
  <tr>
    <td>Enroll Key:</td>
    <td><input name="enrollkey" type="text" /></td>
  </tr>
  <tr>
    <td><input type="submit" name="button" value="Enroll me to this subject" /></td>
    <td>&nbsp;</td>
  </tr>
</table>
    </form>
    <?php
		}
	}else{
		echo"These are no subject for the given criteria.";
	}
	}else{
	?>
      <form action="login.php" method="post">
  	<table width="400" border="0" align="center" bgcolor="#0066FF">
  <tr>
    <td>Username:</td>
    <td><input name="username" type="text" /></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input name="password" type="password" /></td>
  </tr>
  <tr>
    <td></td>
    <td>
    <select name="previlages">
  	<option value="Staff">Staff</option>
  	<option value="Student">Student</option>
  	</select>
    </td>
  </tr>
   <tr>
    <td></td>
    <td><input name="" type="submit" value="Login" /></td>
  </tr>
</table>
  </form>

     <?php
  	}
  }
  ?>
  </div>
  <hr color="#FF0000" /></p>
 
  <div class="maincontent">
 <p><b>Search for available courses</b></p>
  <form action="result.php" method="get">
  	<table width="400" border="0">
  <tr>
    <td>Search for Course:</td>
    <td><input name="subjectcode" type="text" /></td>
  </tr>
  <tr>
    <td><input name="" type="submit" value="Search" /></td>
    <td></td>
  </tr>
</table>
  </form>
 
  </div>
</div>
<div class="footer"></div>
</div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>