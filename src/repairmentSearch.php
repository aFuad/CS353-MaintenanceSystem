<?php
  include 'config.php';
  session_start();
  $tckNo = $_SESSION['tckNo'];
  $symbol = "'";
  $repairArr;
  $arrCount=0;
  $startDate;
  $endDate;
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $startDate = $_POST['startday'];
    $endDate = $_POST['endday'];

    $query2 =  "SELECT repairment_id, status, product_id, repairment_end_date FROM repairments WHERE repairment_start_date BETWEEN ".$symbol.$startDate.$symbol." AND ".$symbol.$endDate.$symbol;
    $result2 = mysqli_query($conn, $query2);



    while($row = $result2->fetch_assoc()){
       $repairArr[$arrCount]="Repairment Id: ".$row['repairment_id']."<br>Status: ".$row['status']."<br>Product Id: ".$row['product_id']."<br>";
       $arrCount++;
    }

  }
?>



<html>
<title> Repairment Search by Date </title>
<?php if($_SESSION['signedIn']==1){ ?>
  <form action = "" method = "post" >
    Starting Date:
    <input type="date" name="startday" required><br />
    Ending Date:
    <input type="date" name="endday" required><br />
    <input class="log" type = "submit" value = " Submit "/><br />
  </form>


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
    <button><a href="customerServ.php">Main Page</a> <br/></button>
    <br><br/>
  <?php }
  else{
    echo "Please Login";
  } ?>
</html>
