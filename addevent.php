<?php

echo"Here you can add school to this platform<br />";
echo"<form action='adddata.php?a=7' method='post'>";
echo"<table width='100%' border='0'>";
  echo"<tr>";
    echo"<td>Event Name:</td>";
    echo"<td><input name='eventname' type='text'></td>";
  echo"</tr>";
  echo"<tr>";
    echo"<td>Event Description:</td>";
    echo"<td><input name='eventdescription' type='text'></td>";
  echo"</tr>";
   echo"<tr>";
    echo"<td>Event Date:</td>";
    echo"<td><input name='eventdate' type='text'></td>";
  echo"</tr>";
   echo"<tr>";
    echo"<td>Event Time:</td>";
    echo"<td><input name='eventtime' type='text'></td>";
  echo"</tr>";
   echo"<tr>";
    echo"<td>Event Place:</td>";
    echo"<td><input name='eventplace' type='text'></td>";
  echo"</tr>";
echo"</table>";
echo"<input name='addschool' type='submit' value='Add Event'>";
echo"</form>";
?>