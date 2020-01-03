<?php
  include 'config.php';
  $symbol = "'";
  session_start();
  $tckNo;
  $tckNo=$_SESSION['tckNo'];
  $queryDelWaitingReps= "SELECT repairment_id, full_name, address, phone_number FROM repair_deliv NATURAL JOIN repairments NATURAL JOIN customer NATURAL JOIN user WHERE delivery_status='processing'";
  $result1 = mysqli_query($conn, $queryDelWaitingReps);
  $arrCount=0;
  $symbol = "'";
  while($row = $result1->fetch_assoc()){
     $deliveryArr[$arrCount]=$row['repairment_id']."||| ".$row['full_name']." ".$row['address']." ".$row['phone_number']."<br>";
     $arrCount++;
  }










?>



<html>

<title>Awaiting Deliveries</title>
<?php if($_SESSION['signedIn']==1){ ?>
<?php
if($arrCount!=0){

  for($a = 0; $a < count($deliveryArr); $a++) {
    echo "<br>";
    ?>
    <div style="border:solid black 1px; width: 120px;">
    <a><?php echo $deliveryArr[$a];?> </a> <br/>
  </div>
  <?php
  }
}
?>
<a href="DeliveryPage.php">Main Page</a>
<?php }
else{
  echo "Please Login";
} ?>
</html>
