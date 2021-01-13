 <?php 
 session_start();
 $user_id = $_SESSION['users_id'];
 ?>
<!doctype html>
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
     <link href="products.css" rel="stylesheet">
  </head>
  <body>
    
  <header>
    <div class="collapse bg-dark" id="navbarHeader">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 col-md-7 py-4">
            <h4 class="text-white">Welcome!</h4>
            <ul>
                <li><a style="color:  #FFFFFF"> <?php echo $_SESSION['user_signin_name']." ".$_SESSION['user_signin_surname']; ?> </a></li>

            </ul>
          </div>
          <div class="col-sm-4 offset-md-1 py-4">
            <h4 style="color:#FFFFFF">Account</h4>
            <ul id="usersettings">
            <li><a href="edit_user_info.php" style="color: 	#FFFFFF">Edit User Information </a></li>
              <li><a href="history.php" style="color: 	#FFFFFF">Order History</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
      <div class="container">
        <a href="home.php" class="navbar-brand d-flex align-items-center">
          <strong>Home</strong>
        </a>
        <a href="products.php" id="mymy" class="navbar-brand d-flex align-items-center">
          <strong>Products</strong>
        </a>
        <a href="about.php" class="navbar-brand d-flex align-items-center">
          <strong>About</strong>
        </a>
        <a action="search.php" class="md-form mt-0" id="searchtime">
        <form action="search.php" method="POST">
            <input type="search" id="mysearch" name="mysearch" placeholder="Search" aria-label="Search">
          </form>
        </a>
        <a href="#" class="navbar-brand d-flex align-items-center">
        </a>

        <div class="dropdown">
          <img class="mb-4" src="https://drive.google.com/uc?export=view&id=1MbY3FN3HvBnFjl3HQROjgaXkBq5nhq_V" id="cart" lt="" width="72" height="57">

          <div class="dropdown-content" id="mydropdown">

            <div id="cartheader">
              <a id="total"> Total:</a>
              <button id="proceed" float:right> Proceed to Checkout</button>
            </div>

            <?php
            $db = mysqli_connect('localhost', 'root', '', 'step4');
            if ($db->connect_errno > 0) {
              die('Baglanamadim [' . $db->connect_error . ']');
            }

            $result = mysqli_query($db, "SELECT * FROM product");

            while ($row = mysqli_fetch_assoc($result)) {
              $product_name = $row['product_name'];
              $description = $row['product_description'];
              $price = $row['price'];
              $brand = $row['brand'];
              $product_id = $row['product_id'];
              echo "<li class='list-group-item'>";
              echo "<!-- Custom content-->";
              echo "<div class='media align-items-lg-center flex-column flex-lg-row p-3'>";
              echo   "<div class='media-body order-2 order-sm-1'>";
              echo      "</div><img src='https://drive.google.com/uc?export=view&id=1MbY3FN3HvBnFjl3HQROjgaXkBq5nhq_V' alt='Generic placeholder image' width='100' class='ml-lg-5 order-1 order-lg-2'>";
              echo      "<h5 class='mt-0 font-weight-bold mb-2'>$product_name</h5>";
              echo       "<p class='font-italic text-muted mb-0 small'>$description</p>";
              echo "<div class='mt-0 font-weight-bold mb-2'>
                <h6 class='font-weight-bold my-2'>$price $</h6>
                
                
                  </div><form action='deleteFromCard.php' method='POST'>
                
                
                 
                  <input style='width: 50px' value = 1 class='form-control my-2' name='countt' type='text' placeholder='countt' aria-label='Amount'>     
                  <button type='submit' class='btn btn-sm btn-outline-secondary'>Add</button> 
                  </form>
                  <form action='deleteFromCard.php' method='POST'>
                  <button type='submit' class='btn btn-sm btn-outline-secondary'name='product_id' value=$product_id>Delete</button>  
                  </form>";
            }
            ?>
          </div>
        </div>
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
    </div>
  </header>
<main>

    
  <div class="album  bg-light text-center">
  <h3 class="text-cente py-5 bg-light "> Your Order History</h3>
  <?php
            $db = mysqli_connect('localhost', 'root', '', 'step4');
            if ($db->connect_errno > 0) {
              die('Baglanamadim [' . $db->connect_error . ']');
            }

            $result = mysqli_query($db, "SELECT * FROM place_order P WHERE P.user_id = '$user_id' ORDER BY P.order_date DESC");

            
            while ($row = mysqli_fetch_assoc($result)) {
              $order_id = $row['order_id'];
              $order_date = $row['order_date'];
              $order_status = $row['order_status'];

              echo "<li class='list-group-item text-center'>";
              echo "<div' class='media align-items-lg-center flex-column flex-lg-row p-3'>";
              echo      "<p class='font-italic text-muted mb-0 small'>Order ID: $order_id</p>";
              echo       "<p class='font-italic text-muted mb-0 small'>Order Date: $order_date</p>";
              echo       "<p class='font-italic text-muted mb-0 small'>Order Status: $order_status</p>";
             echo "<form action='invoice.php' method='POST'>
             <input type='hidden' name='orderid' value='$order_id'>
               <button class='w-10 btn btn-sm btn-primary' type='submit sign up'>View Invoice</button>
         </form> ";

              $statement ="SELECT P.product_name AS product_name, OBP.total_price AS total_price, OBP.counttt AS counttt FROM orderedbasketproducts OBP, product P 
              WHERE  OBP.order_id  = '$order_id' AND OBP.product_id = P.product_id";

              $newresult = mysqli_query($db,$statement);

              while ($myrow = mysqli_fetch_assoc($newresult)) {
                  $product_name = $myrow['product_name'];
                  $total_price = $myrow['total_price'];
                  $count = $myrow['counttt'];

                echo   "<div class='media-body order-2 order-sm-1'>";
                echo      "</div><img src='https://drive.google.com/uc?export=view&id=1MbY3FN3HvBnFjl3HQROjgaXkBq5nhq_V' alt='Generic placeholder image' width='100' class='ml-lg-5 order-1 order-lg-2'>";
                echo      "<h5 class='mt-0 font-weight-bold mb-2'>$product_name</h5>";
                echo       "<p class='font-italic text-muted mb-0 small'>$total_price$</p>";
                echo       "<p class='font-italic text-muted mb-0 small'>Amount: $count</p>";
                

              }  
               echo   "</div>";
            }
            ?>
  </div>
</main>

<footer class="text-muted py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
    <p class="mb-1"> All rights reserved to  &copy;BuyZone Group </p>
    <p class="mb-0">2020-2021 </p>
  </div>
</footer>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
