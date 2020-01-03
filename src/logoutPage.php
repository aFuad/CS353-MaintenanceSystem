<?php
  include 'config.php';
  session_start();
  $_SESSION['signedIn']=0;
  echo "Logging out";
  header("location: LoginPage.php");


?>
