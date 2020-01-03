<?php

  include 'config.php';
  $symbol = "'";
  $tckNo;
  $password;
  $full_name;
  $address;
  $phone_number;
  $salary=200;
  $symbol = "'";
  $role=0;
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    session_start();
    $tckNo = $_POST['tckNo'];
    $full_name = $_POST['full_name'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];
    $password = $_POST['password'];
    $role= $_POST['role'];



    $queryMain =  "SELECT tckNo FROM user WHERE tckNo=".$tckNo;
    $result = mysqli_query($conn, $queryMain);
    $row = $result->fetch_assoc();

    if(count($row['tckNo'])==1){
      echo "This Profile EXISTS";
    }
    else {
      if($role==1){//customer
        $insertQuery = "INSERT INTO user(tckNo, full_name, address, password) VALUES "."(".$tckNo.", ".$symbol.$full_name.$symbol.", ".$symbol.$address.$symbol.", ".$symbol.$password.$symbol.")";

         mysqli_query($conn, $insertQuery);
         $insertQueryCustomer=  "INSERT INTO customer(tckNo, priority) VALUES"."( ".$symbol.$tckNo.$symbol.", 0)";

         mysqli_query($conn, $insertQueryCustomer);
         $_SESSION['succesReg']=1;
         header("location: LoginPage.php");

      }
      else if($role==2){//tech_staff
        $insertQuery = "INSERT INTO user(tckNo, full_name, address, password) VALUES "."(".$tckNo.", ".$symbol.$full_name.$symbol.", ".$symbol.$address.$symbol.", ".$symbol.$password.$symbol.")";

         mysqli_query($conn, $insertQuery);
         $insertQueryEmployee=  "INSERT INTO employee(tckNo, salary) VALUES"."( ".$tckNo.", ".$salary.")";

         mysqli_query($conn, $insertQueryEmployee);
         $insertQuerytechs=  "INSERT INTO tech_staff(tckNo) VALUES"."( ".$tckNo.")";

         mysqli_query($conn, $insertQuerytechs);
         $_SESSION['succesReg']=1;
         header("location: LoginPage.php");
      }
      else if($role==3){//delivery_staff
         $insertQuery = "INSERT INTO user(tckNo, full_name, address, password) VALUES "."(".$tckNo.", ".$symbol.$full_name.$symbol.", ".$symbol.$address.$symbol.", ".$symbol.$password.$symbol.")";

         mysqli_query($conn, $insertQuery);
         $insertQueryEmployee=  "INSERT INTO employee(tckNo, salary) VALUES"."( ".$tckNo.", ".$salary.")";

         mysqli_query($conn, $insertQueryEmployee);
         $insertQueryDeliver=  "INSERT INTO delivery_staff(tckNo) VALUES"."( ".$tckNo.")";

         mysqli_query($conn, $insertQueryDeliver);
         $_SESSION['succesReg']=1;
         header("location: LoginPage.php");
      }
      else if($role==4){//customer_serv
         $insertQuery = "INSERT INTO user(tckNo, full_name, address, password) VALUES "."(".$tckNo.", ".$symbol.$full_name.$symbol.", ".$symbol.$address.$symbol.", ".$symbol.$password.$symbol.")";

         mysqli_query($conn, $insertQuery);
         $insertQueryEmployee=  "INSERT INTO employee(tckNo, salary) VALUES"."( ".$tckNo.", ".$salary.")";

         mysqli_query($conn, $insertQueryEmployee);
         $insertQueryCserv=  "INSERT INTO customer_serv(tckNo) VALUES"."( ".$tckNo.")";

         mysqli_query($conn, $insertQueryCserv);
         $_SESSION['succesReg']=1;
         header("location: LoginPage.php");
      }
      else if($role==5){//dismantling_staff
         $insertQuery = "INSERT INTO user(tckNo, full_name, address, password) VALUES "."(".$tckNo.", ".$symbol.$full_name.$symbol.", ".$symbol.$address.$symbol.", ".$symbol.$password.$symbol.")";

         mysqli_query($conn, $insertQuery);
         $insertQueryEmployee=  "INSERT INTO employee(tckNo, salary) VALUES"."( ".$tckNo.", ".$salary.")";

         mysqli_query($conn, $insertQueryEmployee);
         $insertQueryDstaff=  "INSERT INTO dismantling_staff(tckNo) VALUES"."( ".$tckNo.")";

         mysqli_query($conn, $insertQueryDstaff);
         $_SESSION['succesReg']=1;
         header("location: LoginPage.php");
      }


    }


    //echo $queryMain;

  }








?>


<html>
   <head>
      <title>Sign Up Page</title>
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
   </head>
   <body bgcolor = "#FFFFFF">

      <div align = "center">
         <div style = "width:300px; border: solid 1px #2557AB; " align = "left">
            <div style = "background-color:#2557AB; color:#FFFFFF; padding:3px;"><b>Sign Up</b></div>
            <div style = "margin:30px">
               <form action = "" method = "post">
                  <label>Tck Number  :</label><input type = "text" name = "tckNo" class = "box" value="" required/><br /><br />
                  <label>Full Name  :</label><input type = "text" name = "full_name" class = "box" value="" required/><br /><br />
                  <label>Your Address :</label><input type = "text" name = "address" class = "box" value="" required/><br /><br />
                  <label>Phone Number  :</label><input type = "text" name = "phone_number" class = "box" value="" required/><br /><br />
                  <label >User Role  :</label> <br/> <br/>
                  <input type="radio" name="role" value="1" required>  Customer <br>
                  <input type="radio" name="role" value="2"> Tech Staff<br>
                  <input type="radio" name="role" value="3"> Delivery Staff <br>
                  <input type="radio" name="role" value="4"> Customer Service<br>
                  <input type="radio" name="role" value="5"> Dismantling Staff<br>
                  <br/>
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />

                  <input type = "submit" value = " Sign up "/><br />
               </form>
               <div style = "font-size:11px; color:#cc0000; margin-top:10px">
            </div>
         </div>
      </div>
   </body>
