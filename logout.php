<?php
error_reporting(E_ALL ^ E_NOTICE);
ini_set('display_errors', '1');
session_start();
?>
<?php
   unset($_SESSION['student']);
   if (isset($_COOKIE[session_name()])) {
       setcookie(session_name(), '', time()-42000, '/');
   }
   $_SESSION = NULL;
   $_SESSION['memberr']=NULL;
   session_destroy();
   header("Location: index.php");
?>
<html>

<head>
  <title></title>
</head>

<body>

<?php



?>

</body>

</html>