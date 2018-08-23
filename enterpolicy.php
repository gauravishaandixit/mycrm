<?php
  session_start();
  $msg="";
  if($_SESSION["logged"]==true)
  {
      $msg=$_SESSION["Name"];
  }
  else
    header("location:index.php");
  include("navigationbar.php");
  require("conection/connect.php");
  if(isset($_POST['make_entry']))
  {
    $policyid=$_POST['policyid'];
    $oppid=$_POST['oppid'];
    $accname=$_POST['accname'];
    $policytype=$_POST['policytype'];
    $startdate=$_POST['startdate'];
    $enddate=$_POST['enddate'];
    $covamount=$_POST['covamount'];
    $segment=$_POST['segment'];
    $agentcode=$_POST['agentcode'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $dob=$_POST['dob'];
    $status=$_POST['status']; 
    $userid=$_SESSION['userid'];
    
    $query = "INSERT INTO policy VALUES ('$policyid','$userid','$oppid','$accname','$policytype','$startdate','$enddate','$covamount',
    '$segment','agentcode','$fname','$lname','$dob','$status')";
    mysql_query($query) or die("Error");
    header("location:policy.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>New Policy Entry</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <br>
  <h3 align="center"><?php echo $_SESSION["Name"];?>, Please Enter Your New Policy Here: </h3>
  <br>
  <div class="header">
  	<h2>New Policy</h2>
  </div>
	
  <form method="post">
    <div class="input-group">
      <label>Policy ID</label>
      <input type="text" name="policyid" placeholder="Policy ID" autocomplete="off">
    </div>
    <div class="input-group">
      <label>Opportunity ID</label>
      <input type="text" name="oppid" placeholder="Opportunity ID" autocomplete="off">
    </div>
    <div class="input-group">
      <label>Account Name</label>
      <input type="text" name="accname" placeholder="Account Name" autocomplete="off">
    </div>
    <div class="input-group">
      <label>Policy Type</label>
      <input type="text" name="policytype" placeholder="Policy Type" autocomplete="off">
    </div>
    <div class="input-group">
      <label>Start Date</label>
      <input type="Date" name="startdate" autocomplete="off">
    </div>
    <div class="input-group">
      <label>End Date</label>
      <input type="Date" name="enddate" autocomplete="off">
    </div>
    <div class="input-group">
      <label>Coverage Amount</label>
      <input type="text" name="covamount" placeholder="Coverage Amount" autocomplete="off">
    </div>
  	<div class="input-group">
  	  <label>Segment</label>
  	  <input type="text" name="segment" placeholder="Segment" autocomplete="off">
  	</div>
    <div class="input-group">
      <label>Agent Code</label>
      <input type="text" name="agentcode" placeholder="Agent Code" autocomplete="off">
    </div>
    <div class="input-group">
    <label>First Name</label>
      <input type="text" name="fname" placeholder="First Name" autocomplete="off">
    </div>
    <div class="input-group">
      <label>Last Name</label>
      <input type="text" name="lname" placeholder="Last Nameme" autocomplete="off">
    </div>
  	<div class="input-group">
  	  <label>Date of Birth</label>
  	  <input type="Date" name="dob" placeholder="Date of Birth" autocomplete="off">
  	</div>
  	<div class="input-group">
  	  <label>Status</label>
  	  <input type="text" name="status" placeholder="Status" autocomplete="off">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="make_entry">Make Entry</button>
  	</div>
  </form>
</body>
</html>