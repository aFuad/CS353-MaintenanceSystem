<?php
  include 'config.php';


  $queryWaitingDisReps= "SELECT repairment_id FROM repairments WHERE status='wdi'";
  $result1 = mysqli_query($conn, $queryWaitingDisReps);
  $dismantlingArr;
  $arrCount=0;
  $symbol = "'";
  while($row = $result1->fetch_assoc()){
     $dismantlingArr[$arrCount]=$row['repairment_id'];
     $arrCount++;
  }
  session_start();
  $tckNo= $_SESSION['tckNo'];

  if($arrCount!=0){
    for($l =0; $l <count($dismantlingArr); $l++) {

      if(isset($_POST[$dismantlingArr[$l]])) {
        $updateQuery= "UPDATE repairments SET status='di' WHERE repairment_id=".$dismantlingArr[$l];
        echo $updateQuery;
        mysqli_query($conn, $updateQuery);


        $insertQuery= "INSERT INTO assign_dismantle(repairment_id, tckNo)"." VALUES(".$symbol.$tckNo.$symbol.", ".$dismantlingArr[$l].")";
        echo $insertQuery;
        mysqli_query($conn, $insertQuery);
        header("location: DismantlingPage.php");
      }
    }
  }








?>







<html>
  <title>Dismantling Staff</title>
  <a> Select product to dimanstle(if there is any) </a>
  <?php if($_SESSION['signedIn']==1){ ?>
  <form method = "post">
    <?php
    if($arrCount!=0){
      for($a = 0; $a < count($dismantlingArr); $a++) {?>
        <input type="submit" name=<?php echo $dismantlingArr[$a]; ?> class="button" value=<?php echo $dismantlingArr[$a]; ?>></button>
      <?php
      }
    }
      ?>

  </form>
  <button class="addProductDismantled"><a href="addProductD.php">Add Product</a></button>
  </div>
  </html>
  <button class="afterlogin"><a href="logoutPage.php">Log Out</a></button>
  </div>
  </html>




  <?php }
  else{
    echo "Please Login";
  } ?>

</html>
