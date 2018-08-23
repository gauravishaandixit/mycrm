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
    $result = mysql_query("SELECT * from crmlogin where userid=".$_SESSION['userid']);
    $row=mysql_fetch_row($result);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<style type="text/css">
        #emp {
          font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
          font-size: 20px;
          border-collapse: collapse;
          width: 70%;
        }

        #emp td, #emp th {
          border: 1px solid blue;
          padding: 8px;
          text-align: left;
        }
        #emp tr:hover 
        {
        	background-color: white;
        }
        a{
          display: block;
          color: white;
          text-align: center;
          padding: 14px 16px;
          text-decoration: none;
          background-color: #333; 
        }
	</style>
</head>
<body>
	<br><br>
	<a style="float: right;" href="changepassword.php">Change Password</a>
	</br>
	</br>
	<h2 style="padding-left: 200px;"><?php echo $_SESSION['Name'].", Your Profile Details Are ::-"; ?></h2>
	</br>
	<table id="emp" align="center" >
      <tbody>
      	<tr>
      		<td><b>Name:</b></td>
      		<td><?php echo $row[3];?></td>
      	</tr>
      	<tr>
      		<td><b>User id:</b></td>
      		<td><?php echo $row[0];?></td>
      	</tr>
      	<tr>
      		<td><b>Username:</b></td>
      		<td><?php echo $row[1];?></td>
      	</tr>
      	<tr>
      		<td><b>Date of Birth:</b></td>
      		<td><?php echo $row[4];?></td>
      	</tr>
      	<tr>
      		<td><b>E-mail:</b></td>
      		<td><?php echo $row[5];?></td>
      	</tr>
      </tbody>
    </table>
</body>
</html>