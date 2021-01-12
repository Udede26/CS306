<?php 
include "config.php";

session_start();
$managerName = $_SESSION['managername'];
$managerSurname = $_SESSION['managersurname'];
$orderid = $_REQUEST['orderid'];

$sql = "SELECT * FROM invoice I WHERE I.order_id = $orderid";
$result = mysqli_query($db,$sql);

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>Album example · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">
    

    

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
     <!-- Custom styles for this template -->
  </head>
  <body>
    
<header>
  <div class="collapse bg-dark" id="navbarHeader">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 col-md-7 py-4">
            <h4 class="text-white">Welcome!</h4>
            <ul>
              <li><a style="color:  #FFFFFF"><?php echo $managerName ?> </a></li>
              <li><a style="color:  #FFFFFF"><?php echo $managerSurname ?></a></li>
            </ul>
          </div>
          <div class="col-sm-4 offset-md-1 py-4">
            <h4 style="color:#FFFFFF">Account</h4>
            <ul id="managerLogout">
              <li><a href="managerLogout.php" style="color:  #FFFFFF">Logout</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
      <div class="container">
        <a href="salesManager.php" class="navbar-brand d-flex align-items-center">
          <strong>Orders</strong>
        </a>
        <a>
        </a>
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
    </div>
</header>
<main>
  <div class = "container">
      <div class = "row">
        <div class = "col">&nbsp;</div>
      </div>

      <div class = "col-lg-12">
        <h2>Invoice of Order: <?php echo $orderid ?></h2>
        <h3 class="fw-light text-center">
          <?php
            while ($row = mysqli_fetch_assoc($result)) 
            {
              $invoice_id = $row['invoice_id'];
              $invoice_date = $row['invoice_date'];
              $invoice_address = $row['invoice_address'];
              $invoice_sum = $row['invoice_sum'];

              echo "   <p class='text-center'> Invoice ID: $invoice_id</p>
                <p class='text-center'> Order ID: $orderid</p>
                <p class='text-center'> Invoice Date: $invoice_date </p>
                <p class='text-center'> Invoice Address: $invoice_address </p>
                <p class='text-center'> Invoice Sum: $invoice_sum$ </p>";
          }
          ?>
        </h3>
        <h2>Products Inside Order:  <?php echo $orderid ?></h2>
        <h3 class="fw-light text-center">
          <?php 
            
            $sql2 = "SELECT P.product_name, P.price, B.countt
                    FROM basketproducts B, product P
                    WHERE P.product_id = B.product_id AND B.basket_id IN(SELECT B.basket_id
                                                                        FROM basketproducts B, place_order PO
                                                                        WHERE B.basket_id = PO.basket_id AND PO.order_id = $orderid)";
            $result = mysqli_query($db,$sql2);
            
            while ($row = mysqli_fetch_assoc($result)) 
            {
              $products = $row['product_name'];
              $productsPrice = $row['price'];
              $productsCount = $row['countt'];
              echo "<p class='text-center'> Product Name: $products</p>
              <p class='text-center'> Product Price: $productsPrice </p>
              <p class='text-center'> Product Count: $productsCount </p>";
            }
          ?>
        </h3>
      </div>
    </div>
</main>

<footer class="text-muted py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
    <p class="mb-1"> All rights reserved to  &copy;Ahmet ltd. AŞ. </p>
    <p class="mb-0">2020-2021 </p>
  </div>
</footer>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>


