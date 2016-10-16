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
	$ssid = $_REQUEST['subjectsemester']; 
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
  <?php include("loadsubjectsemesterforum.php"); ?>
  </div>
<div class="login">
<p align="center">Login</p>
<?php
	if(isset($_SESSION['instructor']) || isset($_SESSION['student'])){
		echo"You are log in.";
	}else{
?>
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
  <?php } ?>
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
	
  <h3>Welcome to 
  <?php
  	
	include("connectToDatabase.php");
	$sql = "select subjectcode, subjectname from tblsubject t1, tblsubjectsemester t2 where t1.subjectid = t2.subjectid and t2.subjectsemesterid = $ssid";
	$result = mysql_query($sql);
	$num = mysql_num_rows($result);
	if($num > 0) {
		while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
			$subjectname = $row['subjectname'];
            $subjectcode = $row['subjectcode'];
			echo"$subjectcode - $subjectname";
		}
	}else{
		echo "No subject selected";
	}
  ?>
  </h3>
  <div class="maincontent">
  <?php include("loadsubjectsemesterevents.php"); ?>
  </div></div>
<div class="footer"></div>
</div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>