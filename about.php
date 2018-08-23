<?php
	session_start();
	if($_SESSION["logged"]==true)
  	{
      $msg=$_SESSION["Name"];
  	}
  	else
    	header("location:index.php");
    include("navigationbar.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>About</title>
</head>
<body>
	<h2 style="padding-left: 50px;font-style: bold;" align="center">This website is developed by::</h2>
	<p align="center" style="font-size: 20px">
		Gaurav Dixit<br>    CSE, B.Tech Final Year<br>MMMUT, Gorakhpur
	</p><br>
	<p align="center" style="font-size: 20px">
		Shwetank Singh<br>    CSE, B.Tech Final Year<br>MMMUT, Gorakhpur
	</p><br>
	<p align="center" style="font-size: 20px">
		Nandita Pandey<br>    CSE, B.Tech Final Year<br>MMMUT, Gorakhpur
	</p>
</body>
</html>