<?php
  include 'config.php';
  session_start();
  $symbol = "'";

  $repairment_id;
  $descr;




    $insertQuery = "SELECT count(repairment_id), p_name FROM repairments NATURAL JOIN product GROUP BY product_id ORDER BY count(repairment_id) DESC LIMIT 1";

    $result1=mysqli_query($conn, $insertQuery);
    $arrCount=0;





?>

<html>
<head>
  <title> Problematic Product </title>
  <?php if($_SESSION['signedIn']==1){ ?>
  <style type="text/css">
    #employee{
      background-image: url("./images/image1.jpg");
      width: 250px;
      height: 150px;
      background-size: cover;
      margin: auto;

    }
  </style>
</head>
<body>
  <a href="customerServ.php">Main Page</a>
   <br/>
   <br/>
<div style="text-align:center;">
  <div id ="employee">

  </div>

  <?php
  while($row = $result1->fetch_assoc()){
     echo "ID: ".$row['count(repairment_id)']."<br>Name: ".$row['p_name']."<br>";
     $arrCount++;
  }
  ?>
</div>
</body>
<a> If count grows much larger please inform your superiors </a>
<?php }
else{
  echo "Please Login";
} ?>
</html>
