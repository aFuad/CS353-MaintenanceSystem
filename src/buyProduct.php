<?php
  include 'config.php';
  session_start();
  $tckNo = $_SESSION['tckNo'];
  $symbol = "'";
  $product_id;

  if($_SERVER["REQUEST_METHOD"] == "POST"){


    $product_id=$_POST['product_id'];
    $insertQuery = "INSERT INTO buys(product_id, customer_id) VALUES "."(".$product_id.", ".$symbol.$tckNo.$symbol.")";
    $insertResult = mysqli_query($conn, $insertQuery);
  }







?>



<html>
  <title>Enter bought product</title>
  <?php if($_SESSION['signedIn']==1){ ?>
  <form action = "" method = "post">
    <label>Product id  :</label><input type = "text" name = "product_id" class = "box" value="" required/><br /><br />
    <input type = "submit" value = " Submit "/><br />
  </form>

  <a href="customerPage.php">Main Page</a>
<?php }
else{
  echo "Please Login";
} ?>

</html>
