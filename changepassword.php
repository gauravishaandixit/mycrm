<?php
	session_start();
  $msg="";
	if($_SESSION["logged"]!=true)
  {
    header("location:index.php");
  }
  if(isset($_POST['btn_log']))
  {
    require("conection/connect.php");
    $result = mysql_query("SELECT password from crmlogin where userid=".$_SESSION['userid']);
    $row=mysql_fetch_row($result);
    $oldpass=$_POST['old'];
    $newpass1=$_POST['new1'];
    $newpass2=$_POST['new2'];
    if($row[0]!=$oldpass)
    {
      $msg="Old Password Didn't Match!!!";
    }
    else if($newpass1!=$newpass2)
    {
      $msg="New Passwords Didn't Match!!!";
    }
    else
    {
      $query="update crmlogin set password='$newpass1' where userid=".$_SESSION['userid'];
      $alter=mysql_query($query) or die('query1 error');
      $result1 = mysql_query("SELECT password from crmlogin where userid=".$_SESSION['userid']) or die('query2 error');
      $row1=mysql_fetch_row($result1);
      if($row1[0]==$newpass1)
      {
        $msg="Password Changed Succesfully!!!";
        #header("location:employee.php");
      }
    }
  }
?>

<html>
<head>
<title>Change Password</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<?php
  include("navigationbar.php");
?>
<body>
  <br><br>
  <h2 align="center"><?php echo $_SESSION['Name'].", Change Your Password Here."?></h2>
  <div class="header">
    <h2>Change Password</h2>
  </div>
  
  <form method="post">
    <div class="input-group">
      <label>Old Password</label>
      <input type="password" name="old">
    </div>
    <div class="input-group">
      <label>New Password</label>
      <input type="password" name="new1">
    </div>
    <div class="input-group">
      <label>Confirm New Password</label>
      <input type="password" name="new2">
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="btn_log">Change Password</button>
    </div>
  </form>
  <br>
  <h3 align="center">
  <?php echo $msg; ?>
  </h3>
</body>
</html>