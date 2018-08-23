<?php
  session_start();
  $msg="";
  if($_SESSION["logged"]==true)
  {
      $msg=$_SESSION["Name"];
  }
  else
    header("location:index.php");

  require("conection/connect.php");
  include("navigationbar.php");
  $oppid="";
  $fname="";
  $lname = "";
  $dob= "";
  $address=""; 
  if(isset($_POST['make_entry']))
  {
    $oppid=$_POST['oppid'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $dob=$_POST['dob'];
    $address=$_POST['address']; 
    $userid=$_SESSION['userid'];
    
    $query = "INSERT INTO opportunity (userid,opportunityid,firstname,lastname,dob,address) VALUES ('$userid','$oppid','$fname','$lname',
    '$dob','$address')";
    mysql_query($query) or die("Error");
    header("location:opportunity.php");
  }

?>
<!DOCTYPE html>
<html>
<head>
  <title>New Opportunity Entry</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <br>
  <h3 align="center"><?php echo $_SESSION["Name"];?>, Please Enter Your New Opportunity Here: </h3>
  <br>
  <div class="header">
  	<h2>New Opportunity</h2>
  </div>
	
  <form method="post">
    <div class="input-group">
      <label>Opportunity ID</label>
      <input type="text" name="oppid" placeholder="Opportunity ID" autocomplete="off">
    </div>
  	<div class="input-group">
  	  <label>First Name</label>
  	  <input type="text" name="fname" placeholder="First Name" autocomplete="off">
  	</div>
    <div class="input-group">
      <label>Last Name</label>
      <input type="text" name="lname" placeholder="Last Name" autocomplete="off">
    </div>
  	<div class="input-group">
  	  <label>Date of Birth</label>
  	  <input type="Date" name="dob" placeholder="Date of Birth" autocomplete="off">
  	</div>
  	<div class="input-group">
  	  <label>Address</label>
  	  <input type="textarea" name="address" placeholder="Address" autocomplete="off">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="make_entry">Make Entry</button>
  	</div>
  </form>
</body>
</html>