<?php
  session_start();
  $msg="";
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
      <title>Policy</title>

      <style type="text/css">
        #quote {
          font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
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
        a:hover{
          background-color: #111;
        }
      </style>
    </head>
    <body>
      <?php
      require("conection/connect.php");
      include("navigationbar.php");
      $result = mysql_query("SELECT * from policy where UserId=".$_SESSION["userid"]);
      ?>
      <br><br>
      <a style="float: left;" href="mailto:">Send Mail</a>
      <a style="float: right;" href="enterpolicy.php">New Policy</a>
      <br><br>
      <h3 align="center"><?php echo $_SESSION["Name"];?>, Your Policies Are: </h3>
      <table id="quote" align="center">
      <thead>
        <tr>
          <th>Policy-id</th>
          <th>Opportunity-id</th>
          <th>Account Name</th>
          <th>Policy Type</th>
          <th>Start Date</th>
          <th>End Date</th>
          <th>Coverage Amount</th>
          <th>Segment</th>
          <th>Agent Code</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>DOB</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <style type="text/css">
        </style>
        <?php
          while($row = mysql_fetch_row($result)){
            echo
            "<tr>
              <td>{$row[0]}</td>
              <td><a href='showopp.php?oppid=$row[2]'>$row[2]</a></td>
              <td><a href='account.php?accname=$row[3]'>{$row[3]}</td>
              <td>{$row[4]}</td>
              <td>{$row[5]}</td> 
              <td>{$row[6]}</td>
              <td>{$row[7]}</td>
              <td>{$row[8]}</td>
              <td>{$row[9]}</td>
              <td>{$row[10]}</td>
              <td>{$row[11]}</td>
              <td>{$row[12]}</td>
              <td>{$row[13]}</td>
              
            </tr>\n";

          }
        ?>
      </tbody>
    </table>
    </body>
    </html>