<?php
  include 'config.php';
  session_start();
  $tckNo = $_SESSION['tckNo'];
  $symbol = "'";
  $repairArr;
  $arrCount=0;
  $startPrice;
  $endPrice;
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $startPrice = $_POST['startprice'];
    $endPrice = $_POST['endprice'];


    $query2 =  "SELECT product_id, features FROM product WHERE price BETWEEN ".$startPrice." AND ".$endPrice;
    $result2 = mysqli_query($conn, $query2);



    while($row = $result2->fetch_assoc()){
       $repairArr[$arrCount]="Product Id: ".$row['product_id']."<br>Features: ".$row['features']."<br>";
       $arrCount++;
    }

  }
?>



<html>
<title> Repairment Search by Price </title>
<?php if($_SESSION['signedIn']==1){ ?>
  <form action = "" method = "post" >
    Starting Price:
    <input type="input" name="startprice" required><br />
    Ending Price:
    <input type="input" name="endprice" required><br />
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
