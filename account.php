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
  <title>Account</title>
</head>
<body>
<div style="padding: 250px 0px 0px 250px">
  <?php
    if(isset($_GET['accname']))
    {
      echo $_GET['accname']; 
    }
  ?>
</div>
</body>
</html>