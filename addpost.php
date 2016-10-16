<?php
echo"Here you can add post for the current forum <br />";
$today = date("F j, Y, g:i a");//get current server date
$fid = $_REQUEST['forumid'];
echo"<form action='adddata.php?a=9' method='post'>";
echo"<table width='100%' border='0'>";
    echo"<td>Post Name:</td>";
    echo"<td><input name='postname' type='text'></td>";
  echo"</tr>";
  echo"<tr>";
    echo"<td>Post Decription:</td>";
    echo"<td><input name='postdetail' type='text'></td>";
  echo"</tr>";
  echo"<tr>";
    echo"<td>Date Added:</td>";
    echo"<td><input name='dateadded' type='text' value='$today'></tr>";
  echo"</tr>";
   echo"<tr>";
    echo"<td>Forum ID:</td>";
    echo"<td><input name='fid' type='text' value='$fid'></tr>";
  echo"</tr>";
 
echo"</table>";
echo"<input name='createpost' type='submit' value='Add post'>";
echo"</form>";
?>