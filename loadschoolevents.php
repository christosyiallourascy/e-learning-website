<?php
include("connectToDatabase.php");

$sql = "SELECT * FROM tblevent";//desc by date limit 4
$result = mysql_query($sql);
$num = mysql_num_rows($result);
if($num > 0) {
	
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
			  $eventid = $row['eventid'];
              $eventname = $row['eventname'];
              $eventdescription = $row['eventdescription'];
			  $eventdate = $row['eventdate'];
			  $eventtime = $row['eventtime'];
			  $eventplace = $row['eventplace'];
              echo "<div class='maincontent'>";
			  echo"<table border='0'>";
			  echo"<tr>";
			  echo"<td>$eventname</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td>$eventdescription</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td>Date: $eventdate Time: $eventtime, Location: $eventplace</td>";
			  echo"</tr>";
			  echo"</table>";
			  echo"</div>";
	}
	
}else{
	echo"These are no events available.";
}
?>