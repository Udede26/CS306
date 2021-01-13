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
    <title>Album example · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">
	<link href="styleProductInfo.css" rel="stylesheet">
	<title> Product Details </title>
	
	 
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
              <li><a href="#" style="color: 	#FFFFFF">Edit User Information </a></li>
              <li><a href="#" style="color: 	#FFFFFF">Order History</a></li>
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
            <input class="w-100" type="search" id="mysearch" name="mysearch" placeholder="Search" aria-label="Search">
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

              echo "<li class='list-group-item'>";
              echo "<!-- Custom content-->";
              echo "<div class='media align-items-lg-center flex-column flex-lg-row p-3'>";
              echo   "<div class='media-body order-2 order-sm-1'>";
              echo      "</div><img src='https://drive.google.com/uc?export=view&id=1MbY3FN3HvBnFjl3HQROjgaXkBq5nhq_V' alt='Generic placeholder image' width='100' class='ml-lg-5 order-1 order-lg-2'>";
              echo      "<h5 class='mt-0 font-weight-bold mb-2'>$product_name</h5>";
              echo       "<p class='font-italic text-muted mb-0 small'>$description</p>";
              echo "<div class='mt-0 font-weight-bold mb-2'>
                <h6 class='font-weight-bold my-2'>$price $</h6>
                
                
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
   

  <div class="album py-5 bg-light text-center">
 	 <div class = "container"> 
         <div class= "row">

         	<div class = "col-md-5">
         		<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
				  <div class="carousel-inner">
				    <div class="carousel-item active">
				      <img src="ketchup.jpg" class="d-block w-100" alt="First slide">
				    </div>
				  
				   
				  </div>
				  
				</div>
 
         </div>
         	<div class = "col-md-7">
         		<p class= "newarrival text-center">NEW</p>
         		<h2> <?php if(isset($_POST['go'])) echo $_POST['go']; else echo $_SESSION["gobutonu"]; ?> </h2>
               

              <?php
              if (isset($_POST['go']))
                $_SESSION["gobutonu"]=$_POST['go'];
                $product_name = $_SESSION["gobutonu"];
              $db = mysqli_connect('localhost', 'root', '', 'step4');
              if ($db->connect_errno > 0) {
                die('Baglanamadim [' . $db->connect_error . ']');
              }

              $result = mysqli_query($db, "SELECT P.product_id, P.product_description, P.price, P.brand, P.rating  FROM product P WHERE P.product_name='$product_name'");
              while ($row = mysqli_fetch_assoc($result)) {
                $productid = $row['product_id'];
                $description = $row['product_description'];
                $price = $row['price'];
                $brand = $row['brand'];
                $rating = $row['rating'];
              }
                echo"<p> Product Code: $productid </p>";
                echo"<p> $description </p>";

                  for($x=1;$x<=$rating;$x++) {
                echo "<span class='fa fa-star checked' aria-hidden='true'></span>";
            }
            if (strpos($rating,'.')) {
                echo "<span class= 'fa fa-star-half-o fa-sm checked' aria-hidden='true'></span>";
                $x++;
            }
            while ($x<=5) {
                echo "<span class= 'fa fa-star-o checked' aria-hidden='true'></span>";
                $x++;
            } 
             echo " ".$rating;
                echo"<p class= 'price'> $price $ </p>";
                echo "<p><b>Brand: </b> $brand </p>";
                echo"<label>Count  </label>";
                echo"<input id = 'amount' type='text' value='1'>";
                
               
        echo"<button type='button' class='btn btn-default cart btn-primary'>Add to cart</button>";
        
         echo"</div>";
         echo"</div>";








             




                   //$starNumber = $_SESSION["product_rating"]
                /*
                   $starNumber = 3.5;
				    for($x=1;$x<=$starNumber;$x++) {
				        echo '<img src="star.png" />';
				    }
				    if (strpos($starNumber,'.')) {
				        echo '<img src="halfstar.png" />';
				        $x++;
				    }
				    while ($x<=5) {
				        echo '<img src="blankstar.png" />';
				        $x++;
				    } 
				     */
        $if_purchased=false;
        $if_commented=false;
        $result4 = mysqli_query($db, "SELECT U.user_id
                                      FROM Users U, OrderedBasketProducts OB
                                       WHERE U.user_id = OB.user_id AND OB.product_id='$productid'");

        while ($row4 = mysqli_fetch_assoc($result4)) {
         if(isset($_SESSION['users_id']) && $_SESSION['users_id']==$row4['user_id'])
                    $if_purchased=true;
              }  
 
        $result5 = mysqli_query($db, "SELECT U.user_id
                                      FROM Users U, Comments C
                                       WHERE U.user_id = C.user_id AND C.product_id='$productid'");

        while ($row5 = mysqli_fetch_assoc($result5)) {
         if(isset($_SESSION['users_id']) && $_SESSION['users_id']==$row5['user_id'])
                    $if_commented=true;
              } 


               $_SESSION['productt_id'] =$productid;

 //echo"<p style='Color:blue'>$_SESSION['users_id']</p>";

       
	echo"</div>"; 
  echo"</div>";


  echo"<div class='album py-5 bg-light'>";
  echo"<li class='list-group-item'>";


  echo"<form action='insertCommentRating.php' method='post'>";
//echo"<div>";
if ($if_commented==true) {
    echo "<p style='Color:blue'>You have already commented on this product. You can edit your comment: <i class='fa fa-pencil' aria-hidden='true'></i></p>";
    echo"<div>";
    echo"<textarea name='editcomments' id='editcomments' style='width:40%'>";
    echo"</textarea>";
    echo"</div>";
  }
  else
  {
    echo"<p style='Color:blue'>Your Comment:</p>";
    echo"<div>";
    echo"<textarea name='comments' id='comments' style='width:40%'>";
   echo"</textarea>";
    echo"</div>";

  }

echo"<p style='Color:blue'>Rate this product:</p>";
if ($if_purchased==true) {  
echo"<div>";
echo"<select class='form-control align-items-lg-center' name='selectRating' id='exampleSelect1' style='max-width:2%;float:left;'>";
                          echo"<option>1</option>";
                          echo"<option>2</option>";
                          echo"<option>3</option>";
                          echo"<option>4</option>";
                          echo"<option>5</option>";
                        echo"</select>";
echo"<span class='fa fa-star checked'></span>";
        echo"</div>";
        echo"<br></br>";
}

else
  echo "<p style='Color:black'>You have not purchased this product yet! </p>";

echo"<div><button class='w-10 btn btn-sm btn-primary' type='submit sign in'>Submit</button></div>";
echo"</form>";


            $result2 = mysqli_query($db, "SELECT U.first_name, U.last_name, C.user_comment
FROM Users U, Comments C
WHERE U.user_id = C.user_id AND C.product_id='$productid'AND C.user_id NOT IN (SELECT U2.user_id
FROM Users U2, Comments C2, OrderedBasketProducts OB2
WHERE U2.user_id = OB2.user_id AND OB2.user_id=C2.user_id  AND C2.product_id='$productid' AND C2.product_id IN (SELECT OB3.product_id
                    FROM OrderedBasketProducts OB3
                     WHERE OB3.basket_id= OB2.basket_id))");

    $if_no_comment=true;     
    $result3= mysqli_query($db,"SELECT U.first_name, U.last_name, C.user_comment, R.user_rating
FROM Users U, Comments C, OrderedBasketProducts OB , Product P, Ratings R
WHERE U.user_id = OB.user_id AND OB.user_id=C.user_id AND R.user_id = U.user_id AND R.product_id=P.product_id AND    C.product_id = P.product_id AND P.product_id='$productid' AND C.product_id IN (SELECT OB2.product_id
                    FROM OrderedBasketProducts OB2
                     WHERE OB2.basket_id= OB.basket_id)");

  if(mysqli_num_rows($result3)>0){
    $if_no_comment=false;
            while ($row = mysqli_fetch_assoc($result3)) {
              $commented_user_name = $row['first_name'];
              $commented_user_surname = $row['last_name'];
              $comment = $row['user_comment'];
              $user_rating = $row['user_rating'];
             
             echo"</li>";
            echo" <li class='list-group-item'>";
            echo"<!-- Custom content-->";
            echo"<div class='media align-items-lg-center flex-column flex-lg-row p-3'>";
            echo"<p style='Color:blue'>$commented_user_name $commented_user_surname</p>";    
            echo"$comment";
            echo"<p style='Color:green'>Purchased the product<i class='fa fa-check' aria-hidden='true'></i></p>";
            if(!is_null($user_rating)){
              if($user_rating==5.0)
              {
                for($i=0;$i<5;$i++) {
                echo "<span class='fa fa-star fa-xs checked' aria-hidden='true'></span>";
                 }
               }
              else
              {
                    for($x=0;$x<$user_rating;$x++) {
                echo "<span class='fa fa-star fa-xs checked' aria-hidden='true'></span>";


                }
                
              if ($user_rating-$x!=0) {
                echo "<span class= 'fa fa-star-half-o fa-xs checked' aria-hidden='true'></span>";
                $x++;
              }

              while ($x<5) {
                 echo "<span class= 'fa fa-star-o fa-xs checked' aria-hidden='true'></span>";
                 $x++;
               } 
              }
             
            }
              echo"</div>";
            }
            
          }
            
          if(mysqli_num_rows($result2)>0){
            $if_no_comment=false;
            while ($row2 = mysqli_fetch_assoc($result2)) {
              $commented_user_name = $row2['first_name'];
              $commented_user_surname = $row2['last_name'];
              $comment = $row2['user_comment'];
                
             
             echo"</li>";
            echo" <li class='list-group-item'>";
            echo"<!-- Custom content-->";
            echo"<div class='media align-items-lg-center flex-column flex-lg-row p-3'>";
            echo"<p style='Color:blue'>$commented_user_name $commented_user_surname</p>";    
            echo"$comment";
            echo"</div>";
            }
           }

           if ($if_no_comment==true)
            echo"There is no comment here. Be the first to comment!"
	
     ?>
         </div>
        </li>
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

     
