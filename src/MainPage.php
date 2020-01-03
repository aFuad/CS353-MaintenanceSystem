<?php
  include 'config.php';
  echo "Main Page<br>";

  session_start();
  $tckNo = $_SESSION['tckNo'];
  if($_SESSION['signedIn']==1){


    if($_SESSION['customer']==1){//different page for each type of user
      header("location: customerPage.php");


    }
    else{
      $query1 =  "SELECT full_name FROM user WHERE tckNo=".$tckNo;
      $result1 = mysqli_query($conn, $query1);
      $row = $result1->fetch_assoc();
      echo "Welcome dear employee ".$row['full_name']."<br>";
      $query2="SELECT tckNo FROM customer_serv WHERE tckNo=".$tckNo;
      $result2 = mysqli_query($conn, $query2);
      $row1 = $result2->fetch_assoc();

      $query3="SELECT tckNo FROM delivery_staff WHERE tckNo=".$tckNo;
      $result3= mysqli_query($conn, $query3);
      $row2 = $result3->fetch_assoc();

      $query4="SELECT tckNo FROM dismantling_staff WHERE tckNo=".$tckNo;
      $result4= mysqli_query($conn, $query4);
      $row3 = $result4->fetch_assoc();

      /*$query5="SELECT tckNo FROM tech_staff WHERE tckNo=".$tckNo;
      $result5= mysqli_query($conn, $query5);
      $row4 = $result5->fetch_assoc();*/

      echo count($row2['tckNo']);
      if(count($row1['tckNo'])==1){
        echo "Customer Service";//different page for each type of personel
        $_SESSION['employeeType']=1;
        header("location: customerServ.php");
      }
      else if(count($row2['tckNo'])==1){
        echo "Delivery staff";
        $_SESSION['employeeType']=2;
        header("location: DeliveryPage.php");
      }
      else if(count($row3['tckNo'])==1){
        echo "Dismantling Staff";
        $_SESSION['employeeType']=3;
        header("location: DismantlingPage.php");
      }
      else{
        echo "Tech staff";
        $_SESSION['employeeType']=4;
        header("location: TechStaffPage.php");
      }

    }

  }
  else{
    echo "Go main page and log in plz";
  }

?>

<html>
  <?php
    if ( $_SESSION['customer']== 1) { ?>
      <a href="repairments.php">Repairments</a>
      <a href="complaints.php">Complaints</a>
      <a href="changeuserinfo.php">Edit Personal Information</a>
    <?php } ?>




</html>
