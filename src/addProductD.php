<?php
  include 'config.php';

  $product_id;
  $p_name;
  $features;
  $guarantee_paper;
  $certificate;
  $symbol = "'";
  session_start();
  if($_SERVER["REQUEST_METHOD"] == "POST"){


    $product_id = $_POST['product_id'];
    $p_name = $_POST['p_name'];
    $features = $_POST['features'];
    $guarantee_paper = $_POST['guarantee_paper'];
    $certificate = $_POST['certificate'];

    echo $product_id."<br>";
    echo $p_name."<br>";
    echo $features."<br>";
    echo $guarantee_paper."<br>";
    echo $certificate."<br>";

    $pidQuery=  "SELECT product_id, count FROM product WHERE product_id=".$product_id;
    echo $pidQuery."<br>";

    $result1 = mysqli_query($conn, $pidQuery);
    $row1 = $result1->fetch_assoc();

    if(count($row1['product_id'])==1){
      $newCount = $row1['count']+1;
      $updateQuery= "UPDATE product SET count=".$newCount." WHERE product_id=".$row1['product_id'];
      echo $updateQuery;
      mysqli_query($conn, $updateQuery);
    }
    else{
       $insertQuery = "INSERT INTO product(p_name, features, recycled, count)"." VALUES(".$symbol.$p_name.$symbol.", ".$symbol.$features.$symbol.", 1, 1)";
       echo $insertQuery;
       mysqli_query($conn, $insertQuery);

    }

  }


?>

<html>

<head>
  <title>Add Product D </title>
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
 #vestel{
   text-decoration: none;
 }
 #addProd
{
background-image: url("./images/sc.png");
width:400px;
height:400px;
float: right;
}
  </style>
</head>
<body>
  <div class="header">
     <h1 class="vest"><a id="vestel" href="https://www.vestel.com.tr/">Vestel</a></h1>
  </div>
  <div style="text-align:center; width:1000px;">
    <div id ="addProd">
    </div>
<div style="float: right; border: solid blue 1px; width:300px">
      <a> Add Product </a>
      <form action = "" method = "post">
         <label>Product ID(if product exists)* :</label> <br/><input type = "text" name = "product_id" class = "box" value=""/><br /><br />
         <label>Product Name*  :</label><br/><input type = "text" name = "p_name" class = "box" /><br/><br />
         <label>Features*  :</label><br/><input type = "text" name = "features" class = "box" /><br/><br />
         <label>Guarantee Paper  :</label><br/><input type = "text" name = "guarantee_paper" class = "box" /><br/><br />
         <label>Certificate  :</label><br/><input type = "text" name = "certificate" class = "box" /><br/><br />
         <input type = "submit" value = " Submit "/><br />
      </form>
      <a> Rows with * should be filled </a>

</div>

</div>
</body>
<?php }
else{
  echo "Please Login";
} ?>
</html>
