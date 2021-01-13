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
  <h2 class="fw-light text-center"><strong>Your Information</strong></h2>
  <?php 
 $if_registered = true;
 $result_if_registered = mysqli_query($db, "SELECT U.user_id
                                            FROM Users U
                                            WHERE U.user_id NOT IN (SELECT R2.user_id
                                                                     FROM Users U2, RegisteredUserInfo R2
                                                                     WHERE U2.user_id= R2.user_id)");
if(mysqli_num_rows($result_if_registered)>0)
 {
            while ($row_reg = mysqli_fetch_assoc($result_if_registered)) 
            {                
                if($user_id==$row_reg['user_id'])
                  $if_registered = false;
                   }
  }

  if ($if_registered ==true)
  {
         
     $result_registered = mysqli_query($db, "SELECT U.address, U.first_name, U.last_name, R.email, R.password, R.phone_number
FROM RegisteredUserInfo R, Users U
WHERE R.user_id = $user_id AND U.user_id=R.user_id");


  while ($row_2 = mysqli_fetch_assoc($result_registered))
  {
    $first_name = $row_2['first_name'];
              $last_name = $row_2['last_name'];
              $address = $row_2['address'];
              $email = $row_2['email'];
              $pass = $row_2['password'];
              $phone =$row_2['phone_number'];


     echo"<div class='album py-5 bg-light text-center'>";
          echo"<form action='change_user_info.php' method='POST'>";
        echo"<p class='text-center'> First Name: $first_name";
            echo"<input type='input' id='changename' name='changename' placeholder='Change' aria-label='Change'>";
          echo"</p>";
        echo"<p class='text-center'> Last Name: $last_name";
            echo"<input type='input' id='changesurname' name='changesurname' placeholder='Change' aria-label='Change'>";
          echo"</p>";
        echo"<p class='text-center'> Address: $address";
            echo"<input type='input' id='changeaddress' name='changeaddress' placeholder='Change' aria-label='Change'>";
          echo"</p>";
          echo"<p class='text-center'> Email: $email";
            echo"<input type='input' id='changeemail' name='changeemail' placeholder='Change' aria-label='Change'>";
          echo"</p>";
          echo"<p class='text-center'> Phone Number: $phone";
            echo"<input type='input' id='changephone' name='changephone' placeholder='Change' aria-label='Change'>";
          echo"</p>";
          echo"<p class='text-center'> New Password: ";
            echo"<input type='input' id='changepass' name='changepass' placeholder='Change' aria-label='Change'>";
           echo"</p>";
          echo"<p class='text-center'> New Password Again:";
            echo"<input type='input' id='changepassagain' name='changepassagain' placeholder='Change' aria-label='Change'>";
           echo"</p>";
        echo"<button> Apply Changes</button>";
        echo"</form>";
  echo"</div>";

  }

  
}
  else 
  {
   echo"<div class='album py-5 bg-light text-center'>";
   echo "Only registered users can change their information";
   echo"</div>";
  }
  ?>
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
© 2021 GitHub, Inc.
Terms
Privacy
Security
Status
Help
Contact GitHub
Pricing
API
Training
Blog
About
