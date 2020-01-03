<?php
  include 'config.php';
  session_start();


?>

<html>
<head>
  <title>Customer Page</title>
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
<div class="header">
   <h1  class="vest"><a id="vestel" href="https://www.vestel.com.tr/">Vestel</a></h1>
</div>

  <button><a style="text-decoration: none;" href="addRepairment.php">Add Repairment </a></button>
  <br/>
  <br/>
  <button><a style="text-decoration: none;" href="displayRepairments.php">Display Repairment </a></button>
  <br/>
  <br/>
  <button><a style="text-decoration: none;" href="buyProduct.php">Enter the product you bought </a> </button>
  <br/>
  <br/>
  <button><a style="text-decoration: none;" href="logoutPage.php">Log Out </a> </button>

  <?php }
  else{
    echo "Please Login";
  } ?>
  
</html>
