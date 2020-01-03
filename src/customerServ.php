<?php
session_start();

?>
<html>
<title> Customer Service  </title>
<?php if($_SESSION['signedIn']==1){ ?>

<button><a style="text-decoration: none;" href="addProduct.php">Add Product</a> </button>
<br/>
<br/>

<button><a style="text-decoration: none;" href="addComplaint.php">Add Complaint</a> </button>
<br/>
<br/>
<button><a style="text-decoration: none;" href="repairmentSearch.php">Search Repairment by date</a> </button>
<br/>
<br/>
<button><a style="text-decoration: none;" href="searchByPrice.php">Search products by price </a> </button>
<br/>
<br/>
<button><a style="text-decoration: none;" href="problematicProduct.php">Problematic Product </a> </button>
<br/>
<br/>
<button><a style="text-decoration: none;" href="problematicCustomer.php">Problematic Customer </a> </button>
<br/>
<br/>
<button><a style="text-decoration: none;" href="logoutPage.php">Log Out </a> </button>
<br/>
<br/>
<?php }
else{
  echo "Please Login";
} ?>
</html>
