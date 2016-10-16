<?php
error_reporting(E_ALL ^ E_NOTICE);
ini_set('display_errors', '1');
session_start();
?>
<?php 
	$idnumber = $_REQUEST["idnumber"];
    $name = $_REQUEST["name"];
    $homephone = $_REQUEST["homephone"];
    $password = $_REQUEST["password"];
	$cpassword = $_REQUEST["cpassword"];
	
    $add = $_REQUEST['add'];
	
$mysql_host = "mysql12.000webhost.com";
$mysql_database = "a6971579_ekali";
$mysql_user = "a6971579_ekali";
$mysql_password = "ekali2010";

	$conn = mysql_connect($mysql_host, $mysql_user, $mysql_password, "set names utf8")
	or die ('Error connecting to mysql');
	mysql_select_db($mysql_database);
	mysql_set_charset('utf8',$conn);
	
	if($add != null){
		$sql = "select * from tblstudents where homephone ='$homephone' and firstname ='$name'";
		$result = mysql_query($sql);
		if($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$studentid = $row['studentid'];
		if($password != $cpassword){
			$err1 = "Η επιβεβαίωση του κωδικού δεν ταιριάζει. Παρακαλώ δοκιμάστε ξανά.";
		}else{	
		if (($idnumber != null)&&($name != null)&& ($homephone != null) &&($password != null)){
		$sql = "SELECT * FROM tblstudents t WHERE t.idnumber = '$idnumber'";
                               $result = mysql_query($sql);
                               if($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
                                 $err2 = "Το όνομα χρήστη έχει χρησιμοποιηθεί ξανά, παρακαλώ ελέγξτε για τυχών λάθη.";

                               }else{
                                   $sql = "update tblstudents set idnumber='$idnumber', password='$password' where studentid='$studentid'";
                                 $result = mysql_query($sql);
								 if($result != FALSE){
									 $msg = "Ο λογαριασμός σας έχει δημιουργηθεί";
									 $msg1 = "done";
								 }else{
									 $msg = "Ο λογαριασμός σας δεν έχει δημιουργηθεί.";
							   		}
							   }
		}else{
			$err1 = "Παρακαλώ συμπληρώστε όλα τα πεδία.";
		}
		}
		}else{
				$err3 = "Δεν υπάρχει εγγραφή για αυτό τον μαθητή.  Παρακαλώ κάντε πρώτα εγγραφή κάνοντας κλικ <a href='entries.php'>εδώ</a>.";
			}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cybernet ΕΚΑΛΗΣ | Δημιουργία Λογαριασμού</title>
<link href="CybernetEkali.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-12929031-1");
pageTracker._trackPageview();
} catch(err) {}</script>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
</head>

<body class="body" onload="MM_preloadImages('images/map.jpg')" oncontextmenu="return false;">
<div class="container">
<div class="header">
<img height="170px" width="1000px" align="left" src="images/CYBERNETbg.jpg" />
</div>

<div class="left">
<div class="leftsub1">
  <ul id="MenuBar2" class="MenuBarVertical">
    <li><a href="methodology.html"><strong>Ιστορικό</strong></a></li>
    <li><a href="levels.html"><strong>Επίπεδα</strong></a></li>
    <li><a href="activities.html"><strong>Δραστηριότητες</strong></a></li>
    <li><a href="facilities.html"><strong>Εγκαταστάσεις</strong></a></li>
    <li><a href="manager.html"><strong>Διευθυντής</strong></a></li>
    <li><a href="instructors.html"><strong>Εκπαιδευτές</strong></a>      </li>
    <li><a href="#" class="MenuBarItemSubmenu"><strong>Αναζήτηση στο Web</strong></a>
      <ul>
        <li><a href="http://www.google.com"><strong>Google</strong></a></li>
        <li><strong><a href="http://www.yahoo.com">Yahoo</a></strong></li>
        <li><a href="http://www/answers.com"><strong>Answers</strong></a></li>
        <li><a href="http://www.wikipedia.org/"><strong>Wikipedia</strong></a></li>
      </ul>
    </li>
    <li><a href="contact.php"><strong>Επικοινωνία</strong></a></li>
    <li><a href="entries.php"><strong>Online Εγγραφή</strong></a></li>
  </ul>
</div>
<div class="leftsub1">
<p><img height="200px" width="200px" src="images/cybernet%20logo%202.JPG" /></p>
</div>
</div>
<div class="right">
<div class="rightsub2">
<strong><font face="Verdana, Geneva, sans-serif">Google Maps Picture</font></strong>
<p><iframe width="150" height="150" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps/ms?hl=en&amp;ie=UTF8&amp;msa=0&amp;msid=103498676563096175126.00047c9354e90fda0758d&amp;ll=34.703659,33.021705&amp;spn=0.008185,0.013797&amp;t=h&amp;output=embed"></iframe><br /><small><a href="http://maps.google.com/maps/ms?hl=en&amp;ie=UTF8&amp;msa=0&amp;msid=103498676563096175126.00047c9354e90fda0758d&amp;ll=34.703659,33.021705&amp;spn=0.008185,0.013797&amp;t=h&amp;source=embed" style="color:#0000FF;text-align:left">View a larger map</a> </small></p>
  </div>
<div class="rightsub1">
<strong><font face="Verdana, Geneva, sans-serif">Οι συνεργάτες μας</font></strong>
<table width="150" align="center">
  <tr>
    <td><a href="http://www.cybernet.ac.cy"><img src="images/cybernet.jpg" width="120" height="50" alt="Cybernet Company" longdesc="http://www.cybernet.ac.cy" /></a></td>
  </tr>
  <tr>
    <td><a href="http://www.icteurope.gr/"><img src="images/ict0203.JPG" width="120" height="50" alt="ICT-Europe" longdesc="http://www.icteurope.gr/" /></a></td>
  </tr>

  <tr>
    <td><a href="http://www.ecdl.com.cy/"><img src="images/ecdlnew03.GIF" width="120" height="50" alt="ECDL" longdesc="http://www.ecdl.com.cy/" /></a></td>
  </tr>
  <tr>
    <td><a href="http://www.ccs.org.cy/"><img src="images/ccsnew02.GIF" width="120" height="50" alt="CCS" longdesc="http://www.ccs.org.cy/" /></a></td>
  </tr>
</table>

</div>
<div class="rightsub1">
<strong><font face="Verdana, Geneva, sans-serif">Διεύθυνση</font></strong> 
<p><em>Ευαγόρα Λανίτη 95, 3111, Εκάλη, Λεμεσός</em></p>
 </div>
 <div class="rightsub1">
<font face="Verdana, Geneva, sans-serif"><strong>Web Hosting By</strong></font>
 <p><a href="http://www.000webhost.com/" onClick="this.href='http://www.000webhost.com/255727.html'" target="_blank"><img src="http://www.000webhost.com/images/banners/120x60/banner1.gif" alt="Free Website Hosting" width="120" height="60" border="0" /></a></p>
 </div>
</div>

<div class="main">
<div class="horizontalmenu">
  <ul id="MenuBar1" class="MenuBarHorizontal">
    <li><a href="index.php"><strong>Αρχική Σελίδα</strong></a>      </li>
    <li><a href="studentwork.html"><strong>Εργασίες Μαθητών μας</strong></a></li>
<li><a href="#" class="MenuBarItemSubmenu"><strong>Σελίδες με Flash Games</strong></a>
  <ul>
        <li><a href="http://www.flash-games.net/"><strong>Flash-Games.net</strong></a></li>
        <li><strong><a href="http://www.miniclip.com">MiniClip</a></strong></li>
        <li><a href="http://www.y8.com"><strong>Y8</strong></a></li>
        <li><a href="http://www/armorgames.com"><strong>Armor Games</strong></a></li>
        <li><a href="http://www.mariogamesflash.com"><strong>Mario Games</strong></a></li>
        <li><a href="http://www.onlinegames.net"><strong>Online Games</strong></a></li>
        <li><a href="http://www.fyletikesmaxes.gr"><strong>Fyletikes Maxes</strong></a></li>
        <li><a href="moregames.html"><strong>Περισσότερες Σελίδες</strong></a></li>
      </ul>
    </li>
  </ul>
</div>
<div class="maincontent">
<em><h1 align="center"><font color="#000099">CYBERNET</font> <font color="#990000">ΕΚΑΛΗΣ</font></h1></em>
<p align="center"><font size="+2">Ινστιτούτο Ηλεκτρονικών Υπολογιστών</font></p>
<p align="center"><font size="+2">Είσοδος στο Εκάλη Connect</font></p>
<hr color="#0066FF" />
<font color="#FF0000"><?php echo $err1 ?></font>
<font color="#FF0000"><?php echo $err2 ?></font>
<font color="#FF0000"><?php echo $err3 ?></font>
<?php 
if ($msg1 != "done"){
?>
<form action="createAccount.php?add=a" method="post">
<table width="590" border="0" cellspacing="10">
  <tr>
    <td>Όνομα</td>
    <td><input name="name" type="text" /></td>
  </tr>
  <tr>
    <td>Τηλ Κατοικίας</td>
    <td><input name="homephone" type="text" id="homephone" /></td>
  </tr>
  <tr>
    <td>Όνομα Χρήστη (Username)</td>
    <td><input name="idnumber" type="text" /></td>
  </tr>
  <tr>
    <td>Κωδικός Πρόσβασης (Password)</td>
    <td><input name="password" type="password" /></td>
  </tr>
  <tr>
    <td>Επιβεβαίωση Κωδικού Πρόσβασης (Confirm Password)</td>
    <td><input name="cpassword" type="password" /></td>
  </tr>
   <tr>
    <td><input name="" type="submit" value="&Delta;&eta;&mu;&iota;&omicron;&upsilon;&rho;&gamma;&#943;&alpha; &Lambda;&omicron;&gamma;&alpha;&rho;&iota;&alpha;&sigma;&mu;&omicron;&#973;" /></td>
    <td></td>
  </tr>
</table>

</form>
<?php
}else{
	echo $msg;
}
?>
</div>
</div>
<div class="footerMenu">
  <table width="900" border="0" align="center">
    <tr>
      <td valign="top">&nbsp;</td>
      <td valign="top">&nbsp;</td>
      <td valign="top">&nbsp;</td>
      <td valign="top">&nbsp;</td>
      <td valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td width="168" valign="top"><a href="methodology.html" class="footermylink">Ιστορικό</a></td>
      <td width="199" valign="top"><a href="manager.html" class="footermylink">Διευθυντής</a></td>
      <td width="204" valign="top"><a href="entries.php" class="footermylink">Online Εγγραφή </a></td>
      <td width="112" valign="top"><a href="www.google.com" class="footermylink">Google</a></td>
      <td width="217" valign="top"><a href="ekaliconnect.php" class="footermylink">Είσοδος</a></td>
    </tr>
    <tr>
      <td width="168" valign="top"><a href="levels.html" class="footermylink">Επίπεδα</a></td>
      <td width="199" valign="top"><a href="instructors.html" class="footermylink">Εκπαιδευτές </a></td>
      <td width="204" valign="top"><a href="index.php" class="footermylink">Αρχική Σελίδα</a></td>
      <td width="112" valign="top"><a href="www.yahoo.com" class="footermylink">Yahoo</a></td>
      <td width="217" valign="top"><a href="createAccount.php" class="footermylink">Δημιουργία Λογαριασμού</a></td>
    </tr>
    <tr>
      <td width="168" valign="top"><a href="activities.html" class="footermylink">Δραστηριότητες</a></td>
      <td width="199" valign="top">Αναζήτηση στο Web</td>
      <td width="204" valign="top"><a href="studentwork.html" class="footermylink">Εργασίες Μαθητών μας </a></td>
      <td width="112" valign="top"><a href="www.answers.com" class="footermylink">Answers</a></td>
      <td width="217" valign="top"><a href="http://www.cybernet.ac.cy" class="footermylink">Cybernet</a></td>
    </tr>
    <tr>
      <td width="168" valign="top"><a href="facilities.html" class="footermylink">Εγκαταστάσεις </a></td>
      <td width="199" valign="top"><a href="contact.php" class="footermylink">Επικοινωνία</a></td>
      <td width="204" valign="top"><a href="moregames.html" class="footermylink">Σελίδες με Flash Games</a></td>
      <td width="112" valign="top"><a href="http://www.wikipedia.org/" class="footermylink">Wikipedia</a></td>
      <td width="217" valign="top"><a href="http://www.000webhost.com" class="footermylink">WebHost</a></td>
    </tr>
</table>
</div>

<div class="footer"><marquee>
  <strong><font color="#FFFFFF">Cybernet Εκάλης Ινστιτούτο ηλεκτρονικών υπολογιστών. © 2010. All Rights Reserved.</font></strong>
</marquee>
</div>
</div>
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
var MenuBar2 = new Spry.Widget.MenuBar("MenuBar2", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
</script>
</body>
</html>