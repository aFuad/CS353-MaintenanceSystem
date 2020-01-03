<?php
  include 'config.php';
  session_start();
  $product_id;
  $p_name;
  $features;
  $guarantee_paper;
  $certificate;
  $symbol = "'";
  $price;
  if($_SERVER["REQUEST_METHOD"] == "POST"){


    $product_id = $_POST['product_id'];
    $p_name = $_POST['p_name'];
    $features = $_POST['features'];
    $guarantee_paper = $_POST['guarantee_paper'];
    $certificate = $_POST['certificate'];
    $price = $_POST['price'];

    $pidQuery=  "SELECT product_id, count FROM product WHERE product_id=".$product_id;


    $result1 = mysqli_query($conn, $pidQuery);
    $row1 = $result1->fetch_assoc();

    if(count($row1['product_id'])==1){
      $newCount = $row1['count']+1;
      $updateQuery= "UPDATE product SET count=".$newCount." WHERE product_id=".$row1['product_id'];
      mysqli_query($conn, $updateQuery);
    }
    else{
       $insertQuery = "INSERT INTO product(p_name, features, price, guarantee_paper, certificate, recycled, count)"." VALUES(".$symbol.$p_name.$symbol.", ".$symbol.$features.$symbol.", ".$price.", ".$symbol.$guarantee_paper.$symbol.", ".$symbol.$certificate.$symbol.",0, 1)";
       mysqli_query($conn, $insertQuery);
    }
  }


?>

<html>

  <head>
    <title>Add Product </title>
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

     /* selected link */
     #vestel:active {
       color: red;
     }
     #vestel{
       text-decoration: none;
     }
      </style>
  </head>
  <body>
    <div class="header">
       <h1 class="vest"><a id="vestel" href="https://www.vestel.com.tr/">Vestel</a></h1>
    </div>

  <a href="customerServ.php">Main Page<br/></a>
  <a> Add Product </a>
  <form action = "" method = "post">
     <label>Product ID :</label><input type = "text" name = "product_id" class = "box" value=""/><br /><br />
     <label>Product Name  :</label><input type = "text" name = "p_name" class = "box" /><br/><br />
     <label>Features  :</label><input type = "text" name = "features" class = "box" /><br/><br />
     <label>Price  :</label><input type = "text" name = "price" class = "box" /><br/><br />
     <label>Guarantee Paper  :</label><input type = "text" name = "guarantee_paper" class = "box" /><br/><br />
     <label>Certificate  :</label><input type = "text" name = "certificate" class = "box" /><br/><br />
     <input type = "submit" value = " Submit "/><br />
  </form>
  <a> Rows with * should be filled </a>
  <a> You can leave product id segment blank to add new product seperately </a>


  </body>
  <?php }
  else{
    echo "Please Login";
  } ?>
</html>
