<?php

  $dtbsservername = "dijkstra.ug.bcc.bilkent.edu.tr";
  $dtbsusername = "fuad.ahmedov";
  $dtbspassword = "vYtr9YVq";

  // Create connection
  $conn = new mysqli($dtbsservername, $dtbsusername, $dtbspassword);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  //echo "Connected successfully";

  $sql = "use fuad_ahmedov";
  mysqli_query($conn, $sql);

?>
