<?php
  include 'config.php';
  $symbol = "'";
  session_start();
  $tckNo=$_SESSION['tckNo'];


  $query1 =  "SELECT repairment_id, descr, status, product_id FROM repairments NATURAL JOIN fixes WHERE tckNo=".$tckNo;
  $result1 = mysqli_query($conn, $query1);

  $repairArr;
  $arrCount=0;
  $symbol = "'";
  while($row = $result1->fetch_assoc()){
     $repairArr[$arrCount]="Repairment Id: ".$row['repairment_id']."<br>Description: ".$row['descr']."<br>Status: ".$row['status']."<br>Product Id: ".$row['product_id']."<br>";
     $arrCount++;
  }



  ?>



<html>

  <title>Awaiting Repairments</title>
  <?php if($_SESSION['signedIn']==1){ ?>
  <button><a style="text-decoration:none" href="TechStaffPage.php">Main Page</a> </button>

  <button><a style="text-decoration:none" href="updateRepairments.php">Update Repairments</a></button> <br/>


  <?php
  if($arrCount!=0){

    for($a = 0; $a < count($repairArr); $a++) {
      echo "<br>";
      ?>
      <div style="border:solid black 1px; width: 120px;">
      <a><?php echo $repairArr[$a];?> </a> <br/>
    </div>
    <?php
    }
  }
    ?>


  <?php }
  else{
    echo "Please Login";
  } ?>
</html>
