<?php
  include 'config.php';

  $tckNo;
  $password;
  $symbol = "'";
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    session_start();




    $tckNo = $_POST['tckNo'];
    $password = $_POST['password'];
    $_SESSION['tckNo']=$tckNo;

    $query3 =  "SELECT tckNo FROM user WHERE tckNo=".$symbol.$tckNo.$symbol." AND password=".$symbol.$password.$symbol;


    $result2 = mysqli_query($conn, $query3);




    if (mysqli_query($conn, $query3)) {
      //echo "++++.<br>";
    } else {
      echo "Error creating database: ".mysqli_error($conn);
    }

    $row = $result2->fetch_assoc();

    if($row['tckNo']==$tckNo){
      $query4="SELECT tckNo FROM customer WHERE tckNo=".$tckNo;
      $result4 = mysqli_query($conn, $query4);
      $crow = $result4->fetch_assoc();

      if(count($crow['tckNo'])==1){
        $_SESSION['customer'] = 1;
      }
      else{
        $_SESSION['customer'] = 0;
      }
      echo $_SESSION['customer']."<br>";
      $_SESSION['signedIn']=1;
      header("location: MainPage.php");
    }
    else{
      echo "No such tckNo or password<br>";
    }


  }

  $conn->close();
  //echo "Connection closed.<br>";


?>
<html>
   <head>
      <title>Login Page</title>
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
        #wom{
          margin-top: -50px;
          border-radius: 7px;

          float:right;
          }
      .log{
        background-color: white;
        border-radius: 5px;
      }
      #sign{
        font-size: 15px;
      }
      #sign:link {
        color: black;

      }

     /* visited link */
       #sign:visited {
         color: black;
         }

     /* mouse over link */
     #sign:hover {
       color: black;
     }

     /* selected link */
     #sign:active {
       color: black;
     }
     #logindiv{
       background-image: url("./images/tech.jpg");
       height: 100%;
       background-size: cover;

     }
      </style>
   </head>
   <body bgcolor = "#FFFFFF">
     <div class="header">
        <h1 class="vest"><a id="vestel" href="https://www.vestel.com.tr/">Vestel</a></h1>
        <button id="wom"><a href="workerOfTheMonth.php">Employee of the Month</a></button>
     </div>
      <div id="logindiv" align = "center">
         <div style = "background-color: white; width:300px; border: solid 1px #2557AB; " align = "left">
            <div style = "background-color:#2557AB; color:#FFFFFF; padding:3px;"><b>Login</b></div>
            <div style = "margin:30px">
               <form action = "" method = "post">
                  <label >TCK NO  :</label><br/><br/><input type = "text" name = "tckNo" class = "box" value="" required/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" required/><br/><br />
                  <input class="log" type = "submit" value = " Submit "/><br />
               </form>
               <div style = "font-size:11px; color:#cc0000; margin-top:10px">
            </div>
         </div>
      </div>
      <button class="log"><a id="sign" href="signup.php">Sign Up</a></button>

    </body>
