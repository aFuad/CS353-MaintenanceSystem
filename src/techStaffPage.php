<?php
  include 'config.php';

  $queryFinishedReps= "SELECT repairment_id FROM repairments WHERE status='wts'";
  $result1 = mysqli_query($conn, $queryFinishedReps);
  $repairArr;
  $arrCount=0;
  $symbol = "'";
  while($row = $result1->fetch_assoc()){
     $repairArr[$arrCount]=$row['repairment_id'];
     $arrCount++;
  }
  session_start();
  $tckNo= $_SESSION['tckNo'];
  if($arrCount!=0){
    for($l =0; $l <count($repairArr); $l++) {
      if(isset($_POST[$repairArr[$l]])) {
        $updateQuery= "UPDATE repairments SET status='inr' WHERE repairment_id=".$repairArr[$l];
        echo $updateQuery;
        mysqli_query($conn, $updateQuery);


        $insertQuery= "INSERT INTO fixes(tckNo, repairment_id)"." VALUES(".$symbol.$tckNo.$symbol.", ".$repairArr[$l].")";
        echo $insertQuery;
        mysqli_query($conn, $insertQuery);
        header("location: TechStaffPage.php");
      }
    }
  }


?>

<html>
  <?php if($_SESSION['signedIn']==1){ ?>
  <head>
    <title>Tech Staff Page</title>
    <style type = "text/css">
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
    </style>

  </head>
  <div class="header">
     <h1 class="vest"><a id="vestel" href="https://www.vestel.com.tr/">Vestel</a></h1>
  </div>

  <div>
  <a> Choose repairment by clicking button(product ids) </a>
  <form method = "post">
    <?php
    if($arrCount!=0){
      for($a = 0; $a < count($repairArr); $a++) {?>
        <input type="submit" name=<?php echo $repairArr[$a]; ?> class="button" value=<?php echo $repairArr[$a]; ?>></button>
      <?php
      }
    }
      ?>

  </form>
<button class="afterlogin"><a href="updateRepairments.php">Update Repairment Status</a></button>
<br/>
<br/>
<button class="afterlogin"><a href="awaitingRepairments.php">Awaiting Repairments</a></button>
<br/>
<br/>
<button class="afterlogin"><a href="logoutPage.php">Log Out</a></button>
</div>
<?php }
else{
  echo "Please Login";
} ?>
</html>
