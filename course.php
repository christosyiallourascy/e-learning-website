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
<script type="text/javascript">
function showSubjects(str)
{
var xmlhttp;    
if (str=="")
  {
  document.getElementById("destination").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("destination").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","showsubjects.php?sid="+str,true);
xmlhttp.send();
}
</script>
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
	 <script type="text/javascript">
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
</form>
<?php
	}
?>
<p>
  <?php
      $errNum = $_REQUEST["err"];
      if($errNum == 1) {
          echo "<p style='color:red' align='center'><b>Wrong username or password!!!!</b></p>";
      }
	?>
  </p>
</div>
</div>
<div class="main">

  <h3>Course</h3>
  <div class="maincontent">
  	<?php
		$cid = $_REQUEST['cid'];
		include("connectToDatabase.php");
		$sql = "select * from tblsubject where courseid = $cid";
		$result = mysql_query($sql);
		$num = mysql_num_rows($result);
		if($num > 0) {
			echo"<table>";
			while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
				$subjectid = $row['subjectid'];
				$subjectname = $row['subjectname'];
				$subjectcode = $row['subjectcode'];
				
				echo"<tr>";
				echo"<td>$subjectcode - $subjectname</td> <td><input name='show' type='button' onclick='showSubjects($subjectid)' value='Show Subjects' /></td>";
				echo"</tr>";
				
			}
				echo"</table>";
				echo"<div id='destination'></div>";
		}else{
			echo"There are no subjects for this course category";
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