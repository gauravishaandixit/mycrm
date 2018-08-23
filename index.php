<?php
  require("conection/connect.php");
  $msg="";
  $uname="";
  $pwd="";
  if(isset($_POST['btn_log']))
  {
    $uname=$_POST['unametxt'];
    $pwd=$_POST['pwdtxt'];
    
    $result=mysql_query("SELECT * FROM crmlogin");
    while ($row=mysql_fetch_row($result))
      {
        if($row[1]==$uname and $row[2]==$pwd)
        {
          session_start();
          $_SESSION["logged"]=true;
          $_SESSION["Name"]=$row[3];
          $_SESSION["userid"]=$row[0];
          header("location: home.php");
        }
      }
      $msg="Log In Again...";
     }

?>
<html>
<head>
<title>Log In</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
  <br><br><br>
  <br><br>
  <div class="header">
    <h2>Log In</h2>
  </div>
  
  <form method="post">
    <div class="input-group">
      <label>Username</label>
      <input type="text" name="unametxt" value="<?php echo $uname; ?>">
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="password" name="pwdtxt">
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="btn_log">Log In</button>
    </div>
    <p>
      New User? <a href="register.php">Register Here</a>
    </p>
  </form>
  <h2 style="color:#00F;" align="center">
  <?php echo $msg; ?>
  </h2>
</body>
</html>