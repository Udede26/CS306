<?php session_start();  ?>
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

           <?php

            $user_id = $_SESSION['users_id'];

            $db = mysqli_connect('localhost', 'root', '', 'step4');
            if ($db->connect_errno > 0) {
              die('Baglanamadim [' . $db->connect_error . ']');
            }

            $result = mysqli_query($db, "SELECT* FROM BasketProducts BP, Product P, Basket B WHERE BP.user_id=$user_id AND P.product_id=BP.product_id AND B.user_id=BP.user_id");

          if(mysqli_num_rows($result)>0)
          {
            while ($row = mysqli_fetch_assoc($result)) {
              $product_name = $row['product_name'];
              $description = $row['product_description'];
              $price = $row['price'];
              $brand = $row['brand'];
              $count_sag_ust = $row['countt'];
              $total_sag_ust =$row['total_cost'];
              
              echo"<div id='cartheader'>";
              echo"<a id='total'> Total: $$total_sag_ust </a>";
              echo"<a href='checkout.php'><button id='proceed' float:right> Proceed to Checkout</button></a>";
             echo"</div>";

              echo "<li class='list-group-item'>";
              echo "<!-- Custom content-->";
              echo "<div class='media align-items-lg-center flex-column flex-lg-row p-3'>";
              echo   "<div class='media-body order-2 order-sm-1'>";
              echo      "</div><img src='https://drive.google.com/uc?export=view&id=1MbY3FN3HvBnFjl3HQROjgaXkBq5nhq_V' alt='Generic placeholder image' width='100' class='ml-lg-5 order-1 order-lg-2'>";
              echo      "<h5 class='mt-0 font-weight-bold mb-2'>$product_name</h5>";
              echo       "<p class='font-italic text-muted mb-0 small'>$description</p>";
              echo "<div class='mt-0 font-weight-bold mb-2'>
                <h6 class='font-weight-bold my-2'>$$price x $count_sag_ust </h6>
                
                
                  </div>";
            }
          }
          else
          {
             echo "There is no product in the cart";
             echo"<div id='cartheader'>";
              echo"<a id='total'> Total: $0 </a>";
              echo"<a href='checkout.php'><button id='proceed' float:right> Proceed to Checkout</button></a>";
             echo"</div>";

              echo "<li class='list-group-item'>";
              echo "<!-- Custom content-->";
              echo "<div class='media align-items-lg-center flex-column flex-lg-row p-3'>";
              echo   "<div class='media-body order-2 order-sm-1'>";
              
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

  <section class="py-5 text-center container" id="top">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Welcome to BuyZone! We are the best! We are the cheapest! Enjoy!</h1>
        <p class="lead text-muted">All sorts of goods...</p>

      </div>
    </div>
  </section>
  <h2 class="fw-light text-center"><strong>About us</strong></h2>

  <div class="album py-5 bg-light">
        <p class="text-center"> BuyZone, founded in 2020, is an e-commerce website designed exclusively for you where you can purchase all sorts of goods.</p>
        <p class="text-center"> Originating from a database systems course project, it evolved into a publicly traded unicorn company thanks to our customers trust and belief in us. </p>
        <p class="text-center"> Contrary to competition, BuyZone does not display any ads and also all your personal information is preserved and not shared with any 3rd parties. </p>
  </div>
        <h2 class="fw-light text-center"><strong>Founders</strong></h2>
  <div class="album py-5 bg-light">
        <p class="text-center strong">Berke ODACI</p>
        <p class="text-center strong">Dorukan ACAR   </p>
        <p class="text-center strong"> Elif Ecem SAMLIOGLU </p>
        <p class="text-center strong"> Ihsan Ufuk DEDE </p>
        <p class="text-center strong">Mert ILGINOGLU </p>
        
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
