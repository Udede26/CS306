<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>BuyZone</title>

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
              <li><a style="color: 	#FFFFFF">name </a></li>
              <li><a style="color: 	#FFFFFF">surname</a></li>
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
            

            $db = mysqli_connect('localhost', 'root', '', 'step4');
            if ($db->connect_errno > 0) {
              die('Baglanamadim [' . $db->connect_error . ']');
            }

            $statement2 ="SELECT  P.product_name AS product_name2, P.product_description AS product_description2, P.price AS price2 , BP.countt AS counttt2 ,P.brand AS brand2 FROM product P, basketproducts BP WHERE BP.user_id = 4 AND P.product_id = BP.product_id";

            $statement3 ="SELECT B.total_cost AS total FROM basket B WHERE B.user_id = 4 ";

            $result2 = mysqli_query($db, $statement2);

            $result3 = mysqli_query($db, $statement3);

            while ($row = mysqli_fetch_assoc($result3)) {
              $total = $row['total'];
              echo "<header id='cartheader'>
            <a id='total'> Total: $total </a>
           <a href='checkout.php'> <button id='proceed' float:right> Proceed to Checkout</button></a>
        </header>";
            }

          
            
            while ($row = mysqli_fetch_assoc($result2)) {
              $product_name2 = $row['product_name2'];
              $description2 = $row['product_description2'];
              $price2 = $row['price2'];
              $brand2 = $row['brand2'];
              $count2  = $row['counttt2'];
              $product_cost2 = $price2 * $count2;

              echo "<li class='list-group-item'>";
              echo "<!-- Custom content-->";
              echo "<div class='media align-items-lg-center flex-column flex-lg-row p-3'>";
              echo   "<div class='media-body order-2 order-sm-1'>";
              echo      "</div><img src='https://drive.google.com/uc?export=view&id=1MbY3FN3HvBnFjl3HQROjgaXkBq5nhq_V' alt='Generic placeholder image' width='100' class='ml-lg-5 order-1 order-lg-2'>";
              echo      "<h5 class='mt-0 font-weight-bold mb-2'>$product_name2</h5>";
              echo       "<p class='font-italic text-muted mb-0 small'>$description2</p>";
              echo "<div class='mt-0 font-weight-bold mb-2'>
              <h6 class='font-weight-bold my-2'>Amount: $count2 </h6>
                <h6 class='font-weight-bold my-2'>Total: $product_cost2 $</h6>
                
                
                  </div>";
              
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
        <h1 class="fw-light">Welcome to our store! We are the best! We are the cheapest! Enjoy!</h1>
        <p class="lead text-muted">All sorts of goods...</p>

      </div>
    </div>
  </section>
  <h2 class="fw-light text-center"><strong>BEST SELLERS</strong></h2>
  <div class="album py-5 bg-light">
   

    <div class="container">
        
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">  
        <?php
            $db = mysqli_connect('localhost', 'root', '', 'step4');
            if ($db->connect_errno > 0) {
              die('Baglanamadim [' . $db->connect_error . ']');
            }

            $result = mysqli_query($db, "SELECT P.product_name AS product_name,P.product_description AS product_description,P.product_picture AS product_picture,P.brand AS brand,P.price AS price, SUM(OB.counttt) AS total_count FROM Product P, Place_Order O, OrderedBasketProducts OB WHERE P.product_id = OB.product_id AND OB.order_id = O.order_id GROUP BY P.product_name ORDER BY total_count DESC");
            $count =0;
            while ($row = mysqli_fetch_assoc($result) And ($count < 9)) {
              $product_name = $row['product_name'];
              $description = $row['product_description'];
              $price = $row['price'];
              $brand = $row['brand'];

              echo "<div class='col'> <div class='card shadow-sm'>
              <img class='bd-placeholder-img card-img-top' width='100%' height='225' src='https://drive.google.com/uc?export=view&id=1MbY3FN3HvBnFjl3HQROjgaXkBq5nhq_V' role='img' aria-label='Placeholder: Thumbnail' preserveAspectRatio='xMidYMid slice' focusable='false'><title>Placeholder</title><rect width='100%' height='100%' fill='#55595c'/><text x='50%' y='50%' fill='#eceeef' dy='.3em'></text></img>
              <div class='card-body'>
              <h3 class='text-center strong'> $product_name</h3>
              <p class='lead text-muted text-center'>$brand</p>
                <p class='card-text'>$description</p>
                <div class='d-flex justify-content-between align-items-center'>
                  <div class='form-group'>
                          <select class='form-control' id='exampleSelect1' style='max-width:40%;'>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                          </select>
  
                    <button type='button' class='btn btn-sm btn-outline-secondary'>Add to Cart</button>      
                             
                  </div>
                  <h4> $price $</h4>  
                </div>
                
              </div>
            </div>
            </div>";
            $count = $count + 1;
            }
            ?>  
      </div>
    </div>
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
