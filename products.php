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
              $product_id =$row['product_id'];
              $product_picture = $row['product_picture'];
             
              
              echo "<li class='list-group-item'>";
              echo "<!-- Custom content-->";
              echo "<div class='media align-items-lg-center flex-column flex-lg-row p-3'>";
              echo   "<div class='media-body order-2 order-sm-1'>";
              echo      "</div><img src=$product_picture alt='Generic placeholder image' width='100' class='ml-lg-5 order-1 order-lg-2'>";
              echo      "<h5 class='mt-0 font-weight-bold mb-2'>$product_name</h5>";
              echo       "<p class='font-italic text-muted mb-0 small'>$description</p>";
              echo "<div class='mt-0 font-weight-bold mb-2'>
                <h6 class='font-weight-bold my-2'>$$price x $count_sag_ust </h6><form action='deleteFromCard.php' method='POST'>
                
                
                 
                <input style='width: 50px' value = 1 class='form-control my-2' name='countt' type='text' placeholder='countt' aria-label='Amount'>     
                <button type='submit' class='btn btn-sm btn-outline-secondary'>Add</button> 
                </form>
                <form action='deleteFromCard.php' method='POST'>
                <button type='submit' class='btn btn-sm btn-outline-secondary'name='product_id' value=$product_id>Delete</button>  
                </form>
                ";
                
                
                 echo" </div></li>";
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



    <div id="sidebar">
    <form action="filtered.php" method="POST">
      <div>
        <h6 class="p-1 border-bottom">Category</h6>
        <fieldset>
          <p>
          <div class='form-inline border rounded p-md-2 my-2'> <input value='default' type='radio' name='type' id='notugly' checked='checked'> <label for='notugly' class='pl-1 pt-sm-0 pt-1'>All</label> </div>
 
        <?php

            $db = mysqli_connect('localhost', 'root', '', 'step4');
            if ($db->connect_errno > 0) {
              die('Baglanamadim [' . $db->connect_error . ']');
            }

            $result = mysqli_query($db, "SELECT * FROM Category");

            while ($row = mysqli_fetch_assoc($result)) {
              $category_name = $row['category_name'];
              echo "<div class='form-inline border rounded p-md-2 my-2'> <input value='$category_name'type='radio' name='type' id='notugly'> <label for='notugly' class='pl-1 pt-sm-0 pt-1'>$category_name</label> </div>";
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
          <div class="form-inline border rounded p-md-2 my-2"> <input type="radio" name="rating" id="notugly" value='>0' checked="checked">  <label for="notugly" class="pl-1 pt-sm-0 pt-1">Any</label> </div>
          <div class="form-inline border rounded p-md-2 my-2"> <input type="radio" name="rating" id="notugly" value='>4'> <label for="notugly" class="pl-1 pt-sm-0 pt-1">>4</label> </div>
          <div class="form-inline border rounded p-sm-2 my-2"> <input type="radio" name="rating" id="ugly" value='>4.5' > <label for="ugly" class="pl-1 pt-sm-0 pt-1">>4.5</label> </div>
          <div class="form-inline border rounded p-md-2 my-2"> <input type="radio" name="rating" id="notugly" value='>0.5'> <label for="notugly" class="pl-1 pt-sm-0 pt-1">>0.5</label> </div>
          <div class="form-inline border rounded p-md-2 my-2"> <input type="radio" name="rating" id="notugly" value='>4'> <label for="notugly" class="pl-1 pt-sm-0 pt-1">>4</label> </div>
          <div class="form-inline border rounded p-sm-2 my-2"> <input type="radio" name="rating" id="ugly" value='>4.5' > <label for="ugly" class="pl-1 pt-sm-0 pt-1">>4.5</label> </div>
          </p>
        </fieldset>
      </div>
      <div>
        <h6 class="p-1 border-bottom">Order by</h6>
        <fieldset>
          <p>
          <div class="form-inline border rounded p-md-2 my-2"> <input type="radio" name="orderby" id="notugly" value='default' checked="checked"> <label for="notugly" class="pl-1 pt-sm-0 pt-1">Default</label> </div>
          <div class="form-inline border rounded p-md-2 my-2"> <input type="radio" name="orderby" id="notugly" value='price_ascending'> <label for="notugly" class="pl-1 pt-sm-0 pt-1">Price Ascending</label> </div>
          <div class="form-inline border rounded p-md-2 my-2"> <input type="radio" name="orderby" id="notugly" value='price_descending'> <label for="notugly" class="pl-1 pt-sm-0 pt-1">>Price Descending</label> </div>
          <div class="form-inline border rounded p-md-2 my-2"> <input type="radio" name="orderby" id="notugly" value='name_ascending'> <label for="notugly" class="pl-1 pt-sm-0 pt-1">A-Z</label> </div>
          <div class="form-inline border rounded p-md-2 my-2"> <input type="radio" name="orderby" id="notugly" value='name_descending'> <label for="notugly" class="pl-1 pt-sm-0 pt-1">>Z-A</label> </div>
          <div class="form-inline border rounded p-md-2 my-2"> <input type="radio" name="orderby" id="notugly" value='rating_ascending'> <label for="notugly" class="pl-1 pt-sm-0 pt-1">>Rating Ascending</label> </div>
          <div class="form-inline border rounded p-md-2 my-2"> <input type="radio" name="orderby" id="notugly" value='rating_descending'> <label for="notugly" class="pl-1 pt-sm-0 pt-1">>Rating Descending</label> </div>
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
        $id = $row['product_id'];
        $product_picture = $row['product_picture'];
        $product_rating = $row['rating'];

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

        echo "<li class='list-group-item'>";
        echo "<!-- Custom content-->";
        echo "<div class='media align-items-lg-center flex-column flex-lg-row p-3'>";
        echo   "<div class='media-body order-2 order-lg-1'>";
        echo      "</div><img src='$product_picture' alt='Generic placeholder image' width='200' class='ml-lg-5 order-1 order-lg-2'>";
        echo      "<h5 class='mt-0 font-weight-bold mb-2'>$product_name</h5>";
        if(!is_null($product_rating)){
              if($product_rating==5.0)
              {
                for($i=0;$i<5;$i++) {
                echo "<span class='fa fa-star fa-xs checked' style='Color:orange' aria-hidden='true'></span>";
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

        echo       "<p class='font-italic text-muted mb-0 small'>$description</p>";
        echo "<div class='mt-0 font-weight-bold mb-2'>
                      <h6 class='font-weight-bold my-2'>$price $</h6>
                      
                        </div>" . "<div class='form-group' align='center'>
                        <form  action='addToCard.php' method='POST'>
                        
                        <input style='width: 50px' value = 1 class='form-control my-2' name='countt' type='text' placeholder='countt' aria-label='Amount'>
                      
                        <button type='submit sign in' class='w-10 btn btn-lg btn-primary' id ='btn' name='product_id' value='$id' >Add to Cart </button>
                        </form>
                      </div>
                      <br>
                      </br>";
                      
                
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
