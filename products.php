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
             
             echo"<div id='cartheader'>";
              echo"<a id='total'> Total: $0 </a>";
              echo"<a href='checkout.php'><button id='proceed' float:right> Proceed to Checkout</button></a>";
             echo"</div>";

              echo "<li class='list-group-item'>";
              echo "<!-- Custom content-->";
              echo "<div class='media align-items-lg-center flex-column flex-lg-row p-3'>";
              echo   "<div class='media-body order-2 order-sm-1'>";
              echo "There is no product in the cart";
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



    <div id="sidebar">
    <form action="filtered.php" method="POST">
      <div>
        <h6 class="p-1 border-bottom">Category</h6>
        <fieldset>
          <p>
        <?php

            $db = mysqli_connect('localhost', 'root', '', 'step4');
            if ($db->connect_errno > 0) {
              die('Baglanamadim [' . $db->connect_error . ']');
            }

            $result = mysqli_query($db, "SELECT * FROM Category");

            while ($row = mysqli_fetch_assoc($result)) {
              $category_name = $row['category_name'];
              echo "<div class='form-inline border rounded p-md-2 my-2'> <input value='$category_name'type='radio' name='type' id='notugly' checked='checked'> <label for='notugly' class='pl-1 pt-sm-0 pt-1'>$category_name</label> </div>";
            }
            ?>
            </p>
        </fieldset>
      </div>
      <div>
        <h6 class="p-1 border-bottom">Filter By</h6>
        <p class="mb-2">Price</p>
        <fieldset>
          <p><small>min price</small></p>
          <p>
          <input value = 0 class="form-control my-2" name="min" type="text" placeholder="Min. Price" aria-label="Min. Price">
          <p><small>max price</small></p>
          <input value = 9999 class="form-control my-2" name="max" type="text" placeholder="Max. Price" aria-label="Max. Price">
          </p>
        </fieldset>
      </div>
      <div>
        <h6 class="p-1 border-bottom">Rating</h6>
        <fieldset>
          <p>
          <div class="form-inline border rounded p-md-2 my-2"> <input type="radio" name="rating" id="notugly" value='>0.5'> <label for="notugly" class="pl-1 pt-sm-0 pt-1">>0.5</label> </div>
          <div class="form-inline border rounded p-md-2 my-2"> <input type="radio" name="rating" id="notugly" value='>4'> <label for="notugly" class="pl-1 pt-sm-0 pt-1">>4</label> </div>
          <div class="form-inline border rounded p-sm-2 my-2"> <input type="radio" name="rating" id="ugly" value='>4.5' checked="checked"> <label for="ugly" class="pl-1 pt-sm-0 pt-1">>4.5</label> </div>
          </p>
        </fieldset>
      </div>
      <br>
      </br>
      <button class='w-10 btn btn-lg btn-primary' name='applyfilterbutton' type='submit sign in' onclick='submitForms()'>Apply Filter(s)</button>

      <br>
      </br>
      </form>
      <form action="products.php">
      <button class='w-10 btn btn-lg btn-primary' name='resetfilterbutton' type='submit sign in' id="reset">Reset Filter(s)</button>
          </form>
     
</form>
    </div>


    <div class="rp-main-content album py-5 bg-light text-center" id="products">
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
       

        echo "<li class='list-group-item'>";
        echo "<!-- Custom content-->";
        echo "<div class='media align-items-lg-center flex-column flex-lg-row p-3'>";
        echo   "<div class='media-body order-2 order-lg-1'>";
        echo      "</div><img src='https://drive.google.com/uc?export=view&id=1MbY3FN3HvBnFjl3HQROjgaXkBq5nhq_V' alt='Generic placeholder image' width='200' class='ml-lg-5 order-1 order-lg-2'>";
        echo      "<h5 class='mt-0 font-weight-bold mb-2'>$product_name</h5>";

        echo       "<p class='font-italic text-muted mb-0 small'>$description</p>";
        echo "<div class='mt-0 font-weight-bold mb-2'>
                      <h6 class='font-weight-bold my-2'>$price $</h6>
                      
                        </div>" . "<div class='form-group' align='center'>
                        <select class='form-control align-items-lg-center' id='exampleSelect1' style='max-width:20%;'>
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
                      </div>
                      <br>
                      </br>";

      echo "<button class='w-10 btn btn-lg btn-primary' type='submit sign in'>Add to cart</button>";
    echo"<form action='productinfo.php' method='POST'>";
     echo"<button type='submit sign in' class='w-10 btn btn-lg btn-primary' name='go' value='$product_name' >Go to Product </button>";
     echo"</form>";
      

        echo  "</div>";
        echo "</li>";

      }
      echo "</table>";


      ?>
    </div>


  </main>


  <footer class="text-muted py-5">
    <div class="container">
      <p class="float-end mb-1">
        <a href="#">Back to top</a>
      </p>
      <p class="mb-1"> All rights reserved to &copy;BuyZone Group </p>
      <p class="mb-0">2020-2021 </p>
    </div>
  </footer>


  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>
