<?php
  include 'config.php';

  $symbol = "'";

  $repairment_id;
  $descr;




    $insertQuery = "SELECT count(repairment_id), full_name FROM repairments NATURAL JOIN fixes NATURAL JOIN user GROUP BY tckNo ORDER BY count(repairment_id) DESC LIMIT 1";

    $result1=mysqli_query($conn, $insertQuery);
    $arrCount=0;





?>

<html>
<head>
  <title> Employee of the month </title>
  <style type="text/css">
    #employee{
      background-image: url("./images/images.jpg");
      width: 150px;
      height: 150px;
      background-size: cover;
      margin: auto;

    }
  </style>
</head>
<body>
  <a href="LoginPage.php">Login Page</a>
   <br/>
   <br/>
<div style="text-align:center;">
  <div id ="employee">

  </div>

  <?php
  while($row = $result1->fetch_assoc()){
     echo "ID: ".$row['count(repairment_id)']."<br>Name: ".$row['full_name']."<br>";
     $arrCount++;
  }
  ?>
</div>
</body>
</html>
