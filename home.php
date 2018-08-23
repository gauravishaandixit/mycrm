<?php
  session_start();
  $msg="";
  include("navigationbar.php");
  if($_SESSION["logged"]==true)
  {
      $msg=$_SESSION["Name"];
  }
  else
    header("location:index.php");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  <link rel="stylesheet" type="text/css" href="css/login.css" />
</head>
<body>
    <h2 align="center"><?php echo "Hello ".$msg.", Welcome to ABC Insurance Company."?></h2>
    <br><br>
    <h2 style="padding-left:50px;">Aim :: </h2>
    <p style="font-size: 20px;padding-left: 50px;padding-top: 10px">Our website provides a great platform to interact with the customers.</p>
</body>
</html>