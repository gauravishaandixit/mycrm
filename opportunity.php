<?php
  session_start();
  if($_SESSION["logged"]==true)
  {
      $msg=$_SESSION["Name"];
  }
  else
    header("location:index.php");
?>

<!doctype html>
    <html>
    <head>
      <title>Opportunity</title>
      <style type="text/css">
        #quote {
          font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 70%;
        }

        #quote td, #quote th {
          border: 1px solid #ddd;
          padding: 8px;
          text-align: center;
        }

        #quote tr:nth-child(even){background-color: #f2f2f2;}

        #quote tr:hover {background-color: #ddd;}

        #quote th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: center;
          background-color: #4CAF50;
          color: white;
        }
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
      <?php
      require("conection/connect.php");
      include("navigationbar.php");
      $result = mysql_query("SELECT * from opportunity where userid=".$_SESSION['userid']);
      ?>
      <br><br>
      <a style="float: right;" href="enteropp.php">New Opportunity</a>
      <br><br>
      <h3 align="center"><?php echo $_SESSION["Name"];?>, Your Opportunities Are: </h3>
      <br>
      <table id="quote" align="center" >
      <thead>
        <tr>
          <th>Opportunity-id</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Date of Birth</th>
          <th>Address</th>
        </tr>
      </thead>
      <tbody>
        <?php
          while($row = mysql_fetch_row($result)){
            echo
            "<tr>
              <td>{$row[1]}</td>
              <td>{$row[2]}</td>
              <td>{$row[3]}</td>
              <td>{$row[4]}</td>
              <td>{$row[5]}</td> 
            </tr>\n";
          }
        ?>
      </tbody>
    </table>
  </body>
</html>