<?php

echo"Here you can add school to this platform<br />";
echo"<form action='adddata.php?a=1' method='post'>";
echo"<table width='100%' border='0'>";
  echo"<tr>";
    echo"<td>School Name:</td>";
    echo"<td><input name='schoolname' type='text'></td>";
  echo"</tr>";
  echo"<tr>";
    echo"<td>School Description:</td>";
    echo"<td><input name='schooldescription' type='text'></td>";
  echo"</tr>";
echo"</table>";
echo"<input name='addschool' type='submit' value='Add School'>";
echo"</form>";
?>