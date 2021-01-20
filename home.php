 <?php 
 session_start();
 ?>
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

     <!-- Font Awesome Icon Library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


   <!-- Font Awesome Icon Library -->

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
              <li><a href="edit_user_info.php" style="color:  #FFFFFF">Edit User Information </a></li>
              <li><a href="history.php" style="color:   #FFFFFF">Order History</a></li>
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
            echo"<div id='cartheader'>";
              echo"<a href='checkout.php'><button id='proceed' float:right> Proceed to Checkout</button></a>";
             echo"</div>";
             echo"<br>";
              echo"<br>";
            while ($row = mysqli_fetch_assoc($result)) {
              $product_name = $row['product_name'];
              $description = $row['product_description'];
              $price = $row['price'];
              $brand = $row['brand'];
              $count_sag_ust = $row['countt'];
              $total_sag_ust =$row['total_cost'];
              $product_id = $row['product_id'];
              $product_picture = $row['product_picture'];
              

              echo "<li class='list-group-item'>";
              echo "<!-- Custom content-->";
              echo "<div class='media align-items-lg-center flex-column flex-lg-row p-3'>";
              echo   "<div class='media-body order-2 order-sm-1'>";
              echo      "</div><img src=$product_picture alt='Generic placeholder image' width='100' class='ml-lg-5 order-1 order-lg-2'>";
              echo      "<h5 class='mt-0 font-weight-bold mb-2'>$product_name</h5>";
              echo       "<p class='font-italic text-muted mb-0 small'>$description</p>";
              echo "<div class='mt-0 font-weight-bold mb-2'>
                <h6 class='font-weight-bold my-2'>$$price x $count_sag_ust </h6>
                <form action='deleteFromCard.php' method='POST'>
                
                
                 
                <input style='width: 50px' value = 1 class='form-control my-2' name='countt' type='text' placeholder='countt' aria-label='Amount'>     
                <button type='submit' class='btn btn-sm btn-outline-secondary'>Add</button> 
                </form>
                <form action='deleteFromCard.php' method='POST'>
                <button type='submit' class='btn btn-sm btn-outline-secondary'name='product_id' value=$product_id>Delete</button>  
                </form>
                
                  </div></li>";
            }
            echo " "."Total: $$total_sag_ust";
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

            $result = mysqli_query($db, "SELECT P.product_id as product_id, P.rating AS rating, P.product_name AS product_name,P.product_description AS product_description,P.product_picture AS product_picture,P.brand AS brand,P.price AS price, SUM(OB.counttt) AS total_count FROM Product P, Place_Order O, OrderedBasketProducts OB WHERE P.product_id = OB.product_id AND OB.order_id = O.order_id GROUP BY P.product_name ORDER BY total_count DESC");
            $count =0;
            while ($row = mysqli_fetch_assoc($result) And ($count < 9)) {
              $product_name = $row['product_name'];
              $description = $row['product_description'];
              $price = $row['price'];
              $brand = $row['brand'];
              $product_rating = $row['rating'];
              $id = $row['product_id'];
              $product_picture = $row['product_picture'];

               $recommend = false;
       $recommend_new = false;

       //The products user has purchased
      $purchased_result = mysqli_query($db, "SELECT OB.product_id
                                             FROM orderedbasketproducts OB
                                             WHERE OB.user_id = $user_id
                                             GROUP BY OB.product_id");
       while($row2 = mysqli_fetch_assoc($purchased_result))
       {
         if($id==$row2['product_id'])
           $recommend=true;

       }
       
       //The products that user has not bought but belong to categories user have purchased from 
      $products_from_same_categories = mysqli_query($db, "SELECT PC.product_id
FROM productcategory PC
WHERE PC.category_id IN (SELECT PC2.category_id
                         FROM orderedbasketproducts OB, productcategory PC2
                         WHERE OB.user_id = $user_id AND OB.product_id = PC2.product_id)  AND PC.product_id NOT IN (SELECT OB2.product_id
                                             FROM orderedbasketproducts OB2
                                             WHERE OB2.user_id = $user_id
                                             GROUP BY OB2.product_id)");

        while ($row3 = mysqli_fetch_assoc($products_from_same_categories))
       {
         if($id==$row3['product_id'])
           $recommend_new=true;

       }    

              echo "<div class='col'> <div class='card shadow-sm'>
              <img class='bd-placeholder-img card-img-top' width='100%' height='400' src=$product_picture role='img' aria-label='Placeholder: Thumbnail' preserveAspectRatio='xMidYMid slice' focusable='false'><title>Placeholder</title><rect width='100%' height='100%' fill='#55595c'/><text x='50%' y='50%' fill='#eceeef' dy='.3em'></text></img>
              <form class='card-body'>
              <h3 class='text-center strong'> $product_name</h3>
             

             <p class='lead text-muted text-center'>$brand</p>";
                 if(!is_null($product_rating)){
              if($product_rating==5.0)
              {
                for($i=0;$i<5;$i++) {
                echo "<span class='fa fa-star fa-xs checked' style='Color:orange; text-align:center' aria-hidden='true'></span>";
                 }
               }
              else
              {
                  if($product_rating==0.0 || $product_rating==1.0 || $product_rating==2.0 || $product_rating==3.0 || $product_rating==4.0)
                  {
                    for($x=0;$x<$product_rating;$x++) {
                 
                echo "<span class='fa fa-star fa-xs checked' style='Color:orange' aria-hidden='true'></span>";
                 }
               }
                 else
                 {
                  for($x=0;$x<$product_rating-1;$x++) {
                 
                echo "<span class='fa fa-star fa-xs checked' style='Color:orange' aria-hidden='true'></span>";
                 }

                 }

                
                
              if ($product_rating-$x!=0) {
                echo "<span class= 'fa fa-star-half-o fa-xs checked' style='Color:orange' aria-hidden='true'></span>";
                $x++;
              }

              while ($x<5) {
                 echo "<span class= 'fa fa-star-o fa-xs checked' style='Color:orange' aria-hidden='true'></span>";
                 $x++;
               } 
              }
             echo " ".$product_rating;
            }
               if($recommend==true)
        {
          echo "<br>"."<i style='Color:tomato'> Out of $product_name? Refill your stock! </i>"; 
        }
        else if ($recommend_new==true)
        {
          echo "<br>"."<i style='Color:DarkGreen'> You might be interested in this, based on your previous preferences </i>"; 
        }

                echo"<p class='card-text'>$description</p>
                <div class='d-flex justify-content-between align-items-center'>              
                  <h4> $price $</h4>  
                </div>
                </form>
              <div class='form-group' align='center'>
                        <form  action='addToCard.php' method='POST'>
                        
                        <input style='width: 50px' value = 1 class='form-control my-2' name='countt' type='text' placeholder='countt' aria-label='Amount'>
                      
                        <button type='submit sign in' style=' Background:OrangeRed; Color:white' class='btn btn-m btn-outline-secondary' name='product_id' value='$id'  >Add to Cart </button>
                        </form>
                      </div>
           <div class='form-group' align='center'>
        <form action='productinfo.php' method='POST'>
      <button type='submit sign in' style=' Background:LightSeaGreen; Color:white' class='btn btn-m btn-outline-secondary' name='go' value='$product_name' >Go to Product </button>
      </form>
       </div>
       <br>
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
