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
  $quoteid="";
  $quotenum="";
  $amount = "";
  $approver= "";
  $comments=""; 
  if(isset($_POST['make_entry']))
  {
    $quoteid =$_POST['quoteid'];
    $quotenum = $_POST['quotenum'];
    $amount =$_POST['amount'];
    $approver =$_POST['approver'];
    $comments = $_POST['comments'];
    $userid=$_SESSION['userid'];
    
    $query = "INSERT INTO quotes (userid,quoteid,quotenumber,amount,approver,comments) VALUES ('$userid','$quoteid','$quotenum','$amount',
    '$approver','$comments')";
    mysql_query($query) or die("Error");
    header("location:quotes.php");
  }

?>
<!DOCTYPE html>
<html>
<head>
  <title>New Quote Entry</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <div class="header">
  	<h2>New Quote</h2>
  </div>
	
  <form method="post">
    <div class="input-group">
      <label>Quote ID</label>
      <input type="text" name="quoteid" placeholder="Quote ID" autocomplete="off">
    </div>
  	<div class="input-group">
  	  <label>Quote Number</label>
  	  <input type="text" name="quotenum" placeholder="Quote Number" autocomplete="off">
  	</div>
    <div class="input-group">
      <label>Amount</label>
      <input type="text" name="amount" placeholder="Amount" autocomplete="off">
    </div>
  	<div class="input-group">
  	  <label>Approver</label>
  	  <input type="text" name="approver" placeholder="Approver" autocomplete="off">
  	</div>
  	<div class="input-group">
  	  <label>Comments</label>
  	  <input type="text" name="comments" placeholder="Comments" autocomplete="off">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="make_entry">Make Entry</button>
  	</div>
  </form>
</body>
</html>