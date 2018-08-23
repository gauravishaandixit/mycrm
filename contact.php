<?php
	session_start();
	if($_SESSION["logged"]==true)
  	{
      $msg=$_SESSION["Name"];
  	}
  	else
    	header("location:index.php");
    require("conection/connect.php");
    include("navigationbar.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Contact</title>
</head>
<body>

</body>
</html>