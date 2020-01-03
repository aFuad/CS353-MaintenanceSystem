<?php
  include 'config.php';
  session_start();
  $tckNo = $_SESSION['tckNo'];
  $symbol = "'";

  $repairment_id;
  $descr;

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $repairment_id=$_POST['repairment_id'];
    $descr=$_POST['descr'];

    $insertQuery = "INSERT INTO complaints(descr, status, repairment_id, customer_serv, add_time) VALUES "."(".$symbol.$descr.$symbol.", 'inp', ".$repairment_id.", ".$symbol.$tckNo.$symbol.", NOW())";

    mysqli_query($conn, $insertQuery);

  }



?>

<html>

<title> Add a complaint </title>
<?php if($_SESSION['signedIn']==1){ ?>
  <a> Add complaint </a>
  <form method = "post">
      <label>Repairment ID :</label><input type = "text" name = "repairment_id" class = "box" value="" required/><br /><br />
      <label>Description  :</label><input type = "text" name = "descr" class = "box" required/><br/><br />
      <input type = "submit" value = " Add Complaint "/><br />
  </form>
  <a href="customerServ.php">Main Page</a>
<?php }
else{
  echo "Please Login";
} ?>
</html>
