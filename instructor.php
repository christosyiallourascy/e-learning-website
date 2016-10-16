<?php
error_reporting(E_ALL ^ E_NOTICE);
ini_set('display_errors', '1');
session_start();
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
        <li><a href="mycourses.php">My Courses</a>          </li>
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
  <p>
  <?php
      $errNum = $_REQUEST["err"];
      if($errNum == 1) {
          echo "<p style='color:red' align='center'><b>Wrong username or password!!!!</b></p>";
      }
	?>
  </p>
</form>
</div>
<div class="login">
<b>Server Time:</b><br /> <span id="live_time_clock">&nbsp;</span>
</div>
</div>
<div class="main">
	
  <h3>Instructor Page</h3>
  <h4>The instructor can perform the following actions:</h4>
  <div class="maincontent">
  	<a href="addschool.php" target="actionframe">Add School</a><br />
  	<a href="addcoursecategories.php" target="actionframe">Add Course Category</a><br />
  	<a href="addsubject.php" target="actionframe">Add Subject</a><br />
  	<a href="addsubjectsemester.php" target="actionframe">Add Subject Semester</a><br />
    <a href="addsubjectsemesterevent.php" target="actionframe">Add Subject Semester Event</a><br />
    <a href="addsubjectsemesterforum.php" target="actionframe">Create Subject Semester Forum</a><br />
    <a href="addevent.php" target="actionframe">Add Events</a><br />
    <a href="addgrades.php" target="actionframe">Add Grades</a><br />
  </div>
  <div class="maincontent">
  	<iframe name="actionframe" height="250" width="100%" frameborder="0">
    
    </iframe>
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
  <p><b>School Events</b></p>
  <?php include("loadschoolevents.php");?>
</div>
<div class="footer"></div>
</div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>