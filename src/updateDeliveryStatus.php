<?php
  include 'config.php';
  $symbol = "'";
  $repairment_id;
  $status;
  session_start();
  if($_SERVER["REQUEST_METHOD"] == "POST"){

    $repairment_id = $_POST['repairment_id'];
    $status = $_POST['status'];



    $updateQuery= "UPDATE repair_deliv SET delivery_status=".$symbol.$status.$symbol.", delivered_time=NOW() WHERE repairment_id=".$repairment_id;
    mysqli_query($conn, $updateQuery);




  }

?>


<html>

<head>
  <title>Delviery Status Page</title>
  <?php if($_SESSION['signedIn']==1){ ?>
  <style>
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
 a{
   text-decoration: none;
 }
  </style>
</head>
<div class="header">
   <h1 class="vest"><a id="vestel" href="https://www.vestel.com.tr/">Vestel</a></h1>
</div>
  <a> Update Delivery Status </a>
  <form action = "" method = "post">
     <label>Repairment ID* :</label><br/><input type = "text" name = "repairment_id" class = "box" value="" required/><br /><br />
     <label>Status  :</label><br/><input type = "text" name = "status" class = "box" required /><br/><br />
     <input type = "submit" value = " Submit "/><br />
  </form>
<a href="DeliveryPage.php">Main Page</a>
<?php }
else{
  echo "Please Login";
} ?>
</html>
