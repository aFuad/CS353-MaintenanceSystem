<?php
  include 'config.php';

  $queryFinishedReps= "SELECT repairment_id FROM repairments WHERE status='wd'";
  $result1 = mysqli_query($conn, $queryFinishedReps);
  $deliveryArr;
  $arrCount=0;
  $deliveryb;
  $symbol = "'";
  while($row = $result1->fetch_assoc()){
     $deliveryArr[$arrCount]=$row['repairment_id'];
     $arrCount++;
  }
  session_start();
  $tckNo= $_SESSION['tckNo'];
  if($arrCount!=0){
    for($l =0; $l <count($deliveryArr); $l++) {
      if(isset($_POST[$deliveryArr[$l]])) {
        $updateQuery= "UPDATE repairments SET status='d' WHERE repairment_id=".$deliveryArr[$l];
        mysqli_query($conn, $updateQuery);


        $insertQuery= "INSERT INTO repair_deliv(deliverer, repairment_id, delivery_start_time, delivery_status)"." VALUES(".$symbol.$tckNo.$symbol.", ".$deliveryArr[$l].", NOW(), 'processing')";
        mysqli_query($conn, $insertQuery);
        header("location: DeliveryPage.php");
      }
    }
  }


?>




<html>
<head>
<title>Delivery Page </title>
<?php if($_SESSION['signedIn']==1){ ?>
<style type="text/css">
  a{
    text-decoration: none;
  }
  .vest{
     color:red;
     border-bottom: 1px solid black;
     padding-bottom: 3px;
     border-color: gray;
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

 #delImg{
   background-image: url("./images/deliver.jpg");
   width:400px;
   height:400px;
   background-size: cover;
   float:right;
 }
 #delStaff{
   border: solid blue 1px;
   width:200px;
   float:right;
 }
 #comDel{
   margin: auto;
   width: 700px;
 }
</style>
</head>
<body>
  <div class="header">
     <h1 class="vest"><a id="vestel" href="https://www.vestel.com.tr/">Vestel</a></h1>
  </div>
<div id="comDel">
  <div id="delImg">

  </div>
  <div id="delStaff">
  <h3> Delivery Staff </h3>
  <a> Choose repairment to be delivered </a>
  <form method = "post">
    <?php
    if($arrCount!=0){
      for($a = 0; $a < count($deliveryArr); $a++) {?>
        <input type="submit" name=<?php echo $deliveryArr[$a]; ?> class="button" value=<?php echo $deliveryArr[$a]; ?>></button>
      <?php
      }
    }
      ?>

  </form>
<button><a href="updateDeliveryStatus.php">Update Delivery Status</a> <br/></button>
<br> <br/>
<button><a href="awaitingDeliveries.php">Awaiting Deliveries</a> <br/></button>
<br><br/>
<button><a href="logoutPage.php">Log Out</a></button>
</div>


</div>
</body>
<?php }
else{
  echo "Please Login";
} ?>
</html>
