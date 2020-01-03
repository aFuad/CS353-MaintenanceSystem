<?php
  include 'config.php';
  $symbol = "'";
  $repairment_id;
  $status;
  $descr;
  $report;
  session_start();
  if($_SERVER["REQUEST_METHOD"] == "POST"){

    $repairment_id = $_POST['repairment_id'];
    $status = $_POST['status'];
    $descr = $_POST['descr'];
    $report = $_POST['report'];

    $updateQuery= "UPDATE repairments SET status=".$symbol.$status.$symbol.", descr=".$symbol.$descr.$symbol.", report=".$symbol.$report.$symbol.", repairment_end_date=NOW() WHERE repairment_id=".$repairment_id;

    mysqli_query($conn, $updateQuery);

  }

?>



<html>
  <title>Update Repairments</title>
  <?php if($_SESSION['signedIn']==1){ ?>
  <form method = "post">
        <label>Repairment ID :</label>
        <br/>
        <input type = "text" name = "repairment_id" class = "box" value="" required/><br /><br />
        <label>Status :</label>
        <br/>
        <input type = "text" name = "status" class = "box" value="" required/><br /><br />
        <label>Description :</label>
        <br/>
        <input type = "text" name = "descr" class = "box" value="" required/><br /><br />
        <label>Report :</label>
        <br/>
        <input type = "text" name = "report" class = "box" value="" required/><br /><br />
        <input type = "submit" value = " Update Repairment "/><br />
  </form>
  <a href="TechStaffPage.php">Main Page</a>
<?php }
else{
  echo "Please Login";
} ?>
</html>
