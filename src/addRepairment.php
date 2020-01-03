<?php
  include 'config.php';

  session_start();
  $tckNo = $_SESSION['tckNo'];

  $query1 =  "SELECT full_name FROM user WHERE tckNo=".$tckNo;
  $result1 = mysqli_query($conn, $query1);
  $row = $result1->fetch_assoc();

  $query2 =  "SELECT product_id, p_name FROM customer NATURAL JOIN buys NATURAL JOIN product WHERE tckNo=".$tckNo;
  $result2 = mysqli_query($conn, $query2);

  $pidArr;
  $pnameArr;
  $arrCount=0;
  $symbol = "'";
  while($row = $result2->fetch_assoc()){
     $pidArr[$arrCount]=$row['product_id'];
     $pnameArr[$arrCount]=$row['p_name'];
     $arrCount++;
  }
  $product_id;
  $product_problem;
  $customer_request;

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $product_id=$_POST['product_id'];
    $product_problem=$_POST['product_problem'];
    $customer_request=$_POST['customer_request'];
    $insertQuery = "INSERT INTO repairments(status, repairment_start_date, product_problem, customer_request, product_id, customer) VALUES "."('wts', NOW(), ".$symbol.$product_problem.$symbol.", ".$symbol.$customer_request.$symbol.", ".$product_id.", ".$symbol.$tckNo.$symbol.")";

    mysqli_query($conn, $insertQuery);
  }



?>

<html>

<head>
  <title>Add Repairment Page</title>
<?php if($_SESSION['signedIn']==1){ ?>
<style type="text/css">

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
#vestel{
  text-decoration: none;
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
<?php
  echo "Welcome dear customer ".$row['full_name']."<br>";
 ?>
  <a> Choose product id you want to request a repairment <br /></a> <br/>
    <?php
    if($arrCount!=0){
      for($a = 0; $a < count($pnameArr); $a++) {
        ?>
        <div style="border:solid black 1px; width:260px;">
        <a><?php echo "Product ID =".$pidArr[$a]." Product Name =".$pnameArr[$a]."<br>";    ?>
        </div>
        <br/>
      <?php
      }
    }
    ?>
  </form>

  <form method = "post">
        <label>Product ID :</label><input type = "text" name = "product_id" class = "box" value="" required/><br /><br />
        <label>Product Problem  :</label><input type = "text" name = "product_problem" class = "box" required/><br/><br />
        <label>Customer Request  :</label><input type = "text" name = "customer_request" class = "box" required/><br/><br />
        <input type = "submit" value = " Add Request "/><br />
  </form>

  <button><a style="text-decoration:none;" href="customerPage.php">Main Page</a></button>
</body>
<?php }
else{
  echo "Please Login";
} ?>
</html>
