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
  $to="";
  $subject="";
  $message=""; 
  if(isset($_POST['mail']))
  {
    $to =$_POST['email'];
    $subject =$_POST['subject'];
    $mesaage =$_POST['body'];
  }
  $link="mailto:".$to;
?>
<!DOCTYPE html>
<html>
<head>
  <title>Send Mail</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <style type="text/css">
    a {
          display: block;
          color: white;
          text-align: center;
          padding: 14px 16px;
          text-decoration: none;
          background-color: #333; 
        }
    a:hover: {
          background-color: #111;
        }
  </style>
</head>
<body>
  <br><br>
  <div class="header">
    <h2>Send Mail</h2>
  </div>
  <form method="post">
    <div class="input-group">
      <label>To</label>
      <input type="email" name="email" placeholder="Email ID Of Recipient">
    </div>
    <div class="input-group">
      <label>Subject</label>
      <input type="text" name="subject" placeholder="Subject">
    </div>
    <div class="input-group">
      <label>Message</label>
      <input type="textarea" cols="10" rows="5" name="body" placeholder="Message">
    </div>
    <br>
    <a style="float: left;display: block;" href="mailto:dixitgaurav97@gmail.com?subject=Hello&body=Hi!!!">Send Mail</a>
    <br><br>
  </form>
</body>
</html>