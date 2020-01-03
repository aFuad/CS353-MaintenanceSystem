<?php
  include 'config.php';

  session_start();
  $tckNo = $_SESSION['tckNo'];

  $query2 =  "SELECT repairment_id, status, product_id, repairment_end_date FROM repairments WHERE customer=".$tckNo;
  $result2 = mysqli_query($conn, $query2);

  $repArr;
  $statusArr;
  $productArr;
  $upDate;
  $arrCount=0;
  $symbol = "'";
  while($row = $result2->fetch_assoc()){
     $repArr[$arrCount]=$row['repairment_id'];
     if($row['status']=='inr'){
       $statusArr[$arrCount]="In repairment";
     }
     else if($row['status']=='wts'){
       $statusArr[$arrCount]="Waiting fo r tech staff to be assigned";
     }
     else if($row['status']=='d'){
       $statusArr[$arrCount]="Sent to delivery department";
     }
     else if($row['status']=='wdi'){
       $statusArr[$arrCount]="Waiting for dismantle staff to be assigned";
     }
     else if($row['status']=='di'){
       $statusArr[$arrCount]="In dismantling deparment";
     }
     else if($row['status']=='wd'){
       $statusArr[$arrCount]="Waiting for delivery staff to be assigned";
     }

     $productArr[$arrCount]=$row['product_id'];
     $upDateArr[$arrCount]=$row['repairment_end_date'];
     $arrCount++;
  }

?>

<html>
<title>Display Repairments</title>
<?php if($_SESSION['signedIn']==1){ ?>
<head>
  <style type="text/css">

  .vest{
     color:red;
     border-bottom: 1px solid black;
     padding-bottom: 3px;
     border-color: gray;
  }
  #vestel{
    text-decoration: none;
  }
  #vestel:link {
    color: red;
  }

  /* visited link */
   #vestel:visited {
     color: red;
     }

  /* mouse over link */
  #vestel:hover {
   color: red;
  }

  /* selected link */
  #vestel:active {
   color: red;
  }
  </style>
</head>


<body>

  <div class="header">
   <h1  class="vest"><a id="vestel" href="https://www.vestel.com.tr/">Vestel</a></h1>
  </div>

  <h3>Your repairments</h3>
  <?php
  echo "<br>";
  if($arrCount!=0){
    for($a = 0; $a < count($repArr); $a++) {
      ?>
      <div style="border:solid black 1px; width:200px;">
      <a><?php echo "Repairment ID: ".$repArr[$a]." <br> Status:".$statusArr[$a]."<br> Product: ".$productArr[$a]."<br>"; ?>
      </div>
      <br/>
    <?php
    }
  }
  ?>
  <a style="text-decoration:none;" href="customerPage.php">Main Page</a>
</body>
<?php }
else{
  echo "Please Login";
} ?>
</html>
