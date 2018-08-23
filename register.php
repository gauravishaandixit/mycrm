<?php 
  require("conection/connect.php"); 
  $msg="";
  if(isset($_POST['reg_user']))
  {
    $name =$_POST['name'];
    $username = $_POST['username'];
    $email =$_POST['email'];
    $password =$_POST['password'];
    $dob = $_POST['dob'];

    if ($name=="" || $username=="" || $email="" ||$password=="" || $dob="" ) {
    	$msg="Please Fill All Details.";
    }
    else
    {  
    	$query = "INSERT INTO crmlogin (username,password,Name,DOB,email) VALUES ('$username','$password','$name','$dob','$email')";
    	mysql_query($query) ;
    	header('location: index.php');
    }
  }

?>
<!DOCTYPE html>
<html>
<head>
  <title>Register Here</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
  <h2 style="color:#00F;" align="center">
  <?php echo $msg; ?>
  </h2>
  <form method="post" action="register.php">
    <div class="input-group">
      <label>Name</label>
      <input type="text" name="name">
    </div>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username">
  	</div>
    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password">
    </div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email">
  	</div>
  	<div class="input-group">
  	  <label>Date of Birth</label>
  	  <input type="Date" name="dob">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already A Member? <a href="index.php">Sign in</a>
  	</p>
  </form>
</body>
</html>